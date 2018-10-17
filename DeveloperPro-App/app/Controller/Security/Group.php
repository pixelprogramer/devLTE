<?php
/**
 * Created by DeveloperPro ®.
 * User: Gilberto Guerrero Quinayas
 * Date: 21/09/2018
 * Time: 3:20 PM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-security/', function () {
    $this->group('groups/', function () {
        $this->post('new', function (Request $request) {
            $parametros = $request->getParsedBody();
            $json = (isset($parametros['json'])) ? $parametros['json'] : null;
            if ($json != null) {
                $token = (isset($parametros['token'])) ? $parametros['token'] : null;
                if ($token != null) {
                    $jwt = new \Service\JwtAuth();
                    $helper = new \Service\Helpers();
                    $validacionToken = $jwt->checkToken($token);
                    if ($validacionToken == true) {
                        $fecha_ingreso = date('Y-m-d H:i');
                        $connection = new \Service\Connections();
                        $parametrosJson = json_decode($json);
                        $se_group_description = (isset($parametrosJson->se_group_description)) ? $parametrosJson->se_group_description : null;
                        $se_group_state = (isset($parametrosJson->se_group_state)) ? $parametrosJson->se_group_state : null;
                        $se_coordinator_id_fk_groups = (isset($parametrosJson->se_coordinator_id_fk_groups)) ? $parametrosJson->se_coordinator_id_fk_groups : null;
                        $se_alternate_id_fk_groups = (isset($parametrosJson->se_alternate_id_fk_groups)) ? $parametrosJson->se_alternate_id_fk_groups : null;
                        $sql = "select * from security.se_groups se_gro where se_gro.se_coordinator_id_fk_groups = '$se_coordinator_id_fk_groups';";
                        $r = $connection->complexQuery($sql);
                        if (pg_num_rows($r) == 0) {
                            $sql = "select * from security.se_groups se_gro where se_gro.se_alternate_id_fk_groups = '$se_alternate_id_fk_groups';";
                            $r = $connection->complexQuery($sql);
                            if (pg_num_rows($r) == 0) {
                                $sql = "INSERT INTO security.se_groups(
                                        se_group_description, se_group_state, 
                                        se_coordinator_id_fk_groups, se_alternate_id_fk_groups, se_group_active)
                                        VALUES ('$de_group_description', '$se_group_state', '$se_coordinator_id_fk_groups', '$se_alternate_id_fk_groups', '1');";
                                $r = $connection->simpleQuery($sql);
                                $data = [
                                    'code' => '1001',
                                    'msg' => 'Grupo creado de forma correcta'
                                ];
                            } else {
                                $data = [
                                    'code' => '1007',
                                    'msg' => 'Lo sentimos, el sub coordinador seleccionado ya se encuentra en una coordinacion'
                                ];
                            }
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Lo sentimos, el coordinador seleccionado ya se encuentra en una coordinacion'
                            ];
                        }
                        $data = [
                            'code' => '1001',
                            'msg' => 'Rol creado de forma correcta'
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
        $this->post('list', function (Request $request) {
            $parametros = $request->getParsedBody();
            $token = (isset($parametros['token'])) ? $parametros['token'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select se_group.* from security.se_groups se_group where se_group.se_group_active = '1';";
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
    });
});