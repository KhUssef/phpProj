<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='cssobjs/signup.css' />
    <script src='./jsobjs/signup.js' type="module" defer></script>
    <title>signup</title>
    <link rel="icon" href="/assets/logo.svg">

</head>

<body>

    <form class="form" action="signingup.php" method="post" enctype="multipart/form-data">
        <p class="title">Register </p>
        <label>
            <input class="input" type="text" name='fullname' id='fullname' placeholder="" required="">
            <span>fullname</span>
        </label>
        <label>
            <input class="input" type="email" name='mail' id='mail' placeholder="" required="">
            <span>Email</span>
        </label>

        <label>
            <input class="input" type="password" name='pwd' id='pwd' placeholder="" required="">
            <span>Password</span>
        </label>
        <label>
            <input class="input" type="password" name='pwdc' id='pwdc' placeholder="" required="">
            <span>Confirm password</span>
        </label>
        <div class="body">
            <div class="tabs">
                <input checked="" value="user" name="seeking" id="user" type="radio" class="input" />
                <label for="user" class="label">user</label>
                <input value="admin" name="seeking" id="admin" type="radio" class="input" />
                <label for="admin" class="label">admin</label>
            </div>
        </div>
        <button class="submit">Submit</button>
        <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>
    </form>
</body>
<?php
if (isset($_COOKIE["error_sign"])) { ?>
<script>
alert('email already in use');
</script>
<?php setcookie("error_sign", '');
}
?>

</html>