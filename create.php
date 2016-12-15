<?php
	// include_once 'resource/Database.php';

	include_once "resource/database.php";
	include_once "resource/session.php";

	if (isset($_POST['create_recipe'])) {
		$insertData = $_POST['create_recipe'];
		try {
			$insertQuery = "INSERT into recipe.recipe (title, number_of_serving, description, username) values (:title, :number_of_serving, :descr, :uname)";
		    $statement = $db -> prepare($insertQuery);
		    $statement -> execute(
		        array(
		        	':title' => $insertData['title'],
		        	':number_of_serving' => $insertData['serving'],
		        	':descr' => $insertData['description'],
		        	':uname' => $_SESSION['uname']
            ));
		} catch (PDOException $pdoex) {
			echo $pdoex -> getMessage();
			$result = "<p> An error! <p>";
	    }
	}

	if (isset($_POST['create_group'])) {
		$insertData = $_POST['create_group'];
		try {
			$insertQuery = "INSERT into recipe.groups (gname, creator) values (:gname, :uname)";
		    $statement = $db -> prepare($insertQuery);
	        $statement -> execute(
	            array(
	            	':gname' => $insertData['gname'],
	            	':uname' => $_SESSION['uname']
            ));
		} catch (PDOException $pdoex) {
			echo $pdoex -> getMessage();
			$result = "<p> An error! <p>";
		}
	}

?>
