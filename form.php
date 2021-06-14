<?php
require_once 'controllers/UserController.php';

if (isset($_POST['submit'])) {
    // validate entries
    $User = new UserController($_POST);
    $errors = $User->validateForm();
    $User->validateForm();

    // save to db
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form method="post">
            <label for="email">Email</label>
            <input type="text" placeholder="please enter your email" name='email'>
            <div class="error">
                <?php echo $errors['email']  ?? '' ?>
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