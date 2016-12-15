<?php
	include_once "session.php";

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $gid = $request->gid;

    if (isset($_POST['rid'])) {
        $_SESSION['rid'] = $_POST['rid'];
        // echo json_encode($_SESSION['rid']);
    }

    if (isset($_POST['gid']) || isset($gid)) {
        $_SESSION['gid'] = $_POST['gid'];
    }

    if (isset($_POST['search_info_key'])) {
        $_SESSION['search_info_key'] = $_POST['search_info_key'];
    }

    if (isset($_POST['search_tag'])) {
        $_SESSION['search_tag'] = $_POST['search_tag'];
    }
?>

