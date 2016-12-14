<?php
	include_once "resource/database.php";
	include_once "resource/session.php";
	if (isset($_SESSION['rid'])) {
		try{
			$queryResult = [];
			
			$queryRecipe = "SELECT * FROM recipe.recipe WHERE rid = :rid";
	        $statement = execute($queryRecipe, $db);
	        $queryResult['recipe'] = $statement->fetchAll();

	        $queryIngredients = "SELECT unit, quantities, iname from recipe.recipe natural join recipe.recipe_item natural join recipe.ingredient where rid = :rid"; 
	        $statement = execute($queryIngredients, $db);
	        $queryResult['ingredients'] = $statement->fetchAll();

	        $queryTags = "SELECT tid, tname from recipe.recipe natural join recipe.recipe_tag natural join recipe.tags where rid = :rid";
	        $statement = execute($queryTags, $db);
	        $queryResult['tags'] = $statement->fetchAll();

	        $queryReviews = "SELECT rid, uname, content, suggestion, rating from recipe.review natural join recipe.recipe where rid = :rid";
	        $statement = execute($queryReviews, $db);
	        $queryResult['reviews'] = $statement->fetchAll();

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
            	':rid' => $_SESSION['rid']
            ));
        return $statement;
	}

?>