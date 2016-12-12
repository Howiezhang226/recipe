<?php
	include_once "session.php";
	if (isset($_POST['rid'])) {
		$_SESSION['rid'] = $_POST['rid'];
		echo json_encode($_SESSION['rid']);
	}

?>