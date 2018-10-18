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
                        $se_group_description = strtolower((isset($parametrosJson->se_group_description)) ? $parametrosJson->se_group_description : null);
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
                                        VALUES ('$se_group_description', '$se_group_state', '$se_coordinator_id_fk_groups', '$se_alternate_id_fk_groups', '1');";
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
        $this->post('update', function (Request $request) {
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
                        $se_group_id = (isset($parametrosJson->se_group_id)) ? $parametrosJson->se_group_id : null;
                        $se_group_description = strtolower((isset($parametrosJson->se_group_description)) ? $parametrosJson->se_group_description : null);
                        $se_group_state = (isset($parametrosJson->se_group_state)) ? $parametrosJson->se_group_state : null;
                        $se_coordinator_id_fk_groups = (isset($parametrosJson->se_coordinator_id_fk_groups)) ? $parametrosJson->se_coordinator_id_fk_groups : null;
                        $se_alternate_id_fk_groups = (isset($parametrosJson->se_alternate_id_fk_groups)) ? $parametrosJson->se_alternate_id_fk_groups : null;
                        $se_group_active = (isset($parametrosJson->se_group_active)) ? $parametrosJson->se_group_active : null;
                        $sql = "select * from security.se_groups se_gro where se_gro.se_coordinator_id_fk_groups = '$se_coordinator_id_fk_groups';";
                        $r = $connection->complexQueryNonAssociative($sql);
                        if ($r['se_group_id'] == $se_group_id) {
                            $r = 0;
                        }
                        if (pg_num_rows($r) == 0) {
                            $sql = "select * from security.se_groups se_gro where se_gro.se_alternate_id_fk_groups = '$se_alternate_id_fk_groups';";
                            $r = $connection->complexQueryNonAssociative($sql);
                            if ($r['se_group_id'] == $se_group_id) {
                                $r = 0;
                            }
                            if (pg_num_rows($r) == 0) {
                                $sql = "UPDATE security.se_groups
                                        SET se_group_description='$se_group_description', se_group_state='$se_group_state', 
                                        se_coordinator_id_fk_groups='$se_coordinator_id_fk_groups', 
                                        se_alternate_id_fk_groups='$se_alternate_id_fk_groups', se_group_active='$se_group_active'
                                        WHERE se_group_id='$se_group_id';";
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
                    $sql = "select se_gro.*, se_pro.se_profile_name as se_name_coordinador,se_proS.se_profile_name as se_name_alternate from security.se_groups se_gro 
                            inner join security.se_users se_use on se_gro.se_coordinator_id_fk_groups=se_use.se_user_id
                            inner join security.se_users se_useS on se_gro.se_alternate_id_fk_groups = se_useS.se_user_id
                            inner join security.se_profiles se_pro on se_use.se_user_id=se_pro.se_user_id_fk_profiles
                            inner join security.se_profiles se_proS on se_useS.se_user_id=se_proS.se_user_id_fk_profiles 
                            where se_gro.se_group_active = '1'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Grupos cargados ',
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