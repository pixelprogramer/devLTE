<?php
/**
 * Created by DeveloperPro ®.
 * User: Gilberto Guerrero Quinayas
 * Date: 22/09/2018
 * Time: 4:28 PM
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-configuration/', function () {
    $this->group('city/', function () {
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
                        $co_citie_code = strtolower((isset($parametrosJson->co_citie_code)) ? $parametrosJson->co_citie_code : null);
                        $co_citie_description = strtolower((isset($parametrosJson->co_citie_description)) ? $parametrosJson->co_citie_description : null);
                        $co_citie_state = (isset($parametrosJson->co_citie_state)) ? $parametrosJson->co_citie_state : null;
                        $co_department_id_fk_cities = trim((isset($parametrosJson->co_department_id_fk_cities)) ? $parametrosJson->co_department_id_fk_cities : null);
                        $sql = "select co_ci.* from configuration.co_cities co_ci where co_ci.co_department_id_fk_cities = '$co_department_id_fk_cities'
                                and co_ci.co_citie_active = '1' and co_ci.co_citie_description like '$co_citie_description';";
                        $r = $connection->complexQueryAssociative($sql);
                        if ($r == 0) {
                            $sql = "INSERT INTO configuration.co_cities(
                                co_department_id_fk_cities, co_citie_code, 
                                co_citie_description, co_citie_state, co_citie_active, co_citie_created_at)
                                VALUES ('$co_department_id_fk_cities', '$co_citie_code', '$co_citie_description', '$co_citie_state', '1', '$fecha_ingreso');";
                            $connection->complexQuery($sql);
                            $data = [
                                'code' => '1001',
                                'msg' => 'Ciudad creado de forma correcta'
                            ];
                        } else {
                            $data = [
                                'code' => '1007',
                                'msg' => 'Esta ciudad ya existe: ' . $co_citie_description
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
            $id = (isset($parametros['id'])) ? $parametros['id'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select co_ci.* from configuration.co_cities co_ci where co_ci.co_department_id_fk_cities = '$id' and co_ci.co_citie_active = '1';";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Ciudades cargados',
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