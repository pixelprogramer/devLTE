<?php


use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-erp/', function () {
    $this->group('inventory/', function () {
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
                    $er_inventory_description = trim(strtolower((isset($parametros->er_inventory_description)) ? $parametros->er_inventory_description : null));
                    $sql = "select * from erp.er_inventories  er_i where er_i.er_inventory_description like '$er_inventory_description' and er_i.er_inventory_active = '1'";
                    $r = $connection->complexQueryNonAssociative($sql);
                    if ($r == 0) {
                        $userToken = $jwt->checkToken($token, true);
                        $user_id = $userToken->sub;
                        $er_inventory_state = trim(strtolower((isset($parametros->er_inventory_state)) ? $parametros->er_inventory_state : null));
                        $er_inventory_category_id_fk_inventories = trim(strtolower((isset($parametros->er_inventory_category_id_fk_inventories)) ? $parametros->er_inventory_category_id_fk_inventories : null));
                        $sql = "INSERT INTO erp.er_inventories(
                                er_inventory_category_id_fk_inventories, er_inventory_description, er_inventory_state,
                                 er_inventory_active, er_inventory_created_at, se_user_id_fk_inventorie)
                                VALUES ('$er_inventory_category_id_fk_inventories', '$er_inventory_description', '$er_inventory_state', '1', '$fecha_ingreso', '$user_id');";
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
                        $er_inventory_id = trim(strtolower((isset($parametros->er_inventory_id)) ? $parametros->er_inventory_id : null));
                        $er_inventory_description = trim(strtolower((isset($parametros->er_inventory_description)) ? $parametros->er_inventory_description : null));
                        $sql = "select * from erp.er_inventories  er_i where er_i.er_inventory_description like '$er_inventory_description'";
                        $r = $connection->complexQueryNonAssociative($sql);
                        $r2 = $r;
                        if ($r['er_inventory_id'] == $er_inventory_id) {
                            $r = 0;
                        }
                        if ($r == 0) {
                            if ($r2['er_inventory_active'] == 1) {
                                $er_inventory_state = trim(strtolower((isset($parametros->er_inventory_state)) ? $parametros->er_inventory_state : null));
                                $er_inventory_category_id_fk_inventories = trim(strtolower((isset($parametros->er_inventory_category_id_fk_inventories)) ? $parametros->er_inventory_category_id_fk_inventories : null));
                                $sql = "UPDATE erp.er_inventories
                                        SET  er_inventory_category_id_fk_inventories='$er_inventory_category_id_fk_inventories',
                                         er_inventory_description='$er_inventory_description',
                                         er_inventory_state='$er_inventory_state'
                                        WHERE er_inventory_id='$er_inventory_id';";
                                $connection->simpleQuery($sql);
                                $data = [
                                    'code' => '1001',
                                    'msg' => 'Item actualizado de forma correcta'
                                ];
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
                    $sql = "select er_i.*,er_ic.er_inventory_category_description from erp.er_inventories er_i 
                            inner join erp.er_inventory_categorys er_ic on
                             er_i.er_inventory_category_id_fk_inventories=er_ic.er_inventory_category_id
                             where er_i.er_inventory_active='1' ";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Inventario cargados',
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