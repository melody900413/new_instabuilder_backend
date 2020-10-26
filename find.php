<?php

@include 'DataBase.php';

function FindUser ($acc , $password){
    $db = DB();
    $sql = "SELECT * FROM user WHERE signup_email='".$acc."' and login_pas='".$password."'";
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if($row>1){
        $_SESSION["signup_email"] = $acc;
        $_SESSION["login_pas"] = $password;
        
        
        header('Location: userIndex.php');
        

    }else{
        echo '<script>  swal({
            text: "查不到資料！  請檢查輸入資料是否正確！",
            icon: "error",
            button: false,
            timer: 3000,
        }); </script>';
    }

}

function logInSure(){
    if($_SESSION["signup_email"] == ""){
        // echo '<script>  swal({
        //     text: "未登入或登入逾時！  兩秒後跳轉至登入畫面!",
        //     icon: "error",
        //     button: false,
        //     timer: 2000,
        // }); </script>';
        
        header('Location: login.php');
        $_SESSION["unLog"] = true;
        // echo '<meta http-equiv="refresh" content="2;url=../maneger.php" />';
    }

}



?>