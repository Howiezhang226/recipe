<?php
	// include_once 'resource/Database.php';

	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['report'])) {
		try{

			$queryResult = [];

			$queryUser = "SELECT mname, description, uname, mid from recipe.report natural join recipe.meeting where mid = :mid and uname = :uname";

			$statement = execute($queryUser, $db);
			$queryResult['report'] = $statement->fetchAll();
			$queryResult['uname'] = $_SESSION['uname'];
	        echo json_encode($queryResult);
	    } catch (PDOException $pdoex) {
	        echo $pdoex -> getMessage();
	        $result = "<p> An error! <p>";
	    }
	}

	function execute($query, $db) {
		$statement = $db -> prepare($query);
        $statement -> execute(
            array(
            	':mid' => $_SESSION['report']['mid'],
            	':uname' => $_SESSION['report']['uname']
            ));
        return $statement;
	}
?>
