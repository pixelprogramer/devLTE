<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-erp/', function () {
    $this->group('productType/', function () {
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
                    $er_products_type_description = trim(strtolower((isset($parametros->er_products_type_description)) ? $parametros->er_products_type_description : null));
                    $er_products_type_code = trim(strtolower((isset($parametros->er_products_type_code)) ? $parametros->er_products_type_code : null));
                    $sql = "select * from erp.er_products_types  er_pt where er_pt.er_products_type_description like '$er_products_type_description' and er_pt.er_products_type_active = '1'";
                    $r = $connection->complexQueryNonAssociative($sql);
                    if ($r == 0) {
                        $er_products_type_state = trim(strtolower((isset($parametros->er_products_type_state)) ? $parametros->er_products_type_state : null));
                        $sql = "INSERT INTO erp.er_products_types(
                                er_products_type_description, 
                                er_products_type_state, er_products_type_active, er_products_type_created_at,er_products_type_code)
                                VALUES ('$er_products_type_description', '$er_products_type_state', '1', '$fecha_ingreso','$er_products_type_code');";
                        $connection->simpleQuery($sql);
                        $data = [
                            'code' => '1001',
                            'msg' => 'Item creado de forma correcta'
                        ];

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
                        $er_products_type_id = trim(strtolower((isset($parametros->er_products_type_id)) ? $parametros->er_products_type_id : null));
                        $er_products_type_description = trim(strtolower((isset($parametros->er_products_type_description)) ? $parametros->er_products_type_description : null));
                        $sql = "select * from erp.er_products_types  er_pt where er_pt.er_products_type_description like '$er_products_type_description'";
                        $r = $connection->complexQueryNonAssociative($sql);
                        $r2 = $r;
                        if ($r['er_products_type_id'] == $er_products_type_id) {
                            $r = 0;
                        }
                        if ($r == 0) {
                            if ($r2['er_products_type_active'] == 1) {
                                $er_products_type_state = trim(strtolower((isset($parametros->er_products_type_state)) ? $parametros->er_products_type_state : null));
                                $sql = "UPDATE erp.er_products_types
                                        SET  er_products_type_description='$er_products_type_description', 
                                        er_products_type_state='$er_products_type_state'
                                        WHERE er_products_type_id='$er_products_type_id';";
                                $connection->simpleQuery($sql);
                                $data = [
                                    'code' => '1001',
                                    'msg' => 'Item actualizado de forma correcta'
                                ];

                            } else {
                                $data = [
                                    'code' => '1007',
                                    'msg' => 'Lo sentimos, este item ya no exite, volver a cargar'
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
                    $sql = "select * from erp.er_products_types er_pt where er_pt.er_products_type_active = '1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Tipo de producto cargado',
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