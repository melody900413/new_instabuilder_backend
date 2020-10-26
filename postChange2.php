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
        $contentErr = $announcer_idErr = "";
        $content = $announcer_id = "";
        $sure = true;
        if (isset($_POST["Reg"])) {
            $content = $_POST["content"];
            $announcer_id = $_POST["announcer_id"];
           
            if (empty($_POST["content"])) {
                $contentErr = "內容是必填的!";
                $sure = false;
            }
            if (empty($_POST["announcer_id"])) {
                $announcer_idErr = "announcer是必填的!";
                $sure = false;
            
            }
            
            
            if ($sure) {
                $db = DB();
                $sql = "UPDATE post \n" 
                ."SET post_no = ". $_SESSION['post_no'] .",\n" 
                ."content = '".$_POST['content']."',\n" 
                ."announcer_id = '".$_POST['announcer_id']."'\n".
                "WHERE\n" 
                ."post_no =" . $_SESSION["post_no"]."";

                $db->query($sql);
//                echo 'swal("新增成功！", "回到訂單總覽 或是 訂單新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                }); ';
                echo '        <script>
            swal({
                title: "更改成功！",
                text: "回到貼文總覽 或是 更新貼文?",
                icon: "success",
                buttons: {
                    1: {
                        text: "貼文總覽",
                        value: "貼文總覽",
                    },
                    2: {
                        text: "更新貼文",
                        value: "更新貼文",
                    },
                },
            }).then(function (value) {
                switch (value) {
                    case"貼文總覽":
                        window.location.href = "postAll.php";
                        break;
                    case"更新貼文":
                        window.location.href = "postChange.php";
                        break;
                        
                }
            })
        </script>  ';
//                header("Location:all.php");
            } else {
                $mes = $$contentErr . $announcer_idErr ;
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
            <h1 class="mt-4">更新貼文內容</h1>
                <hr/>
                
                <p>貼文編號:<?php echo $_SESSION["post_no"]; ?></p>
                <br>
                <br>
                
                <form method="post" action="">

                <div class="6u 12u$(small)"> <p>內容:</p>
                        <!--<input type="text" name="content" id="content" value="<?php echo $content; ?>" placeholder="content"" required> -->
                        <textarea name="content" id="content" placeholder="" value="<?php echo $content; ?>"><?php echo $_SESSION["content"]; ?></textarea>
                    </div>

                    <br/>
                    <div class="6u$ 12u$(small)"> 
                        <p>announcer_id:</p>
                        <input type="text" name="announcer_id" id="announcer_id" value="<?php echo $announcer_id; ?><?php echo $_SESSION["announcer_id"]; ?>" placeholder="" required>
                    </div>
                
                    
                    
                    <div class ="Err" style="color:red;">
                        <?php
                        echo "<p>" . $contentErr . "</p>";
                        echo "<p>" . $announcer_idErr . "</p>";
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
