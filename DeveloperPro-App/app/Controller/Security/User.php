<?php
/**
 * Created by DeveloperPro ®.
 * User: Gilberto Guerrero Quinayas
 * Date: 25/09/2018
 * Time: 5:36 PM
 */


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Service\Helpers;
use Service\Connections;
use Service\EmailTemplate;

$app->group('/api-security/', function () {
    $this->group('users/', function () {
        $this->post('checkToken', function (Request $request, Response $response, array $args) {
            $helper = new Helpers();
            $connection = new Connections();

            $authorization = $request->getParsedBody();
            $authorization = $authorization['authorization'];

            return json_encode($helper->jwrAuth->checkToken($authorization));
        });
        $this->post('logInFacebook', function (Request $request, Response $response, array $args) {
            $helper = new Helpers();
            $connection = new Connections();

            $json = $request->getParsedBody();
            $json = $json['json'];
            $json = json_decode($json);

            return $helper->jwrAuth->signInFacebook();
        });
        $this->post('logIn', function (Request $request, Response $response, array $args) {
            $parametros = $request->getParsedBody();
            $json = $parametros['json'];
            $helper = new Helpers();
            if ($json != null) {
                $parametros = json_decode($json);
                $correo = (isset($parametros->se_user_email)) ? $parametros->se_user_email : null;
                $contrasena = (isset($parametros->se_user_password)) ? $parametros->se_user_password : null;
                $getHash = (isset($parametros->has)) ? $parametros->has : false;
                $conexion = new Connections();
                $pwd = hash('SHA256', $contrasena);
                $sql = "select * from security.se_users se_user inner join security.se_profiles se_profile on 
                            se_user.se_user_id=se_profile.se_user_id_fk_profiles 
                            where se_profile.se_profile_identification ='$correo' and se_user.se_user_password='$pwd' and se_user.se_user_active = '1'";
                $r = $conexion->complexQueryNonAssociative($sql);
                if ($r != 0) {
                    $usuario = $r;
                    if ($usuario['se_user_active'] != '0') {
                        if ($correo == $usuario['se_profile_identification'] && $pwd == $usuario['se_user_password']) {
                            $jwtAuth = new \Service\JwtAuth();
                            $jwt = $jwtAuth->signIn($usuario, $getHash);
                            $data = [
                                'code' => 1001,
                                'msg' => 'Bienvenido',
                                'data' => $jwt
                            ];
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos, correo o contraseña incorrectos'
                            ];
                        }
                    } else {
                        $data = [
                            'code' => '1007',
                            'msg' => 'Lo sentimos, su cuenta esta inactiva'
                        ];
                    }
                } else {
                    $data = [
                        'code' => '1007',
                        'msg' => 'Lo sentimos, no se encontro una cuenta con ese correo'
                    ];
                }
            } else {
                $data = [
                    'code' => '1007',
                    'msg' => 'Lo sentimos, no se encontro una cuenta con ese correo'
                ];
            }
            echo $helper->checkCode($data);
        });
        $this->post('validate', function (Request $request, Response $response, array $args) {
            $helper = new Helpers();
            $connection = new Connections();

            $json = $request->getParsedBody();
            $json = $json['json'];
            $json = json_decode($json);

            $email = (isset($json->email)) ? $json->email : null;
            $code = (isset($json->code)) ? $json->code : null;

            $sqlQueryUser = "SELECT se_user_id, se_user_email, se_user_password, se_user_code, se_user_last_connection, se_user_created_at, se_user_state_type,
                                                se_user_state, se_user_role_id, se_user_profile_id, se_user_group_id, se_user_fb_id, se_user_google_id
                                    FROM security.se_users WHERE se_user_email = '$email' AND se_user_code = '" . base64_encode($code) . "';";
            $resultQueryUser = $connection->complexQueryNonAssociative($sqlQueryUser);

            if (isset($resultQueryUser) && $resultQueryUser != 0) {
                $resultQueryUser = $helper->jsonEncodeDecode($resultQueryUser);
                if ($resultQueryUser->se_user_state_type == 'PENDIENTE' && $resultQueryUser->se_user_state) {
                    $sqlUpdateUser = "UPDATE security.se_users
                                            SET se_user_state_type='ACTIVO', se_user_state='true'
                                            WHERE se_user_id = $resultQueryUser->se_user_id;";
                    $resultUpdateUser = $connection->simpleQuery($sqlUpdateUser);

                    $data = array(
                        'code' => '1001',
                        'msg' => 'Success'
                    );
                } else {
                    $data = array(
                        'code' => '1002',
                        'msg' => 'User is active'
                    );
                }
            } else {
                $data = array(
                    'code' => '1005',
                    'msg' => 'Data incorrect'
                );
            }

            $data = $helper->jsonEncodeDecode($data);

            return $helper->checkCode($data);
        });
        $this->post('listUser', function (Request $request) {
            $parametros = $request->getParsedBody();
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select * from security.se_users se_user 
                            inner join security.se_profiles se_profile on 
                            se_user.se_user_id=se_profile.se_user_id_fk_profiles 
                            inner join configuration.co_cities co_ci on se_profile.co_city_id_fk_profiles = co_ci.co_city_id
                            inner join configuration.co_departments co_de on co_de.co_department_id=co_ci.co_department_id_fk_cities
                            inner join configuration.co_countries co_co on co_co.co_country_id=co_de.co_country_id_fk_departments
                            where se_user.se_user_active = '1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Usuarios cargados',
                        'data' => $r
                    ];
                } else {
                    $data = [
                        'code' => '1008'
                    ];
                }
            } else {
                $data = [
                    'code' => '1008'
                ];
            }

            echo $helper->checkCode($data);
        });
        $this->post('listUserClerk', function (Request $request) {
            $parametros = $request->getParsedBody();
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select se_user.se_user_id, se_profile.se_profile_name ,se_profile.se_profile_surname,se_profile.se_profile_identification 
                            from security.se_users se_user inner join security.se_profiles se_profile on 
                            se_user.se_user_id=se_profile.se_user_id_fk_profiles 
                            where se_user.se_user_active = '1' and se_user.se_user_clerk = '1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Usuarios cargados cargados',
                        'data' => $r
                    ];
                } else {
                    $data = [
                        'code' => '1008'
                    ];
                }
            } else {
                $data = [
                    'code' => '1008'
                ];
            }

            echo $helper->checkCode($data);
        });
        $this->post('newUser', function (Request $request) {
            $parametros = $request->getParsedBody();
            $jsonUser = (isset($parametros['jsonUser'])) ? $parametros['jsonUser'] : null;
            $jsonProfile = (isset($parametros['jsonProfile'])) ? $parametros['jsonProfile'] : null;
            if ($jsonUser != null && $jsonProfile != null) {
                $token = (isset($parametros['token'])) ? $parametros['token'] : null;
                if ($token != null) {
                    $jwt = new \Service\JwtAuth();
                    $helper = new \Service\Helpers();
                    $validacionToken = $jwt->checkToken($token);
                    if ($validacionToken == true) {
                        $fecha_ingreso = date('Y-m-d H:i');
                        $connection = new \Service\Connections();
                        $emailTemplate = new EmailTemplate();
                        $parametrosJsonUser = json_decode($jsonUser);
                        $parametrosJsonProfile = json_decode($jsonProfile);
                        $se_user_email = trim(strtolower((isset($parametrosJsonUser->se_user_email)) ? $parametrosJsonUser->se_user_email : null));
                        $se_user_password = (isset($parametrosJsonUser->se_user_password)) ? $parametrosJsonUser->se_user_password : null;
                        $se_user_state = trim(strtolower((isset($parametrosJsonUser->se_user_state)) ? $parametrosJsonUser->se_user_state : null));
                        $se_role_id_fk_users = (isset($parametrosJsonUser->se_role_id_fk_users)) ? $parametrosJsonUser->se_role_id_fk_users : null;
                        $se_group_id_fk_users = (isset($parametrosJsonUser->se_group_id_fk_users)) ? $parametrosJsonUser->se_group_id_fk_users : null;
                        $se_user_clerk = (isset($parametrosJsonUser->se_user_clerk)) ? $parametrosJsonUser->se_user_clerk : null;

                        $se_profile_identification = trim((isset($parametrosJsonProfile->se_profile_identification)) ? $parametrosJsonProfile->se_profile_identification : null);
                        $se_profile_name = trim(strtolower((isset($parametrosJsonProfile->se_profile_name)) ? $parametrosJsonProfile->se_profile_name : null));
                        $se_profile_surname = trim(strtolower((isset($parametrosJsonProfile->se_profile_surname)) ? $parametrosJsonProfile->se_profile_surname : null));
                        $se_profile_phone = trim(strtolower((isset($parametrosJsonProfile->se_profile_phone)) ? $parametrosJsonProfile->se_profile_phone : null));
                        $se_profile_state = (isset($parametrosJsonProfile->se_profile_state)) ? $parametrosJsonProfile->se_profile_state : null;
                        $se_profile_birthdate = (isset($parametrosJsonProfile->se_profile_birthdate)) ? $parametrosJsonProfile->se_profile_birthdate : null;
                        $se_profile_address = trim(strtolower((isset($parametrosJsonProfile->se_profile_address)) ? $parametrosJsonProfile->se_profile_address : null));
                        $se_profile_phone_cell = strtolower((isset($parametrosJsonProfile->se_profile_phone_cell)) ? $parametrosJsonProfile->se_profile_phone_cell : null);
                        $co_city_id_fk_profiles = strtolower((isset($parametrosJsonProfile->co_city_id_fk_profiles)) ? $parametrosJsonProfile->co_city_id_fk_profiles : null);
                        if ($helper->isValidEmail($se_user_email)) {
                            $se_user_email = strtolower($se_user_email);
                            $sql = "select * from security.se_users se_use where se_use.se_user_email like '$se_user_email'";
                            $r = $connection->complexQuery($sql);
                            if (pg_num_rows($r) == 0) {
                                $sql = "select * from security.se_profiles se_prof where se_prof.se_profile_identification like '$se_profile_identification'";
                                $r = $connection->complexQuery($sql);
                                if (pg_num_rows($r) == 0) {
                                    $activatedCode = time() . rand(0, 1000);
                                    $pasword = 'LTE-' . time() . rand(0, 1000);
                                    $paswordHas = hash('SHA256', $pasword);
                                    $helper->sendEmail('💼 Good Jobs 💼', getenv('EMAIL_EMAIL'), getenv('EMAIL_PASS'),
                                        getenv('EMAIL_SMTP'), getenv('EMAIL_PORT'), getenv('EMAIL_AUTH'),
                                        $se_profile_name . ' ' . $se_profile_surname, $se_user_email, 'Codigo de activacion | Good Jobs',
                                        $emailTemplate->codeActivation($se_profile_name . ' ' . $se_profile_surname, $activatedCode, $pasword), null, null);
                                    //Envio de correo de activacion
                                    $sql = "INSERT INTO security.se_users(
                                        se_user_email, se_user_code, 
                                        se_user_created_at, se_user_state, se_role_id_fk_users, se_group_id_fk_users, se_user_active,se_user_password)
                                        VALUES ('$se_user_email',  '$activatedCode',  '$fecha_ingreso', 'pendiente',  '$se_role_id_fk_users', '$se_group_id_fk_users', '1','$paswordHas') returning se_user_id;";
                                    $r = $connection->complexQueryNonAssociative($sql);
                                    $se_user_id = $r['se_user_id'];
                                    $sql = "INSERT INTO security.se_profiles(
                                         se_profile_identification, se_profile_name, se_profile_surname, se_profile_image, 
                                        se_profile_birthdate, se_profile_address, se_profile_phone, se_profile_phone_cell, se_profile_state, 
                                        co_city_id_fk_profiles, se_user_id_fk_profiles, se_profile_active, se_profile_created_at)
                                        VALUES ('$se_profile_identification', '$se_profile_name', '$se_profile_surname', '', '$se_profile_birthdate', 
                                        '$se_profile_address', '$se_profile_phone', '$se_profile_phone_cell', 'activo', '$co_city_id_fk_profiles', '$se_user_id', '1', '$fecha_ingreso');";
                                    $connection->simpleQuery($sql);
                                    $data = [
                                        'code' => '1001',
                                        'msg' => 'Usuario creado correctamente,Se envio el codigo de activacion al correo electronico.'
                                    ];
                                } else {
                                    $data = [
                                        'code' => '1007',
                                        'msg' => 'Lo sentimos este documento de identidad ya se encuentra registrado'
                                    ];
                                }
                            } else {
                                $data = [
                                    'code' => '1007',
                                    'msg' => 'Lo sentimos este correo ya se encuentra registrado'
                                ];
                            }
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos este correo no existe'
                            ];
                        }
                    } else {
                        $data = [
                            'code' => '1008'
                        ];
                    }
                } else {
                    $data = [
                        'code' => '1008'
                    ];
                }
            } else {
                $data = [
                    'code' => '1007',
                    'msg' => 'JSON, no valido.'
                ];
            }
            echo $helper->checkCode($data);
        });
        $this->post('updated', function (Request $request) {
            $parametros = $request->getParsedBody();
            $jsonUser = (isset($parametros['jsonUser'])) ? $parametros['jsonUser'] : null;
            $jsonProfile = (isset($parametros['jsonProfile'])) ? $parametros['jsonProfile'] : null;
            if ($jsonUser != null && $jsonProfile != null) {
                $token = (isset($parametros['token'])) ? $parametros['token'] : null;
                if ($token != null) {
                    $jwt = new \Service\JwtAuth();
                    $helper = new \Service\Helpers();
                    $validacionToken = $jwt->checkToken($token);
                    if ($validacionToken == true) {
                        $usuarioToken = $jwt->checkToken($token, true);
                        $fecha_ingreso = date('Y-m-d H:i');
                        $connection = new \Service\Connections();
                        $emailTemplate = new EmailTemplate();
                        $parametrosJsonUser = json_decode($jsonUser);
                        $parametrosJsonProfile = json_decode($jsonProfile);
                        $se_user_id = (isset($parametrosJsonUser->se_user_id)) ? $parametrosJsonUser->se_user_id : null;
                        $se_user_email = trim(strtolower((isset($parametrosJsonUser->se_user_email)) ? $parametrosJsonUser->se_user_email : null));
                        $se_user_password = (isset($parametrosJsonUser->se_user_password)) ? $parametrosJsonUser->se_user_password : null;
                        $se_user_state = trim(strtolower((isset($parametrosJsonUser->se_user_state)) ? $parametrosJsonUser->se_user_state : null));
                        $se_role_id_fk_users = (isset($parametrosJsonUser->se_role_id_fk_users)) ? $parametrosJsonUser->se_role_id_fk_users : null;
                        $se_group_id_fk_users = (isset($parametrosJsonUser->se_group_id_fk_users)) ? $parametrosJsonUser->se_group_id_fk_users : null;
                        $se_user_clerk = (isset($parametrosJsonUser->se_user_clerk)) ? $parametrosJsonUser->se_user_clerk : null;

                        $se_profile_identification = trim((isset($parametrosJsonProfile->se_profile_identification)) ? $parametrosJsonProfile->se_profile_identification : null);
                        $se_profile_id = (isset($parametrosJsonProfile->se_profile_id)) ? $parametrosJsonProfile->se_profile_id : null;
                        $se_profile_name = trim(strtolower((isset($parametrosJsonProfile->se_profile_name)) ? $parametrosJsonProfile->se_profile_name : null));
                        $se_profile_surname = trim(strtolower((isset($parametrosJsonProfile->se_profile_surname)) ? $parametrosJsonProfile->se_profile_surname : null));
                        $se_profile_phone = trim(strtolower((isset($parametrosJsonProfile->se_profile_phone)) ? $parametrosJsonProfile->se_profile_phone : null));
                        $se_profile_state = (isset($parametrosJsonProfile->se_profile_state)) ? $parametrosJsonProfile->se_profile_state : null;
                        $se_profile_birthdate = (isset($parametrosJsonProfile->se_profile_birthdate)) ? $parametrosJsonProfile->se_profile_birthdate : null;
                        $se_profile_address = trim(strtolower((isset($parametrosJsonProfile->se_profile_address)) ? $parametrosJsonProfile->se_profile_address : null));
                        $se_profile_phone_cell = strtolower((isset($parametrosJsonProfile->se_profile_phone_cell)) ? $parametrosJsonProfile->se_profile_phone_cell : null);
                        $co_city_id_fk_profiles = strtolower((isset($parametrosJsonProfile->co_city_id_fk_profiles)) ? $parametrosJsonProfile->co_city_id_fk_profiles : null);
                        if ($helper->isValidEmail($se_user_email)) {
                            $sql = "select * from security.se_users se_use where se_use.se_user_email like '$se_user_email'";
                            $r = $connection->complexQueryNonAssociative($sql);
                            if ($r['se_user_id'] == $se_user_id) {
                                $r = 0;
                            }
                            if ($r == 0) {
                                $sql = "select * from security.se_profiles se_prof where se_prof.se_profile_identification like '$se_profile_identification'";
                                $r = $connection->complexQueryNonAssociative($sql);
                                if ($r['se_profile_id'] == $se_profile_id) {
                                    $r = 0;
                                }
                                if ($r == 0) {
                                    $activatedCode = time() . rand(0, 1000);
                                    $helper->sendEmail('💼 Good Jobs 💼', getenv('EMAIL_EMAIL'), getenv('EMAIL_PASS'),
                                        getenv('EMAIL_SMTP'), getenv('EMAIL_PORT'), getenv('EMAIL_AUTH'),
                                        $se_profile_name . ' ' . $se_profile_surname, $se_user_email, '🔔 Nuevo mensaje 📢 | Good Jobs | Los Tres Editores S.A.S',
                                        $emailTemplate->messageInformative('Cambio de datos', 'Se han realizado cambios en su informacion personal, si crees que es un error comunicarse con el soporte tecnico', $usuarioToken->nombre . ' ' . $usuarioToken->apellido), null, null);
                                    //Envio de correo de activacion
                                    $sql = "UPDATE security.se_users
                                            SET  se_user_email='$se_user_email', se_user_state='$se_user_state', se_role_id_fk_users='$se_role_id_fk_users', 
                                            se_group_id_fk_users='$se_group_id_fk_users',se_user_clerk='$se_user_clerk'
                                            WHERE se_user_id='$se_user_id';";
                                    $connection->simpleQuery($sql);
                                    $sql = "UPDATE security.se_profiles
                                            SET se_profile_identification='$se_profile_identification', se_profile_name='$se_profile_name', se_profile_surname='$se_profile_surname', 
                                            se_profile_address='$se_profile_address', se_profile_phone='$se_profile_phone', 
                                            se_profile_phone_cell='$se_profile_phone_cell', se_profile_state='$se_profile_state', 
                                            co_city_id_fk_profiles='$co_city_id_fk_profiles'
                                            WHERE se_profile_id='$se_profile_id';";
                                    $connection->simpleQuery($sql);
                                    $data = [
                                        'code' => '1001',
                                        'msg' => 'Usuario actualizado.'
                                    ];
                                } else {
                                    $data = [
                                        'code' => '1007',
                                        'msg' => 'Lo sentimos este documento de identidad ya se encuentra registrado'
                                    ];
                                }
                            } else {
                                $data = [
                                    'code' => '1007',
                                    'msg' => 'Lo sentimos este correo ya se encuentra registrado'
                                ];
                            }
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos este correo no existe'
                            ];
                        }
                    } else {
                        $data = [
                            'code' => '1008'
                        ];
                    }
                } else {
                    $data = [
                        'code' => '1008'
                    ];
                }
            } else {
                $data = [
                    'code' => '1007',
                    'msg' => 'JSON, no valido.'
                ];
            }
            echo $helper->checkCode($data);
        });
        $this->post('resetPassword', function (Request $request) {
            $parametros = $request->getParsedBody();
            $jsonUser = (isset($parametros['jsonUser'])) ? $parametros['jsonUser'] : null;
            $jsonProfile = (isset($parametros['jsonProfile'])) ? $parametros['jsonProfile'] : null;
            if ($jsonUser != null && $jsonProfile != null) {
                $token = (isset($parametros['token'])) ? $parametros['token'] : null;
                if ($token != null) {
                    $jwt = new \Service\JwtAuth();
                    $helper = new \Service\Helpers();
                    $validacionToken = $jwt->checkToken($token);
                    if ($validacionToken == true) {
                        $usuarioToken = $jwt->checkToken($token, true);
                        $fecha_ingreso = date('Y-m-d H:i');
                        $connection = new \Service\Connections();
                        $emailTemplate = new EmailTemplate();
                        $parametrosJsonUser = json_decode($jsonUser);
                        $parametrosJsonProfile = json_decode($jsonProfile);
                        $se_user_id = (isset($parametrosJsonUser->se_user_id)) ? $parametrosJsonUser->se_user_id : null;
                        $se_profile_identification = (isset($parametrosJsonProfile->se_profile_identification)) ? $parametrosJsonProfile->se_profile_identification : null;
                        $se_profile_name = (isset($parametrosJsonProfile->se_profile_name)) ? $parametrosJsonProfile->se_profile_name : null;
                        $se_profile_surname = (isset($parametrosJsonProfile->se_profile_surname)) ? $parametrosJsonProfile->se_profile_surname : null;
                        $se_user_email = (isset($parametrosJsonUser->se_user_email)) ? $parametrosJsonUser->se_user_email : null;
                        $pasword = 'LTE-' . time() . rand(0, 1000);
                        $paswordHas = trim(hash('SHA256', $pasword));
                        $helper->sendEmail('💼 Good Jobs 💼', getenv('EMAIL_EMAIL'), getenv('EMAIL_PASS'),
                            getenv('EMAIL_SMTP'), getenv('EMAIL_PORT'), getenv('EMAIL_AUTH'),
                            $se_profile_name . ' ' . $se_profile_surname, $se_user_email, '🔐 Cambio de contraseña 🔐| Good Jobs | Los Tres Editores S.A.S',
                            $emailTemplate->resetPassword($se_profile_identification, trim($pasword)), null, null);
                        //Envio de correo de activacion
                        $sql = "UPDATE security.se_users
                                            SET  se_user_password = '$paswordHas' 
                                            WHERE se_user_id='$se_user_id';";
                        $connection->simpleQuery($sql);
                        $data = [
                            'code' => '1001',
                            'msg' => 'Usuario actualizado.'
                        ];

                    } else {
                        $data = [
                            'code' => '1008'
                        ];
                    }
                } else {
                    $data = [
                        'code' => '1008'
                    ];
                }
            } else {
                $data = [
                    'code' => '1007',
                    'msg' => 'JSON, no valido.'
                ];
            }
            echo $helper->checkCode($data);
        });
        $this->post('validateCode', function (Request $request, Response $response, array $args) {
            $parametros = $request->getParsedBody();
            $json = $parametros['json'];
            $helper = new Helpers();
            if ($json != null) {
                $parametros = json_decode($json);
                $correo = (isset($parametros->se_user_email)) ? $parametros->se_user_email : null;
                $contrasena = (isset($parametros->se_user_password)) ? $parametros->se_user_password : null;
                $se_user_code = (isset($parametros->se_user_code)) ? $parametros->se_user_code : null;
                $getHash = (isset($parametros->has)) ? $parametros->has : false;
                $conexion = new Connections();
                $pwd = hash('SHA256', $contrasena);
                $sql = "select * from security.se_users se_user inner join security.se_profiles se_profile on 
                            se_user.se_user_id=se_profile.se_user_id_fk_profiles 
                            where se_profile.se_profile_identification ='$correo' and se_user.se_user_code='$se_user_code' and se_user.se_user_active = '1' and se_user.se_user_state = 'pendiente'";
                $r = $conexion->complexQueryNonAssociative($sql);
                if ($r != 0) {
                    $se_user_id = $r['se_user_id'];
                    $sql = "UPDATE security.se_users
                    SET  se_user_state='activo', se_user_password = '$pwd'
                    WHERE se_user_id='$se_user_id';";
                    $conexion->simpleQuery($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Gracias por activar tu cuenta!'
                    ];
                } else {
                    $data = [
                        'code' => '1007',
                        'msg' => 'Lo sentimos, codigo de activacion incorrecto'
                    ];
                }
            } else {
                $data = [
                    'code' => '1007',
                    'msg' => 'Lo sentimos, no se encontro una cuenta con ese correo'
                ];
            }
            echo $helper->checkCode($data);
        });
    });
});