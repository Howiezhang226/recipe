<?php
include_once "resource/database.php";
include_once "resource/session.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $sqlQuery = "SELECT * FROM recipe.User WHERE uname = :uname";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':uname' => $uname));

    while ($row = $statement->fetch()) {
        $uname = $row['uname'];
        $hashed_password = $row['upassword'];
        $uloginname = $row['uloginname'];
        $ugender = $row['ugender'];
        $uage = $row['uage'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['uname'] = $uname;
            $_SESSION['loginname'] = $uloginname;
            header("location: index.php");
        } else {
            $result = "<p style='padding: 20px; color: red; border: 1px solid gray;'> Invalid username or password</p>";
        }
    }
}
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

<h3>Login Form</h3>
<?php if (isset($result)) {
    echo $result;
}?>
<form method="post" action="">
    <table>
        <tr><td>Username:</td> <td><input type="text" name="username" value=""></td></tr>
        <tr><td>Password:</td> <td><input type="password" name="password" value=""></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" value="Signin"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>