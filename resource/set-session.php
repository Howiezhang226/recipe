<?php
	include_once "session.php";

	if (isset($_POST['rid'])) {
		$_SESSION['rid'] = $_POST['rid'];
		echo json_encode($_SESSION['rid']);
	}

	if (isset($_POST['search_tag'])) {
		$_SESSION['search_tag'] = $_POST['search_tag'];
	}
?>