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
		    $rid = $db->lastInsertId();
		    $tags = $insertData['tags'];

		 	$checkQuery = "SELECT tid from recipe.tags where tname=:tname";
		 	$insertTag = "INSERT into recipe.tags (tname) values (:tname)";
		 	$insertTagRecipe = "INSERT into recipe.recipe_tag values(:tid, :rid)";
		 	for ($i = 0; $i < sizeof($tags); $i++) {
		 		$statement = $db -> prepare($checkQuery);
			    $statement -> execute(
			        array(
			        	':tname' => $tags[$i]
	            ));
			    $tid = $statement->fetchAll()[0]['tid'];
			    if (sizeof($tid) == 0) {
			    	$statement = $db -> prepare($insertTag);
				    $statement -> execute(
				        array(
				        	':tname' => $tags[$i]
		            ));
		            $tid = $db->lastInsertId();
			    }
			    $statement = $db -> prepare($insertTagRecipe);
			    $statement -> execute(
			        array(
			        	':rid' => $rid,
			        	':tid' => $tid
	            ));
		 	}
		 	echo $tags;

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

	if (isset($_POST['create_report'])) {
		$insertData = $_POST['create_report'];
		try {
			$insertQuery = "INSERT into recipe.report (mid, uname, description) values (:mid, :uname, :descr)";
		    $statement = $db -> prepare($insertQuery);
	        $statement -> execute(
	            array(
	            	':mid' => $_SESSION['mid'],
	            	':uname' => $_SESSION['uname'],
	            	'descr' => $insertData['description']
            ));
		} catch (PDOException $pdoex) {
			echo $pdoex -> getMessage();
			$result = "<p> An error! <p>";
		}
	}

	// function getLastId() {
	// 	$insertedId = "SELECT LAST_INSERT_ID() as id";
	// 	$statement = $db -> prepare($insertedId);
	//     $statement -> execute(
	//         array(
 //        ));
 //        return $statement->fetchAll();
	// }

?>
