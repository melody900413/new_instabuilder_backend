<!doctype html>
<?php
session_start();
include 'Find.php';
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
        if (isset($_SESSION["dele_sure"])) {
            if ($_SESSION["dele_sure"]) {
                echo '<script>  swal({
                text: "刪除成功！",
                icon: "success",
                button: false,
                timer: 3000,
            }); </script>';
                $_SESSION["dele_sure"] = false;
            }
        }

        $sure = true;
        if (isset($_POST["Reg"])) {
            if (empty($_POST["hashtag_no"])) {

                $nameErr = "編號是必填的!";
                $sure = false;
            }
            if ($sure) {
                $_SESSION["dele_hashtag_no"] = $_POST["hashtag_no"];
                echo '        <script>
                swal({
                    title: "確定刪除？",
                    text: "你將無法恢復此資料！",
                    icon: "warning",
                    dangerMode: true,
                    buttons: {
                        1: {
                            text: "取消",
                            value: "取消",
                        },
                        2: {
                            text: "確定刪除！",
                            value: "確定刪除",
                        },
                    },
    
                }).then(function (value) {
                    switch (value) {
                        case"取消":
                            window.location.href = "hashtagDelete.php";
                            break;
                        case"確定刪除":
                            window.location.href = "hashtagDeleteFile.php";
                            break;
                            
    
                    }
                })
            </script>  ';
            }
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
            <h1 class="mt-4">刪除hashtag</h1>

                <hr/>

<form method="post" action="">

                    <div class="6u 12u$(small)"> <p>hashtag編號：</p>
                        <input type="text" name="hashtag_no" id="big" value="" placeholder="Number" required>
                        <script>
                            var url = location.href;
                            //之後去分割字串把分割後的字串放進陣列中
                            var ary1 = url.split('?');
                            //此時ary1裡的內容為：
                            //ary1[0] = 'index.aspx'，ary2[1] = 'id=U001&name=GQSM'

                            //下一步把後方傳遞的每組資料各自分割
                            var ary2 = ary1[1].split('&');
                            //此時ary2裡的內容為：
                            //ary2[0] = 'id=U001'，ary2[1] = 'name=GQSM'

                            //最後如果我們要找id的資料就直接取ary[0]下手，name的話就是ary[1]
                            var ary3 = ary2[0].split('=');
                            //此時ary3裡的內容為：
                            //ary3[0] = 'id'，ary3[1] = 'U001'

                            //取得id值
                            var id = ary3[1];
                            var aee = 10;
                            document.getElementById("big").value = id;
                        </script>
                    </div>


                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="Reg" value="刪除"></li>

                            </div>
                        </ul>
                    </div>
                </form>


            </div>       

            <!-- Scripts -->
            
            
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
        <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script>
                            function getQueryVariable(variable)
                            {
                                var query = window.location.search.substring(1);
                                var vars = query.split("&");
                                for (var i = 0; i < vars.length; i++) {
                                    var pair = vars[i].split("=");
                                    if (pair[0] == variable) {
                                        return pair[1];
                                    }
                                }
                                return(false);
                            }

            </script>
    </body>
</html>
