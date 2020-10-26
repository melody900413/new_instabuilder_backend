<?php
    session_start();
    include 'DataBase.php';
    $db = DB();
    $sql ="DELETE \n".
    "FROM\n".
    "	hashtagcates\n".
    "WHERE\n".
    "	hashtag_no='". $_SESSION["dele_hashtag_no"]."'";

    $db->query($sql);
    $_SESSION["dele_sure"] = true;
    header('Location: hashtagDelete.php');
    ?>