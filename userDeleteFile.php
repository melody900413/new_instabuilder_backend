<?php
    session_start();
    include 'DataBase.php';
    $db = DB();
    $sql ="DELETE \n".
    "FROM\n".
    "	user\n".
    "WHERE\n".
    "	user_id = '". $_SESSION["dele_user_id"] . "'";

    $db->query($sql);
    $_SESSION["dele_sure"] = true;
    header('Location: userDelete.php');
    ?>