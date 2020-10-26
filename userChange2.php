<!doctype html>
<?php
session_start();
include 'Find.php';
@include '../DataBase.php';
@logInSure();
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
    <?php
        $user_nameErr = $signup_datetimeErr = $signup_emailErr = $login_pasErr = $privilegeErr = "";
        $user_name = $signup_datetime = $signup_email = $login_pas = $privilege  = "";
        $sure = true;

        if (isset($_POST["Reg"])) {
            $user_name = $_POST["user_name"];
            $signup_datetime = $_POST["signup_datetime"];
            $signup_email = $_POST["signup_email"];
            $login_pas = $_POST["login_pas"];
            $privilege = $_POST["privilege"];

            if (empty($_POST["user_name"])) {

                $nameErr = "姓名是必填的!";
                $sure = false;
            }

            if (empty($_POST["signup_datetime"])) {
                $signup_datetimeErr = "日期是必填的!";
                $sure = false;
            } 

            if (empty($_POST["signup_email"])) {
                $signup_emailErr = "email是必填的!";
                $sure = false;
            } 

            if (empty($_POST["login_pas"])) {
                $login_pasErr = "login_pas是必填的!";
                $sure = false;
            }

            if (empty($_POST["privilege"])) {
                $privilegeErr = "權限是必填的!";
                $sure = false;
            }
            if ($sure) {

                $db = DB();

                $sql = "UPDATE user \n" .
                "SET user_id = ".$_SESSION['user_id'].",\n" .
                "user_name = '".$_POST['user_name']."',\n" .
                "signup_datetime = '".$_POST['signup_datetime']."',\n" .
                "signup_email = '".$_POST['signup_email']."',\n" .
                "login_pas = '".$_POST['login_pas']."',\n" .
                "privilege = '".$_POST['privilege']."'\n".
                "WHERE\n" .
                "user_id =" . $_SESSION["user_id"]."";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到客戶總覽 或是 客戶新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';

                echo '        <script>
            swal({
                title: "更改成功！",
                text: "回到帳戶總覽 或是 更新帳戶?",
                icon: "success",
                buttons: {
                    1: {
                        text: "帳戶總覽",
                        value: "帳戶總覽",
                    },
                    2: {
                        text: "更新帳戶",
                        value: "更新帳戶",
                    },
                },
            }).then(function (value) {
                switch (value) {
                    case"帳戶總覽":
                        window.location.href = "userAll.php";
                        break;
                    case"更新帳戶":
                        window.location.href = "userChange.php";
                        break;
                        
                }
            })
        </script>  ';


//                header("Location:all.php");
            } else {
                $mes = $user_nameErr . $signup_datetimeErr . $signup_emailErr . $login_pasErr .$privilegeErr ;
                echo '<script>  swal({
                text: "' . $mes . '",
                icon: "error",
                button: false,
                timer: 3000,
            }); </script>';
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="userIndex.php">Instabuilder</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="login.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="userIndex.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                主頁
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                帳戶管理
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="userLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="userAll.php">總覽</a>
                                    <a class="nav-link" href="userAdd.php">新增</a>
                                    <a class="nav-link" href="userDelete.php">刪除</a>
                                    <a class="nav-link" href="userChange.php">更新</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#hashtagLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Hashtags
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="hashtagLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="hashtagAll.php">總覽</a>
                                    <a class="nav-link" href="hashtagCate.php">類別</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                貼文管理
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="postLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="postAll.php">總覽</a>
                                    <a class="nav-link" href="postDelete.php">刪除</a>
                                    <a class="nav-link" href="postChange.php">更新</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reachLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                貼文觸及
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="reachLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="reachLike.php">貼文按讚數量統計</a>
                                    <a class="nav-link" href="reachComment.php">貼文記錄查詢</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Instabuilder
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
            <h1 class="mt-4">帳戶更新</h1>
                <hr/>
                
                <p>客戶帳戶:<?php echo $_SESSION["user_id"]; ?></p>
                <br>
                <br>
                
                <form method="post" action="">

                <div class="6u 12u$(small)"> <p>姓名：</p>
                        <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?><?php echo $_SESSION["user_name"]; ?>" placeholder="" required>
                    </div>

                    <br/>
                    <div class="6u$ 12u$(small)"> 
                        <p>新增日期：</p>
                        <input type="date" name="signup_datetime" id="signup_datetime" value="<?php echo $signup_datetime; ?><?php echo $_SESSION["signup_datetime"]; ?>" placeholder="" required>
                    </div>
                
                    <br/>
                    
                    <div class="6u$ 12u$(xsmall)" ><p>E-mail：</p>
                        <input type="email" name="signup_email" id="signup_email" value="<?php echo $signup_email; ?><?php echo $_SESSION["signup_email"]; ?>" placeholder="" required>
                    </div>

                    <div class="6u 12u$(xsmall)" ><p>密碼</p>
                        <input type="text" name="login_pas" id="login_pas" value="<?php echo $login_pas; ?><?php echo $_SESSION["login_pas"]; ?>" placeholder="" required>
                    </div>

                    <br/>
                    
                    <div class="6u 12u$(small)"> <p>權限</p>
                        <input type="text" name="privilege" id="privilege" value="<?php echo $privilege; ?><?php echo $_SESSION["privilege"]; ?>" placeholder="" required>
                    </div>	


                    <div class ="Err" style="color:red;">
                        <?php
                        echo "<p>" . $user_nameErr . "</p>";
                        echo "<p>" . $signup_datetimeErr . "</p>";
                        echo "<p>" . $signup_emailErr . "</p>";
                        echo "<p>" . $login_pasErr . "</p>";
                        echo "<p>" . $privilegeErr . "</p>";
                        ?>
                    </div>
                    
                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="更新"></li>

                            </div>
                        </ul>
                    </div>

                </form>


            </div>       

            </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; NTUB GROUP 109501</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
