<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../styles/adminLogin_style.css" />

    <title>Admin Login Form</title>
    <link rel="shortcut icon" type="image/png" href="../../images/holland_food_icon.png">
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin">
          <form action="../../backend/admin/login.php" method="POST" class="sign-in-form">
            <h2 class="title">Welcome Back!</h2>
            <h4>As Admin</h4>
            <div class="input-field username-input">
              <i class="fa fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" />
            </div>
            <?php
            if(isset($_GET["error"])){
              if($_GET["error"]=="emptylogininput"){
                echo "<p style=\"color: red; font-size: small;\">Fill in all fields!</p>";
              }
              else if($_GET["error"]=="stmtfailed"){
                echo "<p style=\"color: red;\">Something went wrong!</p>";
              }
              else if($_GET["error"]=="wrongadminemail"){
                echo "<p style=\"color: red; font-size: small;\">Wrong Admin Email!</p>";
              }
              else if($_GET["error"]=="wrongpassword"){
                echo "<p style=\"color: red; font-size: small;\">Please re-enter your password!</p>";
              }
              else if($_GET["error"]=="unauthorizedaccess"){
                echo "<script>alert('Login Required.');</script>";
              }
            }
            ?>
            <input type="submit" name="adminsubmit" value="Login" class="btn login-sub solid" onclick="validateForm(event)"/>
            <!-- <a><p class="forgot-password">Forgot Password</p></a> -->
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content content2">
            
            <h3 class="hollandTitle">Holland Food</h3>
            <p class="hollandDesc">
                Life is dull without good food.
            </p>
          </div>
          <img src="/images/admin_loginImg.png" class="image" alt="" />
          
        </div>
      </div>
    </div>

    <script src="/script/adminLogin.js"></script>
  </body>
</html>