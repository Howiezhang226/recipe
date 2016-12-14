<?php
include_once "resource/session.php";
$page_title = "Welcome Page";
include_once "partials/headers.php";
?>

<h2>Recipe Meeting </h2><hr>
	<?php
		if (!isset($_SESSION['uname'])):  ?>
			<P class="lead">You are currently not signin <a href="signin.php">Signin</a> Not yet a member? <a href="signup.php">Signup</a> </P>
		<?php else: ?>
			<p class="lead">You are logged in as <?php echo $_SESSION['uname']?> <a href="logout.php">Logout</a> </p>
			<p class="lead">Or continue log in as <?php echo $_SESSION['uname']?> <a href="main-page-front.php">Go</a></p>
	<?php endif; ?>

<?php
include_once "partials/footers.php"
?>
