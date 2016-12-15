<?php
	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['gid'])) {
		try{
			$queryResult = [];
			
			$queryGroup = "SELECT * FROM recipe.groups WHERE gid = :gid";
	        $statement = execute($queryGroup, $db);
	        $queryResult['group'] = $statement->fetchAll();

	        $queryMeeting = "SELECT mid, mname, mtime, mlocation from recipe.meeting where mholder = :gid";
	        $statement = execute($queryMeeting, $db);
	        $queryResult['meetings'] = $statement->fetchAll();

	        $queryRSVP = "SELECT * from recipe.rsvpmeeting where mid in (select mid from recipe.meeting where mholder = :gid)";
	        $statement = execute($queryRSVP, $db);
	        $queryResult['rsvp'] = $statement->fetchAll();

	        $queryReport = "SELECT * from recipe.report where mid in (select mid from recipe.meeting where mholder = :gid)";
	        $statement = execute($queryReport, $db);
	        $queryResult['report'] = $statement->fetchAll();

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
            	':gid' => $_SESSION['gid']
            ));
        return $statement;
	}

?>