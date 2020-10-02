<!DOCTYPE html>
<?php
session_start();
include '../dist/Find.php';
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
                $sql = "INSERT INTO user (user_name, signup_datetime, signup_email,login_pas,privilege)
                VALUES ('".$_POST['user_name']."','".$_POST['signup_datetime']."','".$_POST['signup_email']."','".$_POST['login_pas']."','".$_POST['privilege']."')";
                
                $db->query($sql);
//                echo 'swal("新增成功！", "回到客戶總覽 或是 客戶新增?", "success").then(function (result) {
//                    
//                    window.location.href = "http://tw.yahoo.com";
//                });

                    echo '        <script>
            swal({
                title: "新增成功！",
                text: "回到帳戶總覽 或是 帳戶新增?",
                icon: "success",
                buttons: {
                    1: {
                        text: "帳戶總覽",
                        value: "帳戶總覽",
                    },
                    2: {
                        text: "帳戶新增",
                        value: "帳戶新增",
                    },
                },
            }).then(function (value) {
                switch (value) {
                    case"帳戶總覽":
                        window.location.href = "userAll.php";
                        break;
                    case"客帳戶新增":
                        window.location.href = "userAdd.php";
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
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
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
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <div class="container">          


<!--~~~~~~~~~~~~~~~~~--> 
<div class="content">
    <h2>新增系統帳戶</h2>
    <hr/>

    <form method="post" action="">

        <div class="6u 12u$(small)"> <p>姓名：</p>
            <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" placeholder="Name" required>
        </div>

        <br/>
        <div class="6u$ 12u$(small)"> 
            <p>新增日期：</p>
            <input type="date" name="signup_datetime" id="signup_datetime" value="<?php echo $signup_datetime; ?>" placeholder="yyyy-mm-dd" required>
        </div>

        <br/>
        
        <div class="6u$ 12u$(xsmall)" ><p>E-mail：</p>
            <input type="email" name="signup_email" id="signup_email" value="<?php echo $signup_email; ?>" placeholder="email" required>
        </div>

        <div class="6u 12u$(xsmall)" ><p>密碼</p>
            <input type="text" name="login_pas" id="login_pas" value="<?php echo $login_pas; ?>" placeholder="login_pas" required>
        </div>

        <br/>
        
        <div class="6u 12u$(small)"> <p>權限</p>
            <input type="text" name="privilege" id="privilege" value="<?php echo $privilege; ?>" placeholder="privilege" required>
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

                    <li><input type="submit" name="Reg" value="ADD"></li>

                </div>
            </ul>
        </div>

    </form>


</div>       



</div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
    </body>
</html>
