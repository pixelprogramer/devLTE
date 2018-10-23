<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-erp/', function () {
    $this->group('cellar/', function () {
        $this->post('new', function (Request $request) {
            $helper = new \Service\Helpers();
            $parametros = $request->getParsedBody();
            $json = (isset($parametros['json'])) ? $parametros['json'] : null;
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $fecha_ingreso = date('Y-m-d H:i');
                    $connection = new \Service\Connections();
                    $parametros = json_decode($json);
                    $er_cellar_description = trim(strtolower((isset($parametros->er_cellar_description)) ? $parametros->er_cellar_description : null));
                    $sql = "select * from erp.er_wineries  er_w where er_w.er_cellar_description like '$er_cellar_description' and er_w.er_cellar_active = '1'";
                    $r = $connection->complexQueryNonAssociative($sql);
                    if ($r == 0) {
                        $er_cellar_state = trim(strtolower((isset($parametros->er_cellar_state)) ? $parametros->er_cellar_state : null));
                        $er_cellar_code = trim(strtolower((isset($parametros->er_cellar_code)) ? $parametros->er_cellar_code : null));
                        $sql = "select * from erp.er_wineries  er_w where er_w.er_cellar_code like '$er_cellar_code'";
                        $r = $connection->complexQueryNonAssociative($sql);
                        if ($r == 0) {
                            $sql = "INSERT INTO erp.er_wineries(
                                er_cellar_code, er_cellar_description, 
                                er_cellar_state, er_cellar_active, er_cellar_created_at)
                                VALUES ('$er_cellar_code', '$er_cellar_description', '$er_cellar_state', '1', '$fecha_ingreso');";
                            $connection->simpleQuery($sql);
                            $data = [
                                'code' => '1001',
                                'msg' => 'Item creado de forma correcta'
                            ];
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos, este codigo ya esta asociado a una bodega'
                            ];
                        }
                    } else {
                        $data = [
                            'code' => '1007',
                            'msg' => 'Lo sentimos, este item ya existe'
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
            echo $helper->checkCode($data);
        });
        $this->post('updated', function (Request $request) {
            $parametros = $request->getParsedBody();
            $json = (isset($parametros['json'])) ? $parametros['json'] : null;
            $helper = new \Service\Helpers();
            if ($json != null) {
                $token = (isset($parametros['token'])) ? $parametros['token'] : null;
                if ($token != null) {
                    $jwt = new \Service\JwtAuth();
                    $validacionToken = $jwt->checkToken($token);
                    if ($validacionToken == true) {
                        $fecha_ingreso = date('Y-m-d H:i');
                        $connection = new \Service\Connections();
                        $parametros = json_decode($json);
                        $er_cellar_id = trim(strtolower((isset($parametros->er_cellar_id)) ? $parametros->er_cellar_id : null));
                        $er_cellar_description = trim(strtolower((isset($parametros->er_cellar_description)) ? $parametros->er_cellar_description : null));
                        $sql = "select * from erp.er_wineries  er_w where er_w.er_cellar_description like '$er_cellar_description'";
                        $r = $connection->complexQueryNonAssociative($sql);
                        $r2 = $r;
                        if ($r['er_cellar_id'] == $er_cellar_id) {
                            $r = 0;
                        }
                        if ($r == 0) {
                            if ($r2['er_cellar_active'] == 1) {
                                $er_cellar_state = trim(strtolower((isset($parametros->er_cellar_state)) ? $parametros->er_cellar_state : null));
                                $er_cellar_code = trim(strtolower((isset($parametros->er_cellar_code)) ? $parametros->er_cellar_code : null));
                                $sql = "select * from erp.er_wineries  er_w where er_w.er_cellar_code like '$er_cellar_code'";
                                if ($r['er_cellar_id'] == $er_cellar_id) {
                                    $r = 0;
                                }
                                if ($r == 0) {
                                    $sql = "UPDATE erp.er_wineries
                                            SET er_cellar_code='$er_cellar_code', er_cellar_description='$er_cellar_description',
                                             er_cellar_state='$er_cellar_state'
                                            WHERE er_cellar_id='$er_cellar_id';";
                                    $connection->simpleQuery($sql);
                                    $data = [
                                        'code' => '1001',
                                        'msg' => 'Item actualizado de forma correcta'
                                    ];
                                } else {
                                    $data = [
                                        'code' => '1007',
                                        'msg' => 'Lo sentimos, este codigo ya esta asociado a una bodega'
                                    ];
                                }
                            } else {
                                $data = [
                                    'code' => '1007',
                                    'msg' => 'Lo sentimos, este item ya no exite volver a cargar'
                                ];
                            }
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos, este item ya existe'
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
        $this->post('list', function (Request $request) {
            $parametros = $request->getParsedBody();
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select * from erp.er_wineries er_w where er_w.er_cellar_active = '1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Bodegas cargadas',
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
    });
});