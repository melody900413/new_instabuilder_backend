<!doctype html>
<?php
session_start();
include 'Find.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>管理者介面</title>
        <!-- 連結思源中文及css -->


        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <!------------------------->
    </head>

    <body>
        <?php
        if(isset($_SESSION["unLog"])){
            if($_SESSION["unLog"]){
                echo '<script>  swal({
                text: "未登入或登入逾時！",
                icon: "error",
                button: false,
                timer: 2000,
                }); </script>';
                session_unset();
            }   
        }

        
        
        if (isset($_POST["next"])) {
            findUser($_POST["signup_email"], $_POST["login_pas"]);
        }
        ?>


        <!-- Header -->
        <header id="header" class="alt">
            <div class="logo"><a href="../index/index.html">Instabuilder <span>Backend</span></a></div>
            <a href="#menu">Menu</a> 
        </header>

        <!-- Nav -->
        

        <!--**************************-->


        <div class="container">          


            <!--~~~~~~~~~~~~~~~~~--> 
            <div class="content">
            <h1 class="mt-4">管理者登入</h1>

                <form method="post" action="">

                    <div class="6u 12u$(small)" style="margin-left: 20%"> 
                        <p>帳號：</p>
                        <input type="text" name="signup_email" id="id" value="" placeholder="" required>
                    </div>
                    <br/>
                    <div class="6u$ 12u$(small)"  style="margin-left: 20%"> 
                        <p>密碼：</p>											
                        <input type="password" name="login_pas" id="password" value="" placeholder="" required>
                    </div>  

                    <div class="12u$">
                        <ul class="actions">
                            <div align="right"  style="margin-right: 5%">

                                <li><input type="submit" name="next" value="ENTER"></li>

                            </div>
                        </ul>
                    </div>
                </form>


            </div>       

            <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </div>


        <!--~~~~~~~~~~~~~~~~~--> 
        <div class="footer">
            &copy; NTUB GROUP 109501     
        </div>  
        <!--**************************-->    
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>

</html>