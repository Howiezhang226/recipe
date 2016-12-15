<?php
	// include_once 'resource/Database.php';

	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['uname'])) {
		try{

			$queryResult = [];

			$queryUser = "select * from user where uname = :uname";
	        
			$statement = execute($queryUser, $db);
			$queryResult['user'] = $statement->fetchAll();

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
            	':uname' => $_SESSION['uname']
            ));
        return $statement;
	}
?>
