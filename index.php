
<?php
include 'form.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Request-Method: *");
header("Access-Control-Allow-Methods: POST, PUT, DELETE, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$body = json_decode(file_get_contents('php://input'), true);
$controller = sprintf('%sUserController', ucfirst($action));
$path = sprintf('%s/controllers/%s.php', dirname(__FILE__), $controller);
if (file_exists($path) === true) {
    require_once $path;
    $instance = new $controller(null);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo $instance->post($body);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        echo $instance->get($body);
        exit;
    }
}

http_response_code(400);
exit;
