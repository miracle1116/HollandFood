<!-- NO FIXED TOP -->
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Holland Food</title>
  <link rel="shortcut icon" type="image/png" href="images/holland_food_icon.png">
  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Include Bootsrap JavaScript plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- external css stylesheet -->
  <link rel="stylesheet" href="index_style.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="css/swiper-bundle.min.css">

  <!-- external font -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Italianno' rel='stylesheet'>

</head>

<body>

  <header>

    <!-- nav bar -->
    <nav id="home" class="navbar navbar-expand-lg navbar-light animation-on-load">
      <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><img src="images/holland_food_icon.png" width="35px" />
          Holland Food</a>
        <!-- hamburger icon when screen size become small -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
          aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-stream navbar-toggler-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link active nav-link-underline" aria-current="page" href="#home">Home</a>
            </li>

            <li class="nav-item active ">
              <a class="nav-link nav-link-underline" href="#aboutUs">About Us</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link nav-link-underline" href="#menu">Menu</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link nav-link-underline" href="#bookNow">Book Now</a>
            </li>

            <?php
              if(isset($_SESSION["userID"])){
                $profilePic= substr($_SESSION['userProfilePic'],6);
                echo"<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button'
                  data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  <img src='". $profilePic."' width='40' height='40' class='rounded-circle'>
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                  <a class='dropdown-item' href='Layout/user/user_profile.php'>Edit Profile</a>
                  <a id='logoutBtn' class='dropdown-item' >Log Out</a>
                </div>
              </li>";
              }else{
                echo"<li class='nav-item'>
                <a class='nav-link' href='Layout/user/user_sign_InOut.php'><button class='btn-sign-up'>LOGIN</button></a>
              </li>";
              }
            ?>

          </ul>
        </div>
      </div>
    </nav>

    <div class="container header-text text-justify animation-on-load">
      <h1>Welcome to the wild, wild west of flavor!</h1>
      <h3> Our bold and hearty dishes are made to satisfy even the hungriest cowpokes, while our warm and welcoming
        atmosphere will make you feel right at home. So saddle up and join us for a taste of the old west – we guarantee
        you won't be disappointed!</h3>
    </div>

  </header>

  <div id="part2">

    <section id="aboutUs" class="animation">
      `<div class="about-us-card">
        <div class="img">
          <img src="images/about_us.jpg" class="img-about-us" height="500px" width="auto">
        </div>
        <div class="txt-about-us">
          <img src="images/rectangle.png" class="bullet" alt="Bullet Point" width="8" height="40">
          <h5 class="card-title fw-bold">About Us</h5>
          <div class="card-info">Welcome to Holland Food! Our restaurant is inspired by the rich
            culinary traditions of the American West, where the rugged terrain and pioneer spirit gave rise to hearty
            and delicious cuisine.

            At our restaurant, we are committed to using only the freshest and highest quality ingredients to create our
            dishes. Whether you're in the mood for a juicy steak, a classic burger, or a hearty salad, we've got you
            covered. Our menu is filled with a variety of options to satisfy every appetite.</div>
        </div>

      </div>
    </section>


    <!-- menu -->
    <section id="menu" >
      <div class="menu-container">
        <div class="main-info animation">

          <div class="img-subtract">
            <img src="images/Subtract.png" height="600" width="auto">
          </div>

          <img src="images/menu-icon-1.png" alt="Food Icon" height="300" width="auto" class="food-icon"
            style="border-radius: 50%;">

          <div class="menu-info">
            <!-- <h5 class="text-light py-5 dish-rank">#1 Most Loved Dish</h5> -->
            <h3 class="text-light py-3 dish-name">Stamppot</h3>
            <p class="text-light py-3 dish-info" style="max-width: 600px;">A hearty and traditional Dutch dish that will
              warm you up on any chilly day. Made with a blend of mashed potatoes and vegetables like kale, carrots, or
              sauerkraut, stamppot is both delicious and nutritious. Our version of this classic dish is served with a
              generous helping of smoked sausage and topped with crispy fried onions for extra crunch. Drizzle some
              gravy on top for the perfect finishing touch. </p>
          </div>

          <div class="menu-title">
            <h5 class="text-light fw-bold">Explore our Top Dishes</h5>
            <img src="images/rectangle.png" class="bullet-menu" alt="Bullet Point" width="8" height="40">
          </div>
        </div>

        <!-- carousell swiper -->
        <section class="carousell-swiper animation">
          <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
          <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
          <div class="slide-container">
            <!-- menu card 1 -->
            <div class="menu-outer">
              <div class="menu-image">
                <img src="images/menu-icon-1.png" alt="Menu Pic" class="menu-img" />
              </div>
              <div class="menu-card">

                <div class="menu-text-data">
                  <p class="menu-name text-center fw-bold">Stamppot</p>
                  <p class="menu-details text-center">A hearty and traditional Dutch dish that will
                    warm you up on any chilly day. Made with a blend of mashed potatoes and vegetables like kale,
                    carrots, or
                    sauerkraut, stamppot is both delicious and nutritious. Our version of this classic dish is served
                    with a
                    generous helping of smoked sausage and topped with crispy fried onions for extra crunch. Drizzle
                    some
                    gravy on top for the perfect finishing touch.
                  </p>
                </div>

              </div>
            </div>
            <!-- menu card 2 -->
            <div class="menu-outer">
              <div class="menu-image">
                <img src="images/menu-icon-2.png" alt="Menu Pic" class="menu-img" />
              </div>
              <div class="menu-card">

                <div class="menu-text-data">
                  <p class="menu-name text-center fw-bold">Caesar Salad</p>
                  <p class="menu-details text-center">Fresh, crisp greens are the foundation of our delicious salad,
                    tossed with ripe cherry tomatoes, sliced cucumber, sweet bell peppers, and tangy red onions. Topped
                    with grilled chicken or juicy shrimp for a protein boost, and finished with a light balsamic
                    vinaigrette dressing that perfectly balances sweet and sour notes. A perfect healthy and flavorful
                    meal option for any time of day.
                  </p>
                </div>

              </div>
            </div>
            <!-- menu card 3 -->
            <div class="menu-outer">
              <div class="menu-image">
                <img src="images/menu-icon-3.png" alt="Menu Pic" class="menu-img" />
              </div>
              <div class="menu-card">

                <div class="menu-text-data">
                  <p class="menu-name text-center fw-bold">Margherita Pizza</p>
                  <p class="menu-details text-center">Our classic Margherita pizza is made with fresh, hand-tossed
                    dough, San Marzano tomato sauce, and topped with slices of creamy fresh mozzarella cheese and
                    fragrant basil leaves. The simplicity of this pizza highlights the quality of the ingredients and
                    the perfect balance of flavors. One bite of this traditional pizza will transport you to the streets
                    of Naples!
                  </p>
                </div>

              </div>
            </div>
            <!-- menu card 4 -->
            <div class="menu-outer">
              <div class="menu-image">
                <img src="images/menu-icon-4.png" alt="Menu Pic" class="menu-img" />
              </div>
              <div class="menu-card">

                <div class="menu-text-data">
                  <p class="menu-name text-center fw-bold">Classic Spaghetti Bolognese</p>
                  <p class="menu-details text-center">Our homemade spaghetti is cooked to perfection and served with a
                    rich and savory Bolognese sauce made with juicy ground beef, sweet tomatoes, and fragrant herbs.
                    Topped with a sprinkle of Parmesan cheese and fresh basil, this classic dish will satisfy your
                    craving for comfort food. Served with a side of garlic bread for the perfect Italian meal.
                  </p>
                </div>

              </div>
            </div>
            <!-- menu card 5 -->
            <div class="menu-outer">
              <div class="menu-image">
                <img src="images/menu-icon-5.png" alt="Menu Pic" class="menu-img" />
              </div>
              <div class="menu-card">

                <div class="menu-text-data">
                  <p class="menu-name text-center fw-bold">Buffalo Wings</p>
                  <p class="menu-details text-center">Get your taste buds tingling with our deliciously crispy buffalo
                    wings! These juicy and tender chicken wings are coated in a spicy buffalo sauce that's sure to
                    satisfy your craving for heat. Served with a side of cool ranch dressing and crispy celery sticks,
                    these wings are perfect for sharing with friends or enjoying as a meal all to yourself.
                  </p>
                </div>

              </div>
            </div>

          </div>
          <div class="menu-more">
            <a href="menu.php" id="viewAllMenu">View All Menu</a>
            <img src="images/more-menu.png" alt="View More Menu" class="more-menu-icon">
          </div>
      </div>
    </section>

    </section>

  </div>

  <section id="bookNow">
    <div class="book-now animation">
      <h5 class="txt-book-now reservation">Reservation</h5>
      <h4 class="txt-book-now book-a-table fw-bold">Book A Table</h4>
      <?php
        if(isset($_SESSION["userID"])){
          echo "<button type='button' class='btn btn-outline-light btn-book-now' onclick=\"location.href = 'Layout/user/user_table.php';\">Book Now</button>";
        } else {
          echo "<button type='button' class='btn btn-outline-light btn-book-now' onclick=\"location.href = 'Layout/user/user_sign_InOut.php';\">Book Now</button>";
        }
      ?>
        
    </div>
  </section>

  <!-- footer -->
  <footer class="text-white pt-5 pb-4 animation">
    <div class="footer container text-md-left mt-5 mb-5">
      <div class="row text-md-left">
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h5 class="mb-4 font-weight-bold fw-bold">Holland Food</h5>
          <p class="txt-footer">Our restaurant is inspired by the rich
            culinary traditions of the American West, where the rugged terrain and pioneer spirit gave rise to hearty
            and delicious cuisine.

            At our restaurant, we are committed to using only the freshest and highest quality ingredients to create our
            dishes. Whether you're in the mood for a juicy steak, a classic burger, or a hearty salad, we've got you
            covered. Our menu is filled with a variety of options to satisfy every appetite.</p>

        </div>

        <div class="txt-footer col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="mb-4 font-weight-bold fw-bold">Quick Links</h5>
          <p>
            <a href="#home" class="text-white" style="text-decoration: none;">Home</a>
          </p>
          <p>
            <a href="#aboutUs" class="text-white" style="text-decoration: none;">About Us</a>
          </p>
          <p>
            <a href="#menu" class="text-white" style="text-decoration: none;">Menu</a>
          </p>
          <p>
            <a href="#bookNow" class="text-white" style="text-decoration: none;">Book Now</a>
          </p>
        </div>


        <div class="txt-footer col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h5 class="mb-4 font-weight-bold fw-bold">Contact Us</h5>
          <div class="d-flex justify-content-start align-items-center">
            <img src="images/phone-icon.png" alt="Phone Icon">
            <p class="mb-0 ps-2 ">(209) 555-0104</p>
          </div>
          <div class="d-flex justify-content-start align-items-center pt-3">
            <img src="images/mail-icon.png" alt="Phone Icon">
            <p class="mb-0 ps-2">hollandfood@example.com</p>
          </div>
          <div class="d-flex justify-content-start align-items-center pt-3">
            <img src="images/location-icon.png" alt="Phone Icon">
            <p class="mb-0 ps-2">Kolej Kediaman Kinabalu, Universiti Malaya</p>
          </div>
          <br><br>

        </div>

        <hr class="mb-4" style="width: 90%; margin: auto;">
        <div class="txt-footer d-flex flex-column justify-content-center align-items-center">
          <p> Copyright @2023 All rights reserved by Holland Food</p>
          <a href="Layout/admin/admin_login.php" target="_blank">
            <p id="admin-login">Log in as Admin</p>
          </a>
        </div>

        <div>

        </div>

      </div>

    </div>

  </footer>

  <div id="logout-modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="icon-box3">
                        <i class="bi bi-box-arrow-right"></i>
                    </div>
                    <h4 class="modal-title w-100">Logout</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are loging out your account!</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button id="btn-cancel-logout" class="btn2 btn-success btn-block p-2 btn-cancel" data-dismiss="modal" onclick="location.href = 'index.php';">Cancel</button>
                    <button id="btn-confirm" class="btn2 btn-success btn-block p-2 btn-confirm" data-dismiss="modal" onclick="location.href = 'backend/user/logout.php';">Confirm</button>
                </div>
            </div>
        </div>
    </div>


  <script type="text/javascript" src="script.js"></script>

</body>

</html>
