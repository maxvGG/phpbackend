<?php
require_once 'controllers/UserController.php';

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

    </body>

    </html>
</body>

</html>