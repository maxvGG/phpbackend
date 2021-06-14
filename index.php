
<?php
include 'form.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Request-Method: *");
header("Access-Control-Allow-Methods: POST, PUT, DELETE, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

// kijken naar $action om te zorgen dat de er User voor komt te staan of niet zodat je kan switchen
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$body = json_decode(file_get_contents('php://input'), true);

$controller = sprintf('%sUserController', ucfirst($action));
$path = sprintf('%s/controllers/%s.php', dirname(__FILE__), $controller);
echo "<table style='border: 1px solid black' >";
echo "<tr style='border: 1px solid black'>
        <th style='border: 1px solid black' colspan='2'>id</th>
            <th style='border: 1px solid black'colspan='2'>name</th>
            <th style='border: 1px solid black'colspan='2'>parent id</th>
        </tr>";

if (file_exists($path) === true) {
    require_once $path;
    $instance = new $controller(null);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $instance->post($body);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $instance->get($body);
        exit;
    }

}
echo "</table>";

http_response_code(400);
exit;
