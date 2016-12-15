<?php
include_once "resource/database.php";
include_once "resource/session.php";

$queryRecipe = "SELECT title from recipe.user_recent_recipe NATURAL JOIN recipe.recipe WHERE uname = :uname ORDER BY searchTime DESC LIMIT 5";
$querySearch = "SELECT keywords from recipe.user_recent_search WHERE uname = :uname ORDER BY searchTime DESC LIMIT 5";
$queryTags= "SELECT tname from recipe.user_recent_tags NATURAL JOIN recipe.tags WHERE uname = :uname ORDER BY searchTime DESC LIMIT 5";

$statementRecipe = $db -> prepare($queryRecipe);
$statementRecipe -> execute(array(':uname' => $_SESSION['uname']));
$resultRecipe = $statementRecipe -> fetchAll();

$statementSearch  = $db -> prepare($querySearch);
$statementSearch -> execute(array(':uname' => $_SESSION['uname']));
$resultSearch = $statementSearch-> fetchAll();

$statementTags = $db -> prepare($queryTags);
$statementTags -> execute(array(':uname' => $_SESSION['uname']));
$resultTags = $statementTags -> fetchAll();

$result = array(
    'recipe' => $resultRecipe,
    'search' => $resultSearch,
    'tags' => $resultTags,);
echo json_encode($result);
