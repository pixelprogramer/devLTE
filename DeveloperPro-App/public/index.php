<?php
/**
 * Created by DeveloperPro ®.
 * User: Gilberto Guerrero Quinayas
 * Date: 18/09/2018
 * Time: 11:40 AM
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Allow: GET, POST, OPTIONS, PUT, DELETE');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'OPTIONS') {
    die();
}

$config = ['settings' => [
    'addContentLengthHeader' => false,
]];

require '..\vendor\autoload.php';

$app = new Slim\App($config);

$dotEnv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotEnv->load();


# Controllers
//Security
require '..\app\Controller\Security\User.php';
require '..\app\Controller\Security\Menus.php';
require '..\app\Controller\Security\Role.php';
require '..\app\Controller\Security\Sub_menu.php';
require '..\app\Controller\Security\Header.php';
require '..\app\Controller\Security\Group.php';
//Configuration
require '..\app\Controller\Configuration\City.php';
require '..\app\Controller\Configuration\Country.php';
require '..\app\Controller\Configuration\Departement.php';
//Erp
require '..\app\Controller\Erp\InventoryType.php';
require '..\app\Controller\Erp\InventoryCategory.php';
require '..\app\Controller\Erp\Inventory.php';
require '..\app\Controller\Erp\Cellar.php';
require '..\app\Controller\Erp\productType.php';
# Services
require '..\app\Service\Helpers.php';
require '..\app\Service\JwtAuth.php';
require '..\app\Service\Connections.php';
require '..\app\Service\EmailTemplate.php';

try {
    $app->run(false);
} catch (\Slim\Exception\MethodNotAllowedException $e) {
    var_dump($e);
} catch (\Slim\Exception\NotFoundException $e) {
    var_dump($e);
} catch (\UnexpectedValueException $e) {
    var_dump($e);
} catch (\Exception $e) {
    var_dump($e);
}