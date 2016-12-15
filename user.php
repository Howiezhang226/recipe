<?php
	// include_once 'resource/Database.php';

	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['uname'])) {
		try{

			$queryResult = [];

			$queryUser = "SELECT * from recipe.user where uname = :uname";
	        $queryRecipe = "SELECT * from recipe.recipe where username = :uname";
	        $queryGroup = "SELECT * from recipe.groups where creator = :uname";
	        $queryMeeting = "SELECT rsvptime, mname, mtime, mlocation from recipe.rsvpmeeting natural join recipe.meeting where uname = :uname";
			$statement = execute($queryUser, $db);
			$queryResult['user'] = $statement->fetchAll();

			$statement = execute($queryRecipe, $db);
			$queryResult['recipe'] = $statement->fetchAll();

			$statement = execute($queryGroup, $db);
			$queryResult['group'] = $statement->fetchAll();

			$statement = execute($queryMeeting, $db);
			$queryResult['meeting'] = $statement->fetchAll();

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
