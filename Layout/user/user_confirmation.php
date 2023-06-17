<?php
session_start();
$_SESSION['foodName']="";

$timeSlot = ['8:00-9:00','9:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00',
'14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00',
'21:00-22:00'];


include_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 3: User Confirmation</title>
    <link rel="shortcut icon" type="image/png" href="../../images/holland_food_icon.png">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- external css stylesheet -->
    <link rel="stylesheet" href="../../styles/user_confirmation.css">
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
    <div class="pb-5 container">
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
                            <li class="active" id="step3"><strong>Step 3: <br>Confirmation</strong></li>

                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class=" row justify-content-center ">
        <!-- left user info -->
        <div class="col-10 col-lg-3 col-md-3 col-sm-10 justify-content-center bg-white rounded-5 p-3"
            style="height: fit-content;">
            <div class="text-center justify-content-center">
                <img src="<?php echo $_SESSION['userProfilePic']?>" class="rounded-circle" width="120px" height="120px">
            </div>

            <div class="justify-content-center p-lg-5 p-md-3 p-sm-1">
                <div class="form-group mt-3">
                    <label class="fw-bold" for="username">Name</label>
                    <input type="text" class="form-control input input-border" id="username" placeholder="John Wick"  value="<?php echo $_SESSION['userFirstName']?>" disabled>
                </div>

                <div class="form-group mt-3">
                    <label class="fw-bold" for="email">Email</label>
                    <input type="email" class="form-control input input-border" id="email"
                        placeholder="example@gmail.com" value="<?php echo $_SESSION['userEmail']?>"disabled>
                </div>

                <div class="form-group mt-3 mb-5">
                    <label class="fw-bold" for="contactnumber">Contact Number</label>
                    <input type="text" class="form-control input input-border" id="contactnumber"
                        placeholder="0123456789" value="<?php echo $_SESSION['userContactNo']?>"disabled>
                </div>


            </div>

        </div>

        <div
            class="col-10 col-lg-6 col-md-6 col-sm-10 justify-content-center bg-light ms-lg-5 ms-sm-0 ms-md-5 mt-sm-3 mt-md-0 mt-lg-0 mt-3 rounded-5 pb-3 py-3">

            <div class="container ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                <div class=" justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="bi bi-geo-alt-fill icon"></i></span>
                    </div>
                    <div class="ms-3" style="display: inline-block;">
                        <p class=""><strong>Holland Food</strong></br><small>Kolej Kediaman Kinabalu, University of
                                Malaya</small></p>
                    </div>
                </div>
            </div>

            <div class="row ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="bi bi-calendar-fill icon"></i></span>
                    </div>
                    <div class="ms-3" style="display: inline-block;">
                        <p class=""><strong>Date:</strong></br><small><?php echo $_SESSION['reservationDate']?></small></p>
                    </div>
                </div>

                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="bi bi-clock-fill icon"></i></span>
                    </div>
                    <div class="ms-3" style="display: inline-block;">
                        <p class=""><strong>Time:</strong></br><small><?php echo $timeSlot[$_SESSION['slot']-1]?></small></p>
                    </div>
                </div>

            </div>

            <div class="row ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="icon"><img src="../../images/coffee-table 1.png" width="35px"> </i></span>
                    </div>
                    <div class="ms-2" style="display: inline-block;">
                        <p class=""><strong>Table No:</strong><small> <?php echo $_SESSION['selectedTable']?></small></p>
                    </div>
                </div>

                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="bi bi-person-fill icon"></i></span>
                    </div>
                    <div class="ms-3" style="display: inline-block;">
                        <p class=""><strong>No of Pax:</strong><small> <?php echo $_SESSION['noOfPax']?></small></p>
                    </div>
                </div>

            </div>

            <div class="row ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center ">
                    <div class="" style="display: inline-block;">
                        <span><i class="icon"><img src="../../images/eating-utensils 1.png" width="35px"> </i></span>
                    </div>
                    <div class="ms-2" style="display: inline-block;">
                        <p class="strong"><strong>Ordered Food:</strong></p>
                    </div>
                    <div class="rounded  justify-content-center me-lg-2 me-md-2 me-sm-0 div-border">
                    <?php

                         // Accessing cart items from session
                         if(isset($_SESSION['cart'])){
                        $cart = $_SESSION['cart'];

                        // Iterate over cart items
                        foreach ($cart as $itemCode => $quantity) {
                            $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?");
                            $stmt->bind_param("i", $itemCode);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            $menuName = $row['menuName'];
                            $menuImage = $row['menuImage'];
                            $_SESSION['foodName']= $_SESSION['foodName']." ".$row['menuName'];

                    ?>

                        <div class="justify-content-center px-2">
                            <div class="ms-3" style="display: inline-block;">
                                <span><i class="icon"><img src="../../images/<?php echo $menuImage; ?>" width="40 px"></i> </span>
                            </div>
                            <div class="ms-2 mt-1" style="display: inline-block;">
                                <p class="h6 ordered-food"><strong><?php echo $menuName; ?></strong><br><small> x <?php echo $quantity; ?></small></p>
                            </div>
                            <hr class="line-break">
                        </div>

                        <!-- close the loop -->
                        <?php
                        }
                    }
                        ?>

                    </div>
                </div>

                <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center mt-2 mt-sm-2 mt-md-0 mt-lg-0">
                    <div class="" style="display: inline-block;">
                        <span><i class="icon"><img src="../../images/note.png" width="25px"></i></span>
                    </div>
                    <div class="ms-3" style="display: inline-block;">
                        <p class=""><strong>Note: </strong></p>
                    </div>
                    <form>
                        <div class="form-group me-4">
                            <textarea class="form-control input-border" id="note" rows="4"></textarea>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="button-container mt-3 px-5">
        <button class="start-button button-shape" onclick="location.href = 'user_menu.php';">Previous</button>
        <button type="submit" class="end-button button-shape confirm-button">Confirm</button>
    </div>


    <div id="confirm-modal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="icon-box">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h4 class="modal-title w-100">Awesome!</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Your reservation has been confirmed. Check your email for details.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-success btn-block" data-dismiss="modal"
                        onclick="location.href = '../../index.php';">Return to home page</button>
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

    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body text-center">
                <strong>Creating reservaton...</strong>
                <div class="spinner-border ml-auto text-danger mt-3" role="status">
                <span class="sr-only"></span>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        const confirmModal = new bootstrap.Modal("#confirm-modal");
        const loadingModal = new bootstrap.Modal("#loadingModal");
        const confirmBtn = document.querySelector(".confirm-button");


        confirmBtn.addEventListener("click", function () {
            var textarea = document.getElementById("note");
            var noteText = textarea.value;
            console.log(noteText);
            loadingModal.show();
            $.ajax({
                url: '../../backend/user/reservation.php',
                method: 'POST',
                data: { note: noteText },
                success: function(response) {
                loadingModal.hide();
                console.log("uhudfai");
                confirmModal.show();
                },
                error: function(xhr, status, error) {
                // Handle the error response
                console.error(error);
                alert('An error occurred while make the reservation. Please try again.');
                }
            });
        });

        var modalLogout = new bootstrap.Modal("#logout-modal");
        var logoutButton = document.getElementById('logoutBtn');
        logoutButton.addEventListener("click", function () {
            console.log(1);
            modalLogout.show();
        });

    </script>

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