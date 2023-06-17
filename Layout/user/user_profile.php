<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="shortcut icon" type="image/png" href="../../images/holland_food_icon.png">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- external css stylesheet -->
    <link rel="stylesheet" href="../../styles/user_profile.css">


    <!-- Include Bootsrap JavaScript plugin -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>


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
    
    
    <div class="d-flex container-fluid profile-back justify-content-center">
        <img class="bg-img " src="../../images/user_login_background.png" alt="Background Image">
        <div class=" container justify-content-center profile-con">
            <div>
                <div class="container justify-content-center text-center profile-con position-relative">
                    <div>
                        <img src="<?php echo $_SESSION['userProfilePic']?>" id="profile-image" class="mx-auto profile-image">
                        <!-- <i class="bi bi-pencil-square position-absolute bottom-0 icon" id="edit-icon"></i> -->
                      </div>
                  </div>
            </div>  
        </div>
        <div class="container justify-content-center  profile-box w-50 mb-5">
            <div class="justify-content-center container form-box">
                <form class="form" action="../../backend/user/editProfile.php" method='POST' enctype="multipart/form-data">
                    <div class="row justify-content-center" >
                        <div class="form-group col-lg-5 col-sm-10 mt-3 ">
                            <label class="form-label fw-bold" for="firstname">First Name</label>
                            <input name= 'firstname'type="text" class="form-control input" id="firstname"  value="<?php echo $_SESSION['userFirstName']?>">
                        </div>

                        <div class="form-group  col-lg-5 col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="lastname">Last Name</label>
                            <input name= 'lastname' type="text" class="form-control input" id="lastname"  value="<?php echo $_SESSION['userLastName']?>">
                        </div>                       
                    </div>

                    <div class="row justify-content-center" >
                        <div class="col-lg-5 col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="date">Birth Date</label>
                            <div class="input-group">
                                <input name= 'birthdate' type="date" class="form-control input" id="date" aria-describedby="emailHelp" value="<?php echo $_SESSION['userBirthDate']?>">
                            </div>
                        </div>

                        <div class="form-group col-lg-5 col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="gender">Gender</label>
                            <select name= 'gender' id="gender" class="form-control form-select input" value="<?php echo $_SESSION['userGender']?>">
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                            </select>
                        </div>                       `
                    </div>
                    <div class="row justify-content-center" >
                        <div class="form-group col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="contactnumber">Contact Number</label>
                            <input name= 'contactno' type="text" class="form-control input" id="contactnumber" value="<?php echo $_SESSION['userContactNo']?>">
                        </div>

                        <div class="form-group col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="email">Email</label>
                            <input type="email" class="form-control input" id="email"  value="<?php echo $_SESSION['userEmail']?>" disabled>
                        </div>

                        <div class="form-group col-sm-10 mt-3">
                            <label class="form-label fw-bold" for="password">New Password</label>
                            <input name= 'newpassword' type="password" class="form-control input" id="password"  placeholder="123456789">
                        </div>    

                        <div class="form-group col-sm-10 mt-3 position-relative">
                            <label class="form-label fw-bold" for="confirmpassword">Confirm New Password</label>
                            <input name= 'confirmnewpassword' type="password" class="form-control input" id="confirmpassword" placeholder="123456789">
                            <i class="bi bi-check-square-fill position-absolute end-0 top-50 translate-y me-4" id="tick"></i>
                            <span id="error" class="error"></span> 
                        </div>

                        <div class="form-group col-sm-10 mt-3 mb-3">
                            <label for="formFile" class="form-label fw-bold">Profile Picture</label>
                            <input name='profilepicture' class="form-control input" type="file" id="formFile">
                        </div>
                                          
                    </div> 
                    <div class="container row justify-content-center  mt-5 pb-3">
                        <div class="col col-lg-4 col-md-5 col-sm-5 ">
                            <button type="button" id="deleteBtn" class="rounded-pill btn btn-md  btn-outline-danger">Delete Account</button>
                        </div>
                        <div class="col col-lg-2 ">

                        </div>
                        
                        <div class="col col-lg-3 col-md-5 col-sm-5 save-box ">
                            <button name="submit" type="submit" id="submitBtn" class="rounded-pill btn btn-md save-btn " >Save</button>
                        </div>
                    </div>  

    
                </form>



            </div>


        </div>

    </div>

    <div id="submit-modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="icon-box">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h4 class="modal-title w-100">Awesome!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your data have been saved.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="okBtn" class="btn btn-success btn-block" data-bs-dismiss="modal" onclick="location.href = 'user_profile.php';">Confirm</button>
                </div>
            </div>
        </div>
    </div>


    <div id="delete-modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="icon-box2">
                        <i class="bi bi-x-lg"></i>
                    </div>
                    <h4 class="modal-title w-100">Caution!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">You are deleting your account.</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button id="btn-cancel" class="btn2 btn-success btn-block p-2 btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button id="okBtn" class="btn2 btn-success btn-block p-2" data-dismiss="modal" onclick="location.href = '../../backend/user/deleteUser.php';">Confirm</button>
                </div>
            </div>
        </div>
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

    <?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
          echo "<script>alert('Fill in all fields!');</script>";
        }
        else if($_GET["error"]=="passworddonotmatch"){
          echo "<script>alert('Password do not match!');</script>";
        }
        else if($_GET["error"]=="none"){
          echo "<script>alert('You have updated your profile!');</script>";
        }
        else if($_GET["error"]=="filetypeerror"){
            echo "<script>alert('You cannot upload this profile picture');</script>";
        }
        else if($_GET["error"]=="inputerror"){
            echo "<script>alert('Make sure the phone number follow the format 01234567');</script>";
        }
      }
    
    //   if(isset($_SESSION['userID'])){
    //     echo "<script>alert('You are logged out!!');</script>";
    //   }
    
    ?>
    <script>
        var modalLogout = new bootstrap.Modal("#logout-modal");
        var logoutButton = document.getElementById('logoutBtn');
        logoutButton.addEventListener("click", function () {
            console.log(<?php echo $_SESSION['userID']?>);
            modalLogout.show();
        });

        var modalDelete = new bootstrap.Modal("#delete-modal");
        var deleteButton = document.getElementById('deleteBtn');
        deleteButton.addEventListener("click", function () {
            console.log(1);
            modalDelete.show();
        });

  </script>
    <script type="text/javascript" src="../../script/userProfile.js"></script>

<?php
session_start();
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