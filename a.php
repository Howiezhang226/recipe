<?php
include_once "resource/database.php";
$sqlInsert = "INSERT INTO RECIPE.user_recent_recipe (uname, tid, searchTime) 
                  VALUES (:uname, :tid, now())";
//use prepared sql to avoid sql injection
$statement = $db->prepare($sqlInsert);
$statement->execute(
    array(
        ':uname' => 'heng',
        ':tid' => 1
    ));


?>