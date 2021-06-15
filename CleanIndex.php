<?php
// class needed for user authentication
require_once 'controllers/UserController.php';

// headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Request-Method: *");
header("Access-Control-Allow-Methods: POST, PUT, DELETE, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$body = json_decode(file_get_contents('php://input'), true);

$controller = sprintf('%sUserController', ucfirst($action));
$path = sprintf('%s/controllers/%s.php', dirname(__FILE__), $controller);

if (isset($_POST['submit'])) {
    // validate entries
    $User = new UserController($_POST);
    $errors = $User->validateForm();

    // save to db
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>social brothers</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>socialbrother-backend-case-php</title>
    </head>

    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <label for="email">Email</label>
            <input type="text" placeholder="please enter your email" name='email'>
            <div class="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>
            <label for="password">password</label>
            <input type="password" placeholder="please enter your password" name='password'>
            <div class="error">
                <?php echo $errors['password'] ?? '' ?>
            </div>
            <input type="submit" value="submit" name='submit'>
        </form>
        <table style='border: 1px solid black'>
            <tr style='border: 1px solid black'>
                <th style='border: 1px solid black' colspan='2'>id</th>
                <th style='border: 1px solid black' colspan='2'>name</th>
                <th style='border: 1px solid black' colspan='2'>parent id</th>
            </tr>
            <?php
            if (file_exists($path) === true) {
                require_once $path;
                $instance = new $controller(null);

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // $instance->post($body);
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $instance->get($body);
                    exit;
                }
            }
            ?>
        </table>
    </body>

    </html>
</body>

</html>
<?php
http_response_code(400);
exit;
?>