<?php
// including the database connection file
include_once("../../config.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Step 2: User Order Food</title>
  <link rel="shortcut icon" type="image/png" href="../../images/holland_food_icon.png">

  <!-- Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- external css stylesheet -->
  <link rel="stylesheet" href="../../styles/user_menu.css">
  <link rel="stylesheet" href="../../styles/user_progress.css">
  <link rel="stylesheet" href="../../styles/user_all_style.css">

  <!-- Include Bootsrap JavaScript plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- external font -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="../../index.php"><img src="../../images/holland_food_icon.png"
                    width="35px" />
                Holland Food</a>
            <!-- hamburger icon when screen size become small -->
            <button class="bg-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-stream navbar-toggler-icon"></i>
            </button>

            <div class="collapse navbar-collapse " id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-3">
                    <li class="nav-item active">
                        <a class="nav-link active nav-link-underline" aria-current="page" href="../../index.php#home">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link nav-link-underline" href="../../index.php#aboutUs">About Us</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link nav-link-underline" href="../../index.php#menu">Menu</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link active nav-link-underline" href="../../index.php#bookNow">Book Now</a>
                    </li>

                    <?php
                            if(isset($_SESSION["userID"])){
                                echo"<li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button'
                                data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <img src='". $_SESSION['userProfilePic']."' width='40' height='40' class='rounded-circle'>
                                </a>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                <a class='dropdown-item' href='user_profile.php'>Edit Profile</a>
                                <a id='logoutBtn' class='dropdown-item' >Log Out</a>
                                </div>
                            </li>";
                            }else{
                                echo"<li class='nav-item'>
                                <a class='nav-link' href='user_sign_InOut.php'><button class='btn-sign-up'>LOGIN</button></a>
                            </li>";
                            }
                        ?>
                </ul>
            </div>
        </div>
    </nav>
  </header>

  <!-- Progressbar -->
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 
            col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2 ">
            <div class="px-0 pt-2 pb-0 mb-3 ">
                <form id="form">
                    <ul id="progressbar">
                        <li class="active" id="step1">
                            <strong>Step 1: <br>Choose Table</strong>
                        </li>
                        <li class="active" id="step2"><strong>Step 2: <br>Select Menu</strong></li>
                        <li class="" id="step3"><strong>Step 3: <br>Confirmation</strong></li>

                    </ul>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div class="row justify-content-center p-5 ">
    <div class="leftcolumn row">
      <div class="col-12 category-div">  
        <div class="row justify-content-center d-flex flex-nowrap mt-2" style="background-color: #130D25">
          <!-- Menu Category -->
          <?php
            // Fetch and display menu category from the database
            $query = "SELECT * FROM menucategory";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              $menuCategoryID = $row['menuCategoryID'];
              $categoryName = $row['menuCategory'];
              $categoryImage = $row['menuCategoryImage'];

          ?> 
          
          <div class="menu_con col-2 justify-content-center " data-category="<?php echo $categoryName; ?>">
            <div class="container-fluid mt-3 p-1 pb-2">
              <img src="../../images/<?php echo $categoryImage; ?>"
                class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" />
              <p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
              <?php echo $categoryName; ?>
              </p>
              <div class="showMore text-center">
                <a href="#">
                  <i class="bi bi-caret-right text-white"></i>
                </a>
              </div>
            </div>
          </div>

          <?php
            } // end while loop
          ?>

        </div>
      </div>
      

      <div id="menucard">
        <div class="card" style="height:1000px; background-color: #130D25">
          <div class="row mt-5 justify-content-around pe-3">
            <!--DISPLAY MENU ITEM -->
            <?php
            // Fetch and display data from the database
            $query = "SELECT * FROM menu";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              $menuID = $row['menuID'];
              $menuCategory = $row['menuCategory'];
              $menuName = $row['menuName'];
              $menuPrice = $row['menuPrice'];
              $menuIngredient = $row['menuIngredient'];
              $menuImage = $row['menuImage'];
            ?>


            <div id="<?php echo $menuID; ?>" class="col-4 col-xl-2 col-lg-3 col-md-3 col-sm-4 ms-lg-1 my-3 me-3 me-xl-1 me-lg-2 me-md-4 me-sm-4"
              data-category="<?php echo $menuCategory; ?>">
              <div class="menu-item container-fluid shadow-lg bg-body ms-3">
                <img src="../../images/<?php echo $menuImage; ?>" class="menu-item" />
              </div>
              <div class="border_menu">
                <div class="menu-item-desc ps-4 container-fluid">
                  <div class="fw-bold"><?php echo $menuName; ?></div>
                  <div class="ingredient"><?php echo $menuIngredient; ?></div>
                  <div class="mt-4 price">
                    <p class="m-0">RM<?php echo $menuPrice; ?></p>
                    <span>
                      <i class="bi bi-plus-circle-fill add-icon me-3"></i>
                    </span>

                  </div>
                </div>
              </div>
            </div>

            <?php
            } // end while loop
            ?>

          </div>
        </div>
      </div>
    </div>


    <div class="sidebar col-2">
      <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="slideOutIcon fs-4 bi bi-cart"></i>
        <span class="cart-items-count"></span>
      </button>

      <div class="rounded-4 justify-content-center ">
        <div class="container" id="mycart">
          <h2>My Cart</h2>
        </div>
        <hr>

        <div class="my-cart">
          <?php
          // Accessing cart items from session
          if(isset($_SESSION['cart'])){
          $cart = $_SESSION['cart'];

          // Iterate over cart items
          foreach ($cart as $itemCode => $quantity) {
            $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?;");
            $stmt->bind_param("i", $itemCode);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $menuName = $row['menuName'];
            $menuImage = $row['menuImage'];
            $menuPrice = $row['menuPrice'];

          ?>

          <div id="<?php echo $itemCode; ?>" class="menu-in-cart my-3">
            <div class="menucart-item container-fluid bg-body">
              <img src="../../images/<?php echo $menuImage; ?>" class="menucart-item rounded-circle bg-body" />
            </div>
            <div class="border_menucart">
              <div class="menucart-item-desc container-fluid">
                <div class="menucart-itemname fw-bold ">
                  <h1 class="foodname">
                  <?php echo $menuName; ?> <br>
                  </h1>
                  <h2 class="price ms-2">
                    RM <?php echo $menuPrice; ?><br>

                  </h2>
                </div>

                <div class="content">

                  <span class="qt-minus">-</span>
                  <span class="qt"><?php echo $quantity; ?></span>
                  <span class="qt-plus">+</span>

                  <div class="col  d-flex justify-content-end align-items-start">
                    <div id="remove">
                      <button class="btn" id="remove"><i class="fa fa-trash" style="font-size: 22px;"></i></button>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- close the loop -->
          <?php
          }
        }
          ?>
        </div>


      </div>
    </div>




    <!--<div class="rightcolumn rounded-4 justify-content-center ">
            <div class="container" id="mycart">
            <h2>My Cart</h2>
            </div>
            <hr>

            <div class="row">
               Cart item 
            <div class="col-xl-12 col-lg-4 ms-lg-5 ms-3 my-3">
              <div class="menucart-item container-fluid shadow-lg bg-body">
                <img
                  src="../../images/spaghetti_icon.png"
                  class="menucart-item rounded-circle shadow-lg bg-body"
                />
              </div>
              <div class="border_menucart">
                <div class="menucart-item-desc container-fluid">
                  <div class="menucart-itemname fw-bold ">
                    <h1 class="foodname">
                      Pizza <br>
                    </h1>
                    <h2 class="price ms-5">
                      RM 53.99<br>

                    </h2>
                  </div>

                  <div class="content">
					
                    <span class="qt-minus">-</span>
                    <span class="qt">1</span>
                    <span class="qt-plus">+</span>

                    <div class="col  d-flex justify-content-end align-items-start">
                      <div id="remove">
                        <button class="btn" id="remove" ><i class="fa fa-trash" style="font-size: 22px;"></i></button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
             Cart item end 
          </div>-->




  </div>

  </div>

  <div class="button-container mt-3 px-5">
    <button class="start-button button-shape" onclick="location.href = 'user_table.php';">Previous</button>
    <button type="submit" onclick="location.href = 'user_confirmation.php';"
      class="end-button button-shape">Next</button>
  </div>

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
                    <button id="btn-cancel-logout" class="btn2 btn-success btn-block p-2 btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button id="btn-confirm" class="btn2 btn-success btn-block p-2 btn-confirm" data-dismiss="modal" onclick="location.href = '../../backend/user/logout.php';">Confirm</button>
                </div>
            </div>
        </div>
  </div>


  <script src="../../script/userMenu.js"></script>

  <?php
        if(!isset($_SESSION["userID"])){
        echo" <div id=\"authorized-modal\" class=\"modal fade\" data-backdrop=\"static\" data-keyboard=\"false\">
        <div class=\"modal-dialog modal-confirm\">
            <div class=\"modal-content\">
            <div class=\"modal-header\">
                <div class=\"icon-box2\">
                <i class=\"bi bi-x-lg\"></i>
                </div>
                <h4 class=\"modal-title w-100\">Unauthorized Access!</h4>
            </div>
            <div class=\"modal-body\">
                <p class=\"text-center\">Please Login</p>
            </div>
            <div class=\"modal-footer\">
                <button id=\"okBtn\" class=\"btn2 btn-success btn-block p-2\" onclick=\"redirectToLogin()\">Confirm</button>
            </div>
            </div>
        </div>
        </div>
        <script>
        var modalAuthorized = new bootstrap.Modal(document.getElementById('authorized-modal'));
        modalAuthorized.show();
        
        function redirectToLogin() {
            location.href = 'user_sign_InOut.php';
        }
        </script>
        ";}

    ?>



</body>

</html>