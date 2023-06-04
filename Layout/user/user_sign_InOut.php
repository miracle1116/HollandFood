<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet"  href="../../styles/user_sign_InOut.css" />
    <title>Sign in s& Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- Sign in form -->
          <form action="/auth/login" method="POST" class="sign-in-form">
            <h2 class="title">Hello Again!</h2>
            <h4>Welcome Back</h4>
            <div class="input-field username-input">
              <i class="fa fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" />
            </div>
            <span id="error" class="error"></span> 
            <input type="submit" value="Login" class="btn login-sub solid"/>
            <a><p class="forgot-password">Forgot Password</p></a>
          </form>

          <!-- Sign up form -->
          <form action="signup.php" method="POST" class="sign-up-form">
            <h2 class="title">Create Your Account</h2>
            <h4>As a Foodie</h4>
            <div class="input-field username-input">
              <i class="fas fa-user"></i>
              <input type="text" id="username" name="name" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email-signup" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password-signup" name="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id = "confirmPassword" name="passwordConfirm" placeholder="Confirm Password" />
            </div>
            <span id="error-signup" class="error"></span> 
            <button type="submit" name="submit" class="btn signup-sub">Sign Up</button>
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
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="../../images/login-img.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content content3">
            <h3>Holland Food</h3>
            <p>
              Life is dull without good food.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="../../images/login-img3.png" class="image" alt="" />
        </div>
      </div>
    </div>
    <script src="../../script/userSignInUp.js"></script>
  </body>
</html>