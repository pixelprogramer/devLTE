<?php
    /**
     * Created by DeveloperPro ®.
     * User: Gilberto Guerrero Quinayas
     * Date: 22/09/2018
     * Time: 4:27 PM
     */
    
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    $app->group('/api-configuration/', function () {
        $this->group('countries/', function () {
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
                            $co_country_code = strtolower((isset($parametrosJson->co_country_code)) ? $parametrosJson->co_country_code : null);
                            $co_country_description = strtolower((isset($parametrosJson->co_country_description)) ? $parametrosJson->co_country_description : null);
                            $co_country_state = (isset($parametrosJson->co_country_state)) ? $parametrosJson->co_country_state : null;
                            $sql = "INSERT INTO configuration.co_countries(
                                co_country_code, co_country_description, co_country_state, co_country_active, co_country_created_at)
                                VALUES ('$co_country_code', '$co_country_description', '$co_country_state', '1', '$fecha_ingreso');";
                            $connection->complexQuery($sql);
                            $data = [
                                'code' => '1001',
                                'msg'=>'Pais creado de forma correcta'
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
                        $sql = "select co_coun.* from configuration.co_countries co_coun where co_coun.co_country_active = '1'";
                        $r = $connection->complexQueryAssociative($sql);
                        $data = [
                            'code' => '1001',
                            'msg' => 'Paises cargados ',
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