<?php
$page_title = "Sign In";
include_once "resource/database.php";
include_once "resource/session.php";
include_once "partials/headers.php";


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
                header("location:index.php");
            } else {
                $result = "<p style='padding: 20px; color: red; border: 1px solid gray;'> Invalid username or password</p>";
            }
        }
    }

?>


<div class="container">

    <section class="col col-lg-7">
        <h3>Login Form</h3>


        <form method="post" action="">
            <div class="form-group">
                <label for="UsernameField">Username</label>
                <input id="UsernameField" class="form-control" type="text" value="" name="username">
            </div>
            <div class="form-group">
                <label for="PasswordField">Password</label>
                <input id="PasswordField" class="form-control" type="password" value="" name="password">
            </div>

            <button type="submit" class="btn btn-primary pull-right">Sign In</button>

        </form>
        <p><a href="index.php">Back</a> </p>
        <?php if (isset($result)) {
            echo $result;
        }?>
    </section>

</div><!-- /.container -->

<?php
include_once "partials/footers.php"
?>


