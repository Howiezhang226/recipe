<?php
$page_title = "Sign Up";
include_once 'resource/database.php';
include_once "partials/headers.php";
if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    $loginname = htmlspecialchars($_POST['loginname']);
    $password = htmlspecialchars($_POST['password']);
    $age = htmlspecialchars($_POST['age']);
    $gender = htmlspecialchars($_POST['gender']);
    //$result = "<p style='padding: 20px; color: red; border: 1px solid gray;'> Invalid username or password</p>";

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
        if ($statement -> rowCount() == 1) {
            $result =  "<p> registeration successful! <p>";
            header("location:signin.php");

        }
        else {
            throw new Exception();
        }
    } catch (Exception $exception) {
        $error = "<p style='padding: 20px; color: red; border: 1px solid gray;'>It seems something wrong!</p>";
        echo $exception -> getMessage();
    }

}
?>

<div class="container">
    <section class="col col-lg-7 ">
        <h3>Registration Form</h3><hr>

        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <form method="post" action="">
            <div  class="form-group">
                <label for="UsernameField">Username</label>
                <input class="form-control" type="text" value="" name="username" id="UsernameField">
            </div>
            <div  class="form-group">
                <label for="loginnameField">Loginname</label>
                <input class="form-control" type="text" value="" name="loginname" id="loginnameField">
            </div>
            <div class="form-group">
                <label for="PasswordField">Password</label>
                <input class="form-control" type="password" value="" name="password" id="PasswordField">
            </div>
            <div  class="form-group">
                <label for="AgeField">Age</label>
                <input class="form-control" type="number" value="" name="age" id="AgeField">
            </div>
            <label for="GenderField">Gender</label>
            <div class="radio-inline">
                <label class="radio-inline">
                    <input type="radio" name="gender" value="m" id="GenderField">
                    Male
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="gender" value="f" id="GenderField">
                    Female
                </label>
            </div>
            <div></div>

            <button type="submit"  class="btn btn-primary pull-right">Sign Up</button>
        </form>
        <p><a href="index.php">Back</a> </p>
    </section>



</div><!-- /.container -->


<?php
include_once "partials/footers.php"
?>
