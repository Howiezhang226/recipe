<?php
include_once 'resource/Database.php';
var_dump($_POST);
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $loginname = $_POST['loginname'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $hash_password = password_hash($password,PASSWORD_DEFAULT);
    try{
        $sqlInsert = "INSERT INTO RECIPE.USER (uname, ugender, uloginname, upassword, uage) 
                  VALUES (:uname, :ugender, :uloginname, :upassword, :uage)";
        //use prepared sql to avoid sql injection
        $statement = $db -> prepare($sqlInsert);
        $statement -> execute(
            array(
                ':uname' => $username,
                ':ugender'=> $gender,
                ':uloginname' => $loginname,
                ':upassword' => $hash_password,
                ':uage' => $age
            ));
        echo $statement -> rowCount();
//        if ($statement -> rowCount() == 1) {
//            $result =  "<p> registeration successful! <p>";
//        }
    } catch (PDOException $pdoex) {
        echo $pdoex -> getMessage();
        $result = "<p> An error! <p>";
    }

}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Register Page</title>
</head>
<body>
<h2>Recipe Meeting </h2><hr>

<h3>Registration Form</h3>
<?php
if (isset($result)) {
    echo $result;
}

?>
<form method="post" action="">
    <table>
        <tr><td>Username:</td> <td><input type="text" value="" name="username"></td></tr>
        <tr><td>loginname:</td> <td><input type="text" value="" name="loginname"></td></tr>
        <tr><td>Password:</td> <td><input type="password" value="" name="password"></td></tr>
        <tr><td>Age:</td> <td><input type="number" value="" name="age"></td></tr>
        <tr>
            <td>Gender:</td>
        <td>
            <input type="radio" name="gender" value="m"> Male
            <input type="radio" name="gender" value="f"> Female
        </td>
        </tr>
        <tr><td></td><td><input style="float: right;" type="submit" value="Signup"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>
</body>
</html>