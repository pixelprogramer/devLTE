<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->group('/api-configuration/', function () {
    $this->group('departaments/', function () {
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
                        $co_department_code = strtolower((isset($parametrosJson->co_department_code)) ? $parametrosJson->co_department_code : null);
                        $co_department_description = strtolower((isset($parametrosJson->co_department_description)) ? $parametrosJson->co_department_description : null);
                        $co_department_state = (isset($parametrosJson->co_department_state)) ? $parametrosJson->co_department_state : null;
                        $co_country_id_fk_departments = (isset($parametrosJson->co_country_id_fk_departments)) ? $parametrosJson->co_country_id_fk_departments : null;
                        $sql = "INSERT INTO configuration.co_departments(
                                co_country_id_fk_departments, co_department_description, co_department_code, 
                                co_department_state, co_department_active, co_department_created_at)
                                VALUES ('$co_country_id_fk_departments', '$co_department_description', '$co_department_code', '$co_department_state', '1', '$fecha_ingreso');";
                        $connection->complexQuery($sql);
                        $data = [
                            'code' => '1001',
                            'msg'=>'Departamento creado de forma correcta'
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
            $id= (isset($parametros['id'])) ? $parametros['id'] : null;
            if ($token != null) {
                $jwt = new \Service\JwtAuth();
                $helper = new \Service\Helpers();
                $validacionToken = $jwt->checkToken($token);
                if ($validacionToken == true) {
                    $connection = new \Service\Connections();
                    $sql = "select co_depa.* from configuration.co_departments co_depa 
                            where co_depa.co_department_active = '1' and co_depa.co_country_id_fk_departments = '$id'";
                    $r = $connection->complexQueryAssociative($sql);
                    $data = [
                        'code' => '1001',
                        'msg' => 'Departamentos cargados ',
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