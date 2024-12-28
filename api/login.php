<?php
session_start();
if (isset($_SESSION['Admin-name'])) {
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
      $(window).on("load resize ", function() {
          var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
          $('.tbl-header').css({'padding-right':scrollWidth});
      }).resize();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click', '.message', function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
          $('h1').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
      });
    </script>
</head>
<body style="background: #F2C464;">
<div style="display: grid;: 200px; min-height: 100vh;">

    <main style="padding: 20px;">
        <h1 class="slideInDown animated">Please, Login with the Admin E-mail and Password</h1>
        <h1 class="slideInDown animated" id="reset">Please, Enter your Email to send the reset password link</h1>
        <!-- Log In -->
<!-- Log In -->
<section>
  <div class="slideInDown animated">
    <div class="login-page" style="border-radius: 25px;">
      <div class="form" style="border-radius: 25px;background-color: #eda200;">
      <?php  
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidEmail") {
                echo '<div class="alert alert-danger">
                        This E-mail is invalid!!
                      </div>';
            }
            elseif ($_GET['error'] == "sqlerror") {
                echo '<div class="alert alert-danger">
                        There a database error!!
                      </div>';
            }
            elseif ($_GET['error'] == "wrongpassword") {
                echo '<div class="alert alert-danger">
                        Wrong password!!
                      </div>';
            }
            elseif ($_GET['error'] == "nouser") {
                echo '<div class="alert alert-danger">
                        This E-mail does not exist!!
                      </div>';
            }
          }
          if (isset($_GET['reset'])) {
            if ($_GET['reset'] == "success") {
                echo '<div class="alert alert-success">
                        Check your E-mail!
                      </div>';
            }
          }
          if (isset($_GET['account'])) {
            if ($_GET['account'] == "activated") {
                echo '<div class="alert alert-success">
                        Please Login
                      </div>';
            }
          }
          if (isset($_GET['active'])) {
            if ($_GET['active'] == "success") {
                echo '<div class="alert alert-success">
                        The activation like has been sent!
                      </div>';
            }
          }
        ?>
        <div class="alert1" style="background: #F2C464;"></div>
        <form class="reset-form" action="reset_pass.php" method="post" enctype="multipart/form-data" style="background: #F2C464;border-radius: 25px;"">
          
          <input type="email" name="email" placeholder="E-mail..." required/>
          <button type="submit" name="reset_pass" style="background: #F2C464;">Reset</button>

          <p class="message"><a href="#">LogIn</a></p>
        </form>
        <form class="login-form" action="ac_login.php" method="post" enctype="multipart/form-data">
          <input type="email" name="email" id="email" placeholder="E-mail..." required style="border-radius: 25px;"/>
          <input type="password" name="pwd" id="pwd" placeholder="Password" required style="border-radius: 25px;"/>
          <button type="submit" name="login" id="login" style="background: #F2C464;border-radius: 25px;">login</button>

          <p class="message" style="margin-bottom: 15px; color:black">Forgot your Password? <br> <br>
            <a href="#" style="color:blue">
            <i class="fa fa-cog"></i>  
            Reset your password</a>
          </p>
          </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>