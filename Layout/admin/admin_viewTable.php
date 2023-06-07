<?php

include_once("../../config.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS (hosted online)-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" href="../../styles/admin_style.css" />
    <link rel="stylesheet" href="../../styles/adminViewTable_style.css" />

    <title>Admin Table</title>
  </head>

  <body>
    <div class="container-fluid vh-100">
      <div class="row">
        <!-- Sidebar -->
        <div class="sideBar col-2 col-md-3 col-xl-2 px-sm-2 px-0">
          <div
            class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
          >
            <div class="mx-auto pt-4 pe-2">
              <img
                src="../../images/holland_food_icon.png"
                class="img-fluid"
                width="120px"
              />
            </div>
            <a
              href="/"
              class="d-flex align-items-center pb-3 mb-0 mx-auto text-white text-decoration-none border-bottom"
            >
              <span class="sidebar-heading fw-bold fs-5 text-center"
                >Holland Food</span
              >
            </a>

            <ul
              class="nav nav-pills flex-column mb-sm-auto mx-auto mb-0 align-items-center align-items-sm-start"
              id="menu"
            >
              <li class="nav-item">
                <a href="admin_viewTable.html" class="nav-link">
                  <div class="navList">
                    <i class="navIcon fs-4 bi-table text-center text-black text-center"></i>
                    <span class="ms-1 d-none d-sm-inline text-black" style="font-weight: 500;">Tables</span>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_menu.html" class="nav-link">
                  <div class="navList">
                    <i
                      class="navIcon fs-4 bi-menu-button-wide text-center text-center"
                    ></i>
                    <span class="ms-1 d-none d-sm-inline">Menu</span>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_manageUserAcc.html" class="nav-link">
                  <div class="navList">
                    <i
                      class="navIcon fs-4 bi-people text-center text-center"
                    ></i>
                    <span class="ms-1 d-none d-sm-inline">Users</span>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin_login.html" class="nav-link">
                  <div class="navList">
                    <i
                      class="navIcon fs-4 bi-box-arrow-left text-center text-center"
                    ></i>
                    <span class="ms-1 d-none d-sm-inline">Sign out</span>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- sidebar end -->

        <!--2nd column Table-->
        <div class="container col-sm-7 col-md-7 col-7">
          <!-- search bar -->
          <form>
            <div class="search-dateTime row justify-content-center">
              <div class="col">
                <label class="label" for="date">Select Date:</label>
                <div class="input-group">
                  <input
                    type="date"
                    class="form-control input"
                    id="date"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                  />
                </div>
              </div>

              <div class="form-group col">
                <label class="label" for="time">Select Time:</label>
                <select id="time" class="form-control form-select input">
                  <option value="">-</option>
                  <option value="9:00-10:00">9:00-10:00</option>
                  <option value="10:00-11:00">10:00-11:00</option>
                  <option value="11:00-12:00">11:00-12:00</option>
                  <option value="12:00-13:00">12:00-13:00</option>
                  <option value="13:00-14:00">13:00-14:00</option>
                  <option value="14:00-15:00">14:00-15:00</option>
                </select>
              </div>

              <!-- <div class="form-group col-lg-2 col-sm-2 col-md-2 col-2 text-center  ">
                <button id="searchBtn" class="rounded-pill button-shape mt-4" type="submit">Search</button>
                </div>   -->
            </div>
          </form>

          <!-- <div class="dateTime col-lg-3 col-sm-3 col-md-3 col-3 ">
            <input
            type="datetime-local" 
            id="datetime" 
            name="datetime"
            class="form-control"
            />
          </div> -->

          <!--
          <div class="row">
            <div class="table">
              <div class="table_NUM">T1</div>
            </div>
            
          </div>
-->

          <div class="table-container">
            <div class="table checkedIn" id="t1">T1</div>
            <div class="table reserved" id="t2">T2</div>
            <div class="table" id="t3">T3</div>
            <div class="table" id="t4">T4</div>
            <div class="table" id="t5">T5</div>
            <div class="table checkedIn" id="t6">T6</div>
            <div class="table reserved" id="t7">T7</div>
            <div class="table" id="t8">T8</div>
            <div class="table" id="t9">T9</div>

            <!-- Table label -->
            <div class="col-11 col-lg-11 mt-5 pt-5">
              <div class="row">
                <div class="col-md-4 col-lg-3 justify-content-center">
                  <div class="square rounded table-label-free"></div>
                  <span class="table-label ms-1">Free :</span>
                </div>

                <div class="col-md-4 col-lg-3 justify-content-center">
                  <div class="square rounded table-label-reserved"></div>
                  <span class="table-label ms-1">Reserved :</span>
                </div>

                <div class="col-md-4 col-lg-3 justify-content-center">
                  <div class="square rounded table-label-checkedIn"></div>
                  <span class="table-label ms-1">Checked-in :</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--3rd Column-->
        <!--arrow icon when screen size become small-->
        <div class="sidebar col-2">
          <button class="sidebar-toggle toggle-button">
            <i class="slideOutIcon fs-4 bi-caret-left-fill"></i>
		        <span class="reserve-wait-count"></span>
          </button>
        </div>

        <div class="container-fluid rightBar col-md-3 col-sm-3 col-3">
          <div class="row flex-row border-bottom">
            <div class="col reservation selectedReservation align-items-center">
              RESERVATION
              <span class="reserve-count"></span>
            </div>

            <div class="col waitlist align-items-center">
              WAITLIST
              <span class="wait-count"></span>
            </div>
          </div>

          <br />

          <div class="row mb-4">
            <div class="search-container">
              <form action="/action_page.php">
                <div class="search">
                  <input
                    type="search"
                    class="form-control search-click input"
                    name="search"
                    placeholder="Search here..."
                  />
                  <button class="searchIcon">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div class="row ms-1">
            <div>
              <h5><strong id="selected-time"></strong></h5>
            </div>
          </div>


        <!--Reservation tab-->
        <div id="reserve" class="reserveWaitTab">
          <form method="POST" action="admin_viewTable.php">
          <?php
        // Fetch and display data from the database
        $query = "SELECT r.*, u.userName, u.userEmail, u.userPhoneNo, u.userProfile FROM reservation r JOIN users u ON r.userID = u.userID";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $reserveID = $row['reserveID'];
            $userID = $row['userID'];
            $reservedDate = $row['reservedDate'];
            $reservedTime = $row['reservedTime'];
            $tableNo = $row['tableNo'];
            $paxNo = $row['paxNo'];
            $reservedFood = $row['reservedFood'];
            $reservedNote = $row['reservedNote'];
            $status = $row['status'];
            $userName = $row['userName'];

            // Display the waitlist entry
            ?>
              <section class="cover-section container">
                <section class="section-title">
                  <div class="row">
                    <div class="col-sm">
                      <h5>T<?php echo $tableNo; ?></h5>
                    </div>
                    <div class="col-sm pt-3 ps-4 fw-bold"><?php echo $userName; ?></div>
                    <div class="col-sm p-3"><?php echo $paxNo; ?> persons</div>
                  </div>
                </section>
                <section class="section-content hide">
                  <div class="row mt-1 ms-2">
                    Pre-ordered Items : <br />
                    <ol>
                      <li><?php echo $reservedFood; ?></li>
                      <!-- <li>Tiramisu</li>
                            <li>Milk</li>
                            <li>Chocolate Cake</li> -->
                    </ol>
                  </div>
                  <div class="details">
                        <p class="view-details-link" data-reserveid="<?php echo $reserveID; ?>" id="viewAllDetails" a-toggle="tooltip" data-placement="bottom" title="More Details">view
                            details&nbsp;<i class="bi bi-chevron-right"></i></p>
                    </div>
                  <div class="row d-flex justify-content-center ms-5">
                    <button class="Cancel button bg-danger text-white">Cancel</button>
                    <button class="Arrived button bg-success text-white">Arrived</button>
                  </div>
                </section>
                <input type="hidden" name="reserveID" id="reserveIDInput" value="<?php echo $reserveID; ?>">
              </section>
          </form>
        <?php
            } // end while loop
        ?>
        </div>



         <!--Waitlist tab-->
        <div id="waitList" class="reserveWaitTab" style="display: none">

        <?php
        // Fetch and display data from the database
        $query = "SELECT r.*, u.userName, u.userEmail, u.userPhoneNo, u.userProfile FROM reservation r JOIN users u ON r.userID = u.userID";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $reserveID = $row['reserveID'];
            $userID = $row['userID'];
            $reservedDate = $row['reservedDate'];
            $reservedTime = $row['reservedTime'];
            $tableNo = $row['tableNo'];
            $paxNo = $row['paxNo'];
            $reservedFood = $row['reservedFood'];
            $reservedNote = $row['reservedNote'];
            $status = $row['status'];
            $userName = $row['userName'];

            // Display the waitlist entry
            ?>
            <section class="cover-section container">
                <section class="section-title">
                    <div class="row">
                        <div class="col-sm">
                            <h5>T<?php echo $tableNo; ?></h5>
                        </div>
                        <div class="col-sm pt-3 ps-4 fw-bold"><?php echo $userName; ?></div>
                        <div class="col-sm p-3"><?php echo $paxNo; ?> persons</div>
                    </div>
                </section>
                <section class="section-content hide">
                    <div class="row mt-1 ms-2">
                        Pre-ordered Items:<br/>
                        <ol>
                            <li><?php echo $reservedFood; ?></li>
                        </ol>
                    </div>
                    <div class="details">
                    <p id="viewAllDetails" a-toggle="tooltip" data-placement="bottom" title="More Details">view
                            details&nbsp;<i class="bi bi-chevron-right"></i></p>
                    </div>
                    <div class="row d-flex justify-content-center ms-5">
                        <button class="Decline button bg-danger text-white">Decline</button>
                        <button class="Accept button bg-success text-white">Accept</button>
                    </div>
                </section>
            </section>
            <?php
        } // end while loop
        ?>     
        </div>



  <!--View Details Modal-->
<div class="modal" id="view-details-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservation Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="view-details-modal-body">

                <?php
                // Check if the 'reserveID' key exists in the $_POST array
                if (isset($_POST['reserveID'])) {
                    // Retrieve the reserveID from the AJAX request
                    $reserveID = $_POST['reserveID'];

                    // Check if the reserveID is empty or not
                    if (!empty($reserveID)) {
                        // Retrieve the reservation details from the database
                        $query = "SELECT r.*, u.userName, u.userPhoneNo, u.userEmail FROM reservation r LEFT JOIN users u ON r.userID = u.userID WHERE reserveID = $reserveID";
                        $result = mysqli_query($conn, $query);

                        // Check if any rows are returned
                        if ($result && mysqli_num_rows($result) > 0) {
                            // Retrieve and store data in variables
                            $row = mysqli_fetch_assoc($result);
                            // Retrieve and store the reservation details in variables
                            $reserveID = $row['reserveID'];
                            $userID = $row['userID'];
                            $reservedDate = $row['reservedDate'];
                            $reservedTime = $row['reservedTime'];
                            $tableNo = $row['tableNo'];
                            $paxNo = $row['paxNo'];
                            $reservedFood = $row['reservedFood'];
                            $reservedNote = $row['reservedNote'];
                            $status = $row['status'];
                            // Retrieve and store the user details in variables
                            $userName = $row['userName'];
                            $phoneNumber = $row['userPhoneNo'];
                            $email = $row['userEmail'];

                            // Display the reservation and waitlist information in the modal
                            ?>
                            <div class="text-center justify-content-center">
                                <img src="/images/profile-icon-blue.png" width="120px">
                            </div>
                            <div class="mt-3 d-flex align-items-center flex-column ms-10">
                                <p><strong>Name:</strong> <?php echo $userName; ?><br>
                                    <strong>Phone Number:</strong> <?php echo $userPhoneNo; ?><br>
                                    <strong>Email:</strong> <?php echo $userEmail; ?></p>
                            </div>
                            <div class="row ms-3 mt-2">
                                <div class="col justify-content-center ">
                                    <div class="fs-4 ms-1" style="display: inline-block;">
                                        <span><i class="bi bi-calendar-fill icon"></i></span>
                                    </div>
                                    <div class="ms-3" style="display: inline-block;">
                                        <p class=""><strong>Date:</strong><br><small><?php echo $reservedDate; ?></small></p>
                                    </div>
                                </div>
                                <div class="col justify-content-center ">
                                    <div class="fs-4" style="display: inline-block;">
                                        <span><i class="ms-1 bi bi-clock-fill icon"></i></span>
                                    </div>
                                    <div class="ms-3" style="display: inline-block;">
                                        <p class=""><strong>Time:</strong><br><small><?php echo $reservedTime; ?></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mt-2">
                                <div class="col mt-2 justify-content-center ">
                                    <div class="" style="display: inline-block;">
                                        <span><i class="icon"><img src="/images/table_admin.png" width="31px"></i> </span>
                                    </div>
                                    <div class="ms-2" style="display: inline-block;">
                                        <p class="mt-1"><strong>Table No:</strong><small><?php echo $tableNo; ?></small></p>
                                    </div>
                                </div>
                                <div class="col justify-content-center ">
                                    <div class="fs-2" style="display: inline-block;">
                                        <span><i class="bi bi-person-fill icon"></i></span>
                                    </div>
                                    <div class="ms-2" style="display: inline-block;">
                                        <p class=""><strong>No of Pax:</strong><small><?php echo $paxNo; ?></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row ms-3 mt-2">
                                <div class="col justify-content-center ">
                                    <div class="" style="display: inline-block;">
                                        <span><i class="icon"><img src="/images/admin-food-icon.png" width="32px"></i> </span>
                                    </div>
                                    <div class="ms-2" style="display: inline-block;">
                                        <p class="strong"><strong>Ordered Food:</strong></p>
                                    </div>
                                    <div class="orderedFood-container rounded justify-content-center me-lg-2 me-md-2 me-sm-0">
                                        <!-- ordered food -->
                                        <div class="justify-content-center px-2 mt-2">
                                            <div class="ms-3" style="display: inline-block;">
                                                <span><i class="icon"><img src="/images/spaghetti_icon.png" width="40 px"></i> </span>
                                            </div>
                                            <div class="ms-2 mt-1" style="display: inline-block;">
                                                <p class="h6 ordered-food"><strong><?php echo $reservedFood; ?></strong><br><small></small></p>
                                            </div>
                                            <hr class="line-break">
                                        </div>
                                    </div>
                                </div>
                                <div class="col justify-content-center">
                                    <div class="ms-1" style="display: inline-block;">
                                        <span><i class="icon"><img src="/images/admin-notes.png" width="26px"></i></span>
                                    </div>
                                    <div class="ms-2" style="display: inline-block;">
                                        <p class=""><strong>Note: </strong></p>
                                    </div>
                                    <div class="note-container">
                                        <p class="ms-2 mt-1"><?php echo $reservedNote; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            // No reservation found with the given reserveID
                            echo "No reservation found.";
                        }
                    } else {
                        // Invalid reserveID parameter
                        echo "Invalid reserveID parameter.";
                    }
                } else {
                    // Missing reserveID parameter
                    echo "Missing reserveID parameter.";
                }
                ?>
            </div>
        </div>
    </div>
</div>


    <!-- Include Bootstrap JavaScript plugin -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../script/adminViewTable.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    
  </body>
</html>
      