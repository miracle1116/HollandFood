<?php
session_start();
$timeSlot = ['8:00-9:00','9:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00',
'14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00',
'21:00-22:00'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1: Select table</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- external css stylesheet -->
    <link rel="stylesheet" href="../..//styles/user_table.css">
    <link rel="stylesheet" href="../..//styles/user_progress.css">
    <link rel="stylesheet" href="../..//styles/user_all_style.css">

    <!-- Include Bootsrap JavaScript plugin -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <!-- external font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="container">
                <a class="navbar-brand fw-bold" href="../../index.php"><img src="../..//images/holland_food_icon.png"
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
                            <a class="nav-link active nav-link-underline" aria-current="page" href="/index2.html#home">Home</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link nav-link-underline" href="/index2.html#aboutUs">About Us</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link nav-link-underline" href="/index2.html#menu">Menu</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link active nav-link-underline" href="/index2.html#bookNow">Book Now</a>
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
                            <li class="" id="step2"><strong>Step 2: <br>Select Menu</strong></li>
                            <li class="" id="step3"><strong>Step 3: <br>Confirmation</strong></li>

                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 container justify-content-center">
        <!-- search bar -->
        <form action="../../backend/user/selectTable.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-3 col-md-3 col-3 ">
                    <label class="fw-bold label" for="date">Select Date:</label>
                    <div class="input-group">
                        <input type="date" name="date" class="form-control input" id="date" aria-describedby="emailHelp"
                            placeholder="Enter email" value='<?php if(isset($_SESSION['reservationDate'])){echo $_SESSION['reservationDate'];}?>'>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-sm-3 col-md-3 col-3 ">
                    <label class="fw-bold label" for="time">Select Time:</label>
                    <select id="time" name="slot" class="form-control form-select input" value='<?php if(isset($_SESSION['slot'])){echo $timeSlot[intval($_SESSION['slot'])];}?>'>
                        <option value="1" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='1') echo'selected';}?>>8:00-9:00</option>
                        <option value="2" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='2') echo'selected';}?>>9:00-10:00</option>
                        <option value="3" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='3') echo'selected';}?>>10:00-11:00</option>
                        <option value="4" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='4') echo'selected';}?>>11:00-12:00</option>
                        <option value="5" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='5') echo'selected';}?>>12:00-13:00</option>
                        <option value="6" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='6') echo'selected';}?>>13:00-14:00</option>
                        <option value="7" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='7') echo'selected';}?>>14:00-15:00</option>
                        <option value="8" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='8') echo'selected';}?>>15:00-16:00</option>
                        <option value="9" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='9') echo'selected';}?>>16:00-17:00</option>
                        <option value="10" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='10') echo'selected';}?>>17:00-18:00</option>
                        <option value="11" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='11') echo'selected';}?>>18:00-19:00</option>
                        <option value="12" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='12') echo'selected';}?>>19:00-20:00</option>
                        <option value="13" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='13') echo'selected';}?>>20:00-21:00</option>
                        <option value="14" <?php if(isset($_SESSION['slot'])){if($_SESSION['slot']==='14') echo'selected';}?>>21:00-22:00</option>
                    </select>
                </div>

                <div class="form-group col-lg-3 col-sm-3 col-md-3 col-3  ">
                    <label class="fw-bold label" for="noOfPax">No Of Pax:</label>
                    <input type="number" class="form-control input input-border" id="noOfPax"  min="1" value=<?php if(isset($_SESSION['noOfPax'])){echo $_SESSION['noOfPax'];}else echo 1;?>>
                </div>

                <div class="form-group col-lg-2 col-sm-2 col-md-2 col-2 text-center  ">
                    <button id="searchBtn" name="search"class="rounded-pill button-shape mt-4" type="submit">Search</button>
                </div>
            </div>
        </form>


        <div class="row justify-content-center mt-5 p-3 ">
            <div class=" mb-3 col-11">
                <p class="fw-bold label">Choose Table</p>
            </div>
            <!-- Table row -->
            <div class="col-11 col-lg-11 ">
                <div class=" row justify-content-center">
                    <div
                        class="rounded-5 col-4 col-sm-4 col-md-4 col-lg-3 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T1</strong><br> 6 pax</p>

                        </div>

                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>
                    <div
                        class="rounded-5 col-2 col-sm-2 col-md-2 col-lg-1 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T2</strong><br> 2 pax</p>

                        </div>
                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>
                    <div class="rounded-5 col-3 col-sm-3 col-md-3 col-lg-2 table-all d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T3</strong><br> 4 pax</p>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-11 col-lg-11 mt-5">
                <div class=" row justify-content-center">
                    <div
                        class="rounded-5 col-2 col-sm-2 col-md-2 col-lg-1 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T4</strong><br> 2 pax</p>

                        </div>
                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>
                    <div
                        class="rounded-5 col-3 col-sm-3 col-md-3 col-lg-2 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T5</strong><br> 4 pax</p>

                        </div>
                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>

                    <div class="rounded-5 col-4 col-sm-4 col-md-4 col-lg-3 table-all d-flex justify-content-center ">
                        <div class="text-center">
                            <p><strong>T6</strong><br> 6 pax</p>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-11 col-lg-11 mt-5">
                <div class=" row justify-content-center">
                    <div
                        class="rounded-5 col-3 col-sm-3 col-md-3 col-lg-2 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T7</strong><br> 4 pax</p>

                        </div>
                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>

                    <div
                        class="rounded-5 col-4 col-sm-4 col-md-4 col-lg-3 table-all me-2 me-lg-3 d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T8</strong><br> 6 pax</p>

                        </div>
                    </div>
                    <div class="col-1 col-lg-1 me-2 me-lg-3">
                    </div>
                    <div class="rounded-5 col-2 col-sm-2 col-md-2 col-lg-1 table-all d-flex justify-content-center">
                        <div class="text-center">
                            <p><strong>T9</strong><br> 2 pax</p>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Table label -->
            <div class="col-11 col-lg-11 mt-5 pt-5">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 justify-content-center ">
                        <div class="square rounded table-label-unavailable">
                        </div>
                        <span class="label ms-1" style="font-size: 11px; display: inline-block; ">Unavailable</span>
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 justify-content-center ">
                        <div class="square rounded table-label-available">
                        </div>
                        <span class="label ms-1" style="font-size: 11px; display: inline-block; ">Available</span>
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 justify-content-center ">
                        <div class="square rounded table-label-selected">
                        </div>
                        <span class="label ms-1" style="font-size: 11px; display: inline-block; ">Selected</span>
                    </div>

                </div>
            </div>

            <div class="col-11 col-lg-11 mt-5">
                <p class="label mt-2"style="display: inline-block;">Selected Table ID:</p>
                <p class="label " id="selectedTable"><?php if(isset($_SESSION['selectedTable'])){ echo $_SESSION['selectedTable'];}?></p>
                <div class="button-container" style="display: inline-block; float: right; padding-left: 10px;">
                    <button type="button" id="nextToMenu"
                        class="end-button button-shape">Next</button>
                </div>
            </div>



        </div>



    </div>

    <!-- logout-modal -->
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
                    <button id="btn-cancel-logout" class="btn2 btn-success btn-block p-2 btn-cancel" data-dismiss="modal" onclick="location.href = 'user_table.php';">Cancel</button>
                    <button id="btn-confirm" class="btn2 btn-success btn-block p-2 btn-confirm" data-dismiss="modal" onclick="location.href = '../../backend/user/logout.php';">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        const searchBtn = document.getElementById("searchBtn");

        searchBtn.addEventListener("click", function(event) {
        //event.preventDefault(); // prevent page from reloading
        // Your search code goes here
        const tableDivs = document.querySelectorAll('.table-all');
        const selectedTables = [];
        // const selectedTable = document.getElementById('selectedTable');
        // customize the array here
        var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(Number(this.responseText));
        var borderColors = JSON.parseInt(Number(this.responseText));
        tableDivs.forEach((div, index) => {
            if (borderColors[index] === 1) {
                div.classList.add('unavailable', 'disabled');
            } else if (borderColors[index] === 0) {
                div.classList.add('available');
            }
            div.addEventListener('click', () => {
                const strongElement = div.querySelector('strong');
                const tableId = strongElement.textContent;
                if (selectedTables.includes(tableId)) {
                // If the table is already selected, remove it from the array and UI
                    const index = selectedTables.indexOf(tableId);
                    if (index > -1) {
                    selectedTables.splice(index, 1);
                    }
                div.classList.remove('selected');
                } else if (!div.classList.contains('unavailable')) {
                // If the table is not selected and is not unavailable, add it to the array and UI
                    selectedTables.push(tableId);
                    div.classList.add('selected');
                }
                // Update the UI with the selected table IDs
            const selectedTablesElement = document.getElementById('selectedTable');
            selectedTable.textContent = `Selected Table IDs: ${selectedTables.join(',')}`;
        

            });
        });
      }
    };

    xhttp.open("GET", "../../backend/user/selectTable.php", true);
    xhttp.send();
        // const borderColors = [1, 1, 0, 0, 1, 0, 0, 0, 1];

        });
       


        var modalLogout = new bootstrap.Modal("#logout-modal");
        var logoutButton = document.getElementById('logoutBtn');
        logoutButton.addEventListener("click", function () {
        console.log(1);
        modalLogout.show();
         });


    </script> -->


<!-- <script>
    const tableDivs = document.querySelectorAll('.table-all');
    const selectedTable = document.getElementById('selectedTable');
    // customize the array here
    const borderColors = [1, 1, 0, 0, 1, 0, 0, 0, 1];

    tableDivs.forEach((div, index) => {
        if (borderColors[index] === 1) {
            div.classList.add('unavailable', 'disabled');
        } else if (borderColors[index] === 0) {
            div.classList.add('available');
        }
        div.addEventListener('click', () => {
            // Remove 'selected' class from all divs
            tableDivs.forEach((div) => {
                div.classList.remove('selected');
            });
            // Add 'selected' class to clicked div
            div.classList.add('selected');
            selectedTable.textContent = `Selected Table ID: ${div.textContent}`;
        });
    });

    var modalLogout = new bootstrap.Modal("#logout-modal");
    var logoutButton = document.getElementById('logoutBtn');
    logoutButton.addEventListener("click", function () {
    console.log(1);
    modalLogout.show();
     });


</script> -->


<script>
        const searchBtn = document.getElementById("searchBtn");

        searchBtn.addEventListener("click", function(event) {
            var date = document.getElementById("date").value;
            var slot =document.getElementById("time").value;
            var pax =document.getElementById("noOfPax").value;
            

        $.ajax({
                url: '../../backend/user/selectTable.php',
                method: 'POST',
                data: { date: date, slot : slot  },
                success: function(response) {
                console.log("uhudfai");
                },
                error: function(xhr, status, error) {
                // Handle the error response
                console.error(error);
                alert('An error occurred while make the reservation. Please try again.');
                }
            });

            $.ajax({
                url: '../../backend/user/setNoOfPax.php',
                method: 'POST',
                data: { pax:pax },
                success: function(response) {
                console.log("uhudfai");
                },
                error: function(xhr, status, error) {
                // Handle the error response
                console.error(error);
                alert('An error occurred while make the reservation. Please try again.');
                }
            });            

            console.log(pax);

        });
        
        const tableDivs = document.querySelectorAll('.table-all');
        var selectedTables = [];
        <?php if (isset($_SESSION['selectedTable'])) { ?>
            var selectedTableString = <?php echo json_encode($_SESSION['selectedTable']); ?>;
            selectedTables = selectedTableString.split(",");
        <?php } ?>
        // const selectedTable = document.getElementById('selectedTable');
        // customize the array here
        console.log(<?php echo json_encode($_SESSION['allTableAvailability'])?>);
        const borderColors = <?php echo json_encode($_SESSION['allTableAvailability'])?>;

        tableDivs.forEach((div, index) => {
            if (borderColors[index] === '1') {
                div.classList.add('unavailable', 'disabled');
            } else if (borderColors[index] === '0') {
                div.classList.add('available');
            }
            div.addEventListener('click', () => {
                const strongElement = div.querySelector('strong');
                const tableId = strongElement.textContent;
                if (selectedTables.includes(tableId)) {
                // If the table is already selected, remove it from the array and UI
                    const index = selectedTables.indexOf(tableId);
                    if (index > -1) {
                    selectedTables.splice(index, 1);
                    }
                div.classList.remove('selected');
                } else if (!div.classList.contains('unavailable')) {
                // If the table is not selected and is not unavailable, add it to the array and UI
                    selectedTables.push(tableId);
                    div.classList.add('selected');
                }
                // Update the UI with the selected table IDs
            const selectedTablesElement = document.getElementById('selectedTable');
            selectedTable.textContent =  selectedTables.join(',');
        

            });
        });

        var modalLogout = new bootstrap.Modal("#logout-modal");
        var logoutButton = document.getElementById('logoutBtn');
        logoutButton.addEventListener("click", function () {
        console.log(1);
        modalLogout.show();
         });


        const nextToMenu = document.getElementById("nextToMenu");

        nextToMenu.addEventListener("click", function(event) {
            var table = document.getElementById("selectedTable").innerText;
            console.log(table);

        $.ajax({
                url: '../../backend/user/parseTable.php',
                method: 'POST',
                data: {table: table },
                success: function(response) {
                    window.location.href = '../../Layout/user/user_menu.php';
                },
                error: function(xhr, status, error) {
                // Handle the error response
                console.error(error);
                alert('An error occurred while make the reservation. Please try again.');
                }
            });

        });

        <?php if(isset($_SESSION['selectedTable'])){?>
            const string = <?php echo json_encode($_SESSION['selectedTable']);?>;
            var tableArray = string.split(',');

            // Iterate over each table element
            var tableElements = document.querySelectorAll('.table-all');
            tableElements.forEach(function(element) {
            var tableNumber = element.querySelector('strong').textContent;
            
            // Check if the table number is in the array
            if (tableArray.includes(tableNumber)) {
                element.classList.add('selected'); // Add the class to the table element
            }
            });
        <?php }?>


    </script>

</body>

</html>