<?php
	include_once "resource/database.php";
	include_once "resource/session.php";

	$queryRecipe = "SELECT * from recipe.recipe where title like :search or description like :search";
	$queryReview = "SELECT * from recipe.review natural join recipe.recipe where content like :search or suggestion like :search";
	$queryMeeting = "SELECT * from recipe.meeting where mname like :search";
	$queryReport = "SELECT * from recipe.report where description like :search";
	$queryTags = "SELECT * from recipe.recipe_tag natural join recipe.recipe natural join recipe.tags where tname like :search";
	$searchTags = "SELECT * from recipe.recipe_tag natural join recipe.recipe where tid = :tag";
	if (isset($_POST['search_info'])) {
		try {
            $sqlInsert = "INSERT INTO RECIPE.user_recent_search (uname, keywords, searchTime) 
                  VALUES (:uname, :keywords, now())";
            //use prepared sql to avoid sql injection
            $statement = $db->prepare($sqlInsert);
            $statement->execute(
                array(
                    ':uname' => $_SESSION['uname'],
                    ':keywords' => $_POST['search_info']));
        } catch (PDOException $exception) {
            echo $exception ->getMessage();
        }
		$keyword = '%'.$_POST['search_info'].'%';
		$querySearch = search($keyword, $db, $queryRecipe, $queryReview, $queryMeeting, $queryReport, $queryTags);
		// echo $querySearch['report'];
		$result = json_encode($querySearch);
		echo $result;
		// echo json_encode($querySearch);
	}

	if (isset($_SESSION['search_info_key'])) {
		$keyword = '%'.$_SESSION['search_info_key'].'%';	
		$querySearch = search($keyword, $db, $queryRecipe, $queryReview, $queryMeeting, $queryReport, $queryTags);
		unset($_SESSION['search_info_key']);
		echo json_encode($querySearch);	
	}

	if (isset($_SESSION['search_tag'])) {
		try {
            $sqlInsert = "INSERT INTO RECIPE.user_recent_recipe (uname, tid, searchTime) 
                  VALUES (:uname, :tid, now())";
            //use prepared sql to avoid sql injection
            $statement = $db->prepare($sqlInsert);
            $statement->execute(
                array(
                    ':uname' => $_SESSION['uname'],
                    ':tid' => $_SESSION['search_tag']));
        } catch (PDOException $exception) {
            echo $exception ->getMessage();
        }
		$id = $_SESSION['search_tag'];
		unset($_SESSION['search_tag']);
		$querySearch = [];
		$statement = $db -> prepare($searchTags);
        $statement -> execute(
            array(
            	':tag' => $id
		));
		$querySearch['recipes_tag'] = $statement->fetchAll();
		echo json_encode($querySearch);
	}

	function search($keyword, $db, $queryRecipe, $queryReview, $queryMeeting, $queryReport, $queryTags) {
		try {
			$querySearch = [];
			$statement = execute($queryRecipe, $db, $keyword);
			$querySearch['recipes'] = $statement->fetchAll();

			$statement = execute($queryTags, $db, $keyword);
			$querySearch['recipes_tags'] = $statement->fetchAll();

			$statement = execute($queryReview, $db, $keyword);
			$querySearch['reviews'] = $statement->fetchAll();

			$statement = execute($queryMeeting, $db, $keyword);
			$querySearch['meeting'] = $statement->fetchAll();

			$statement = execute($queryReport, $db, $keyword);
			$querySearch['report'] = $statement->fetchAll();
			return $querySearch;

		} catch (PDOException $pdoex) {
	        echo $pdoex -> getMessage();
	        $result = "<p> An error! <p>";
	    }
	}


	function execute($query, $db, $keyword) {
		// $keyword = '%'.$_POST['search_info'].'%';
		$statement = $db -> prepare($query);
        $statement -> execute(
            array(
            	':search' => $keyword
            ));
        return $statement;
	}
?>