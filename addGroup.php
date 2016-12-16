<?php
include_once "resource/database.php";
include_once "resource/session.php";

try{
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $gid = $request->gid;
    $sqlInsert = "INSERT INTO recipe.join_groups (gid, uname, jointime) 
                  VALUES (:gid, :uname, now())";
    //use prepared sql to avoid sql injection
    $statement = $db -> prepare($sqlInsert);
    $statement -> execute(
        array(
            ':uname' => $_SESSION['uname'],
            ':gid'=> $gid
        ));
    if ($statement -> rowCount() == 1) {
        $result =  "<p> registeration successful! <p>";
    }
} catch (PDOException $pdoex) {
    echo $pdoex -> getCode();
    $result = "<p> An error! <p>";
}