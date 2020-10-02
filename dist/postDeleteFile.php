<?php
    session_start();
    include '../dist/DataBase.php';
    $db = DB();
    $sql ="DELETE \n".
    "FROM\n".
    "	post\n".
    "WHERE\n".
    "	post_no ='". $_SESSION["dele_post_no"]. "'";

    $db->query($sql);
    $_SESSION["dele_sure"] = true;
    header('Location: postDelete.php');
    ?>
	