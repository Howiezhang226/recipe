<?php
include_once "resource/session.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Recipe Meeting </h2><hr>
<?php
if (!isset($_SESSION['uname'])):  ?>
<P>You are currently not signin <a href="signin.php">Signin</a> Not yet a member? <a href="signup.php">Signup</a> </P>
<?php else: ?>
<p>You are logged in as <?php echo $_SESSION['uname']?> <a href="logout.php">Logout</a> </p>
<?php endif; ?>

</body>
</html>