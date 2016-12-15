<?php
include_once "resource/database.php";
include_once "resource/session.php";

$queryRecipe = "SELECT * from recipe.groups ";

$statement = $db -> prepare($queryRecipe);
$statement -> execute();
$querySearch = $statement -> fetchAll();
echo json_encode($querySearch);

