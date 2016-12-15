<?php
	// include_once 'resource/Database.php';

	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['uname'])) {
		try{

			$queryResult = [];
			$queryMemebers = "SELECT distinct gid from recipe.join_groups natural join recipe.user where recipe.user.uname= :uname) as group_id where recipe.join_groups.gid = group_id.gid";

	        $recipeQuery = "SELECT * FROM recipe.recipe, (select distinct uname from recipe.join_groups natural join recipe.User, (". $queryMemebers .") as group_memeber where recipe.recipe.username = group_memeber.uname and group_memeber.uname != :uname";

	        $groupQuery = "SELECT distinct gname, gid FROM recipe.groups natural join recipe.join_groups where uname = :uname UNION (SELECT distinct gname, gid FROM recipe.groups where creator = :uname)";
	        $meetingQuery = "SELECT * from recipe.meeting natural join recipe.rsvpmeeting natural join (select distinct uname from recipe.join_groups natural join recipe.User, (". $queryMemebers .") as group_memeber where group_memeber.uname != :uname";
	        //use prepared sql to avoid sql injection
	        $statement = execute($recipeQuery, $db);
	        $queryResult['recipes'] = $statement->fetchAll();

	        $statement = execute($groupQuery, $db);
			$queryResult['groups'] = $statement->fetchAll();

			$statement = execute($meetingQuery, $db);
			$queryResult['meetings'] = $statement->fetchAll();

	        echo json_encode($queryResult);
	    } catch (PDOException $pdoex) {
	        echo $pdoex -> getMessage();
	        $result = "<p> An error! <p>";
	    }
	}

	if (isset($_POST['mid'])) {
		try{

			$queryResult = [];
			$query = "SELECT mholder from meeting where mid = :mid";
			$statement = $db -> prepare($query);
        	$statement -> execute(
	            array(
	            	':mid' => $_SESSION['mid']
            ));
        	$queryResult['group'] = $statement->fetchAll();
        	$_SESSION['gid'] = $queryResult['group'][0]['mholder'];
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
