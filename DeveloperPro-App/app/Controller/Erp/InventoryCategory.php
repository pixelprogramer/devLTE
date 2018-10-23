<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-erp/', function () {
    $this->group('inventoryCategory/', function () {
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
                    $er_inventory_category_description = trim(strtolower((isset($parametros->er_inventory_category_description)) ? $parametros->er_inventory_category_description : null));
                    $sql = "select * from erp.er_inventory_categorys  er_ic where er_ic.er_inventory_category_description like '$er_inventory_category_description'";
                    $r = $connection->complexQueryNonAssociative($sql);
                    if ($r == 0) {
                        $er_inventory_category_state = trim(strtolower((isset($parametros->er_inventory_category_state)) ? $parametros->er_inventory_category_state : null));
                        $sql = "INSERT INTO erp.er_inventory_categorys(
                                er_inventory_category_description, er_inventory_category_state, 
                                er_inventory_category_active, er_inventory_category_created_at)
                                VALUES ('$er_inventory_category_description', '$er_inventory_category_state', '1', '$fecha_ingreso');";
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
                        $er_inventory_category_id = trim(strtolower((isset($parametros->er_inventory_category_id)) ? $parametros->er_inventory_category_id : null));
                        $er_inventory_category_description = trim(strtolower((isset($parametros->er_inventory_category_description)) ? $parametros->er_inventory_category_description : null));
                        $sql = "select * from erp.er_inventory_categorys  er_ic where er_ic.er_inventory_category_description like '$er_inventory_category_description'";
                        $r = $connection->complexQueryNonAssociative($sql);
                        if ($r['er_inventory_category_id'] == $er_inventory_category_id) {
                            $r = 0;
                        }
                        if ($r == 0) {
                            $er_inventory_category_state = trim(strtolower((isset($parametros->er_inventory_category_state)) ? $parametros->er_inventory_category_state : null));
                            $sql = "UPDATE erp.er_inventory_categorys
                                    SET er_inventory_category_description='$er_inventory_category_description', 
                                    er_inventory_category_state='$er_inventory_category_state'
                                    WHERE er_inventory_category_id='$er_inventory_category_id';";
                            $connection->simpleQuery($sql);
                            $data = [
                                'code' => '1001',
                                'msg' => 'Item actualizado de forma correcta'
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
                    $sql = "select er_ic.* from erp.er_inventory_categorys er_ic where er_ic.er_inventory_category_active='1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Tipo de inventarios cargados',
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
        $this->post('listActive', function (Request $request) {
            $parametros = $request->getParsedBody();
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select er_ic.* from erp.er_inventory_categorys er_ic where er_ic.er_inventory_category_active='1' 
                            and er_ic.er_inventory_category_state like 'activo'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Tipo de inventarios cargados',
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