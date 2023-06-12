<?php
session_start();
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Include Bootsrap JavaScript plugin -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

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
                <a href="admin_manageUserAcc.php" class="nav-link">
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
          <form action="../../backend/admin/viewTable.php" method="POST">
            <div class="search-dateTime row justify-content-center">
              <div class="col">
                <label class="label" for="date">Select Date:</label>
                <div class="input-group">
                  <input
                    name= "date"
                    type="date"
                    class="form-control input"
                    id="date"
                    aria-describedby="emailHelp"
                    placeholder="Enter email"
                    value='<?php if(isset($_SESSION['reservationDate'])){echo $_SESSION['reservationDate'];}?>'
                  />
                </div>
              </div>

              <div class="form-group col">
                <label class="label" for="time">Select Time:</label>
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

              <div class="form-group col-lg-2 col-sm-2 col-md-2 col-2 text-center  ">
                <button id="searchBtn" class="rounded-pill button-shape mt-4" type="submit">Search</button>
                </div>  
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
            <div class="table" id="t1">T1</div>
            <div class="table " id="t2">T2</div>
            <div class="table" id="t3">T3</div>
            <div class="table" id="t4">T4</div>
            <div class="table" id="t5">T5</div>
            <div class="table" id="t6">T6</div>
            <div class="table" id="t7">T7</div>
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

            <div class="col waitlist selectedWaitlist align-items-center">
              WAITLIST
              <span class="wait-count"></span>
            </div>
          </div>

          <br />

          <div class="row mb-4">
            <div class="search-container">
              <form action ="admin_viewTable.php" method = "POST">
                <div class="search">
                  <input
                    type="text"
                    class="form-control search-click input"
                    name="search"
                    placeholder="Search here..."
                  />
                  <button class="searchIcon" name = "submit">
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


          <!-- DISPLAY RESERVATION (Status-> Approved) -->
          <?php
            if(isset($_POST['submit'])){
              $search = $_POST['search'];
              // Assuming you have already established a database connection
              $query = "SELECT r.*, u.userFirstName, u.userEmail, u.userContactNo, u.userProfilePic FROM reservation r JOIN users u ON r.userID = u.userID WHERE userFirstName LIKE '%$search%' AND r.status='Approved'";
            }else{
              $query = "SELECT r.*, u.userFirstName, u.userEmail, u.userContactNo, u.userProfilePic FROM reservation r JOIN users u ON r.userID = u.userID WHERE r.status='Approved'";
            }
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
              $userName = $row['userFirstName'];
              $userPhoneNo = $row['userContactNo'];
              $userEmail = $row['userEmail'];

            ?>

          <!--Reservation tab-->
          <div id="reserve" class="reserveWaitTab">
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
                <!-- Display reserved food items -->
                <div class="row mt-1 ms-2">
                          Pre-ordered Items : <br />
                          <ol>
                <?php
                  // echo ($reservedFood) . "<br>";
                  $reservedFoodArr = unserialize($reservedFood);
                  // var_dump ($reservedFoodArr);
                  
                  foreach ($reservedFoodArr as $itemCode => $quantity) {
                      $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?;");
                      $stmt->bind_param("i", $itemCode);
                      $stmt->execute();
                      $result = $stmt->get_result();
                      $row = $result->fetch_assoc();
                      $menuName = $row['menuName'];

                ?>
                  <li><?php echo  $menuName; ?></li>
                    
                  <!-- close the loop -->
                  <?php
                    }
                  ?>
                  </ol>
                </div>
                      <div class="details">
                        <p id="viewAllDetails" class="view-details" data-bs-toggle="modal" data-bs-target="#view-details-modal<?php echo $reserveID; ?>" name="viewdetails" data-reserveid="<?php echo $reserveID; ?>">view details&nbsp;<i class="bi bi-chevron-right"></i></p>
                      </div>




                
                <!--View Details Modal Start-->
                <div class="modal" id="view-details-modal<?php echo $reserveID; ?>">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Reservation Information</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                              <div class="text-center justify-content-center">
                                  <img src="/images/profile-icon-blue.png" width="120px">
                              </div>
                              <div class="mt-3 d-flex align-items-center flex-column ms-10">
                                  <p><strong>Name: </strong><?php echo $userName; ?><br>
                                  <strong>Phone Number: </strong><?php echo $userPhoneNo; ?><br>
                                  <strong>Email: </strong><?php echo $userEmail; ?></p>
                              </div>
                              <div class="row ms-3 mt-2">
                                  <div class="col justify-content-center">
                                      <div class="fs-4 ms-1" style="display: inline-block;">
                                          <span><i class="bi bi-calendar-fill icon"></i></span>
                                      </div>
                                      <div class="ms-3" style="display: inline-block;">
                                          <p class=""><strong>Date:</strong><br><small><?php echo $reservedDate; ?></small></p>
                                      </div>
                                  </div>
                                  <div class="col justify-content-center">
                                      <div class="fs-4" style="display: inline-block;">
                                          <span><i class="ms-1 bi bi-clock-fill icon"></i></span>
                                      </div>
                                      <div class="ms-3" style="display: inline-block;">
                                          <p class=""><strong>Time:</strong><br><small><?php echo $reservedTime; ?></small></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row ms-3 mt-2">
                                  <div class="col mt-2 justify-content-center">
                                      <div class="" style="display: inline-block;">
                                          <span><i class="icon"><img src="/images/table_admin.png" width="31px"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class="mt-1"><strong>Table No:</strong><small><?php echo $tableNo; ?></small></p>
                                      </div>
                                  </div>
                                  <div class="col justify-content-center">
                                      <div class="fs-2" style="display: inline-block;">
                                          <span><i class="bi bi-person-fill icon"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class=""><strong>No of Pax:</strong><small><?php echo $paxNo; ?></small></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                                  <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center">
                                      <div class="" style="display: inline-block;">
                                          <span><i class="icon"><img src="/images/admin-food-icon.png" width="32px"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class="strong"><strong>Ordered Food:</strong></p>
                                      </div>
                                      <div class="orderedFood-container rounded justify-content-center me-lg-2 me-md-2 me-sm-0 div-border">
                                          <!-- ordered food -->
                                          
                    
                                                <!-- Display reserved food items -->
                                                <?php
                                                
                                                  foreach ($reservedFoodArr as $itemCode => $quantity) {
                                                      $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?;");
                                                      $stmt->bind_param("i", $itemCode);
                                                      $stmt->execute();
                                                      $result = $stmt->get_result();
                                                      $row = $result->fetch_assoc();
                                                      $menuName = $row['menuName'];
                                                      $menuImage = $row['menuImage'];

                                                ?>
                                                  <div class="justify-content-center px-2 mt-2">
                                                      <div class="ms-3" style="display: inline-block;">
                                                          <span><i class="icon"><img src="/images/<?php echo $menuImage; ?>" width="40px"></i></span>
                                                      </div>
                                                      <div class="ms-2 mt-1" style="display: inline-block;">
                                                          <p class="h6 ordered-food"><strong><?php echo $menuName; ?></strong><br><small>x 1</small></p>
                                                      </div>
                                                      <hr class="line-break">
                                                  </div>
                                                  <!-- close the loop -->
                                                  <?php
                                                  }
                                                  ?>
                                          </div>
                                            
                                        </div>
                                  
                                  <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center mt-2 mt-sm-2 mt-md-0 mt-lg-0">
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
                            </div>
                        </div>
                    </div>
                  </div>
              <!--View Details Modal End-->


                
                <div class="row d-flex justify-content-center ms-5">
                  <button class="button bg-danger text-white" data-reserveid="<?php echo $reserveID; ?>" name = "cancel">Cancel</button>
                  <button class="button bg-success text-white" data-reserveid="<?php echo $reserveID; ?>" name = "arrive">Arrived</button>
                </div>
              </section>
            </section>
          </div>
          <?php
            } // end while loop
          ?>
         


          <!-- DISPLAY WAITLIST (Status-> Pending) -->
          <?php
          if(isset($_POST['submit'])){
              $search = $_POST['search'];
              // Assuming you have already established a database connection
              $query = "SELECT r.*, u.userFirstName, u.userEmail, u.userContactNo, u.userProfilePic FROM reservation r JOIN users u ON r.userID = u.userID WHERE userFirstName LIKE '%$search%' AND r.status='Pending'";
            }else{
              $query = "SELECT r.*, u.userFirstName, u.userEmail, u.userContactNo, u.userProfilePic FROM reservation r JOIN users u ON r.userID = u.userID WHERE r.status='Pending'";
            }
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
              $userName = $row['userFirstName'];
              $userPhoneNo = $row['userContactNo'];
              $userEmail = $row['userEmail'];

            ?>

          <!--Waitlist tab-->
          <div id="waitList" class="reserveWaitTab" style="display: none">
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
                <!-- Display reserved food items -->
                <div class="row mt-1 ms-2">
                          Pre-ordered Items : <br />
                          <ol>
                <?php
                  // echo ($reservedFood) . "<br>";
                  $reservedFoodArr = unserialize($reservedFood);
                  // var_dump ($reservedFoodArr);
                  
                  foreach ($reservedFoodArr as $itemCode => $quantity) {
                      $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?;");
                      $stmt->bind_param("i", $itemCode);
                      $stmt->execute();
                      $result = $stmt->get_result();
                      $row = $result->fetch_assoc();
                      $menuName = $row['menuName'];

                ?>
                  <li><?php echo  $menuName; ?></li>
                    
                  <!-- close the loop -->
                  <?php
                    }
                  ?>
                  </ol>
                </div>
                <div class="details">
                  <p id="viewAllDetails" class="view-details" data-bs-toggle="modal" data-bs-target="#view-details-modal<?php echo $reserveID; ?>" name="viewdetails" data-reserveid="<?php echo $reserveID; ?>">view details&nbsp;<i class="bi bi-chevron-right"></i></p>
                </div>


                <!--View Details Modal Start-->
                <div class="modal" id="view-details-modal<?php echo $reserveID; ?>">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Reservation Information</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                              <div class="text-center justify-content-center">
                                  <img src="/images/profile-icon-blue.png" width="120px">
                              </div>
                              <div class="mt-3 d-flex align-items-center flex-column ms-10">
                                  <p><strong>Name: </strong><?php echo $userName; ?><br>
                                  <strong>Phone Number: </strong><?php echo $userPhoneNo; ?><br>
                                  <strong>Email: </strong><?php echo $userEmail; ?></p>
                              </div>
                              <div class="row ms-3 mt-2">
                                  <div class="col justify-content-center">
                                      <div class="fs-4 ms-1" style="display: inline-block;">
                                          <span><i class="bi bi-calendar-fill icon"></i></span>
                                      </div>
                                      <div class="ms-3" style="display: inline-block;">
                                          <p class=""><strong>Date:</strong><br><small><?php echo $reservedDate; ?></small></p>
                                      </div>
                                  </div>
                                  <div class="col justify-content-center">
                                      <div class="fs-4" style="display: inline-block;">
                                          <span><i class="ms-1 bi bi-clock-fill icon"></i></span>
                                      </div>
                                      <div class="ms-3" style="display: inline-block;">
                                          <p class=""><strong>Time:</strong><br><small><?php echo $reservedTime; ?></small></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row ms-3 mt-2">
                                  <div class="col mt-2 justify-content-center">
                                      <div class="" style="display: inline-block;">
                                          <span><i class="icon"><img src="/images/table_admin.png" width="31px"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class="mt-1"><strong>Table No:</strong><small><?php echo $tableNo; ?></small></p>
                                      </div>
                                  </div>
                                  <div class="col justify-content-center">
                                      <div class="fs-2" style="display: inline-block;">
                                          <span><i class="bi bi-person-fill icon"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class=""><strong>No of Pax:</strong><small><?php echo $paxNo; ?></small></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row ms-3 mt-lg-3 mt-md-2 mt-sm-1">
                                  <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center">
                                      <div class="" style="display: inline-block;">
                                          <span><i class="icon"><img src="/images/admin-food-icon.png" width="32px"></i></span>
                                      </div>
                                      <div class="ms-2" style="display: inline-block;">
                                          <p class="strong"><strong>Ordered Food:</strong></p>
                                      </div>
                                      <div class="orderedFood-container rounded justify-content-center me-lg-2 me-md-2 me-sm-0 div-border">
                                          <!-- ordered food -->
                                          
                    
                                                <!-- Display reserved food items -->
                                                <?php
                                                
                                                  foreach ($reservedFoodArr as $itemCode => $quantity) {
                                                      $stmt = $conn->prepare("SELECT * FROM menu WHERE menuID=?;");
                                                      $stmt->bind_param("i", $itemCode);
                                                      $stmt->execute();
                                                      $result = $stmt->get_result();
                                                      $row = $result->fetch_assoc();
                                                      $menuName = $row['menuName'];
                                                      $menuImage = $row['menuImage'];

                                                ?>
                                                  <div class="justify-content-center px-2 mt-2">
                                                      <div class="ms-3" style="display: inline-block;">
                                                          <span><i class="icon"><img src="/images/<?php echo $menuImage; ?>" width="40px"></i></span>
                                                      </div>
                                                      <div class="ms-2 mt-1" style="display: inline-block;">
                                                          <p class="h6 ordered-food"><strong><?php echo $menuName; ?></strong><br><small>x 1</small></p>
                                                      </div>
                                                      <hr class="line-break">
                                                  </div>
                                                  <!-- close the loop -->
                                                  <?php
                                                  }
                                                  ?>
                                          </div>
                                            
                                        </div>
                                  
                                  <div class="col-8 col-sm-8 col-md-6 col-lg-6 justify-content-center mt-2 mt-sm-2 mt-md-0 mt-lg-0">
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
                          </div>
                      </div>
                  </div>
                </div>
            <!--View Details Modal End-->


                <div class="row d-flex justify-content-center ms-5">
                  <button class="button bg-danger text-white" name = "decline" data-reserveid="<?php echo $reserveID; ?>">Decline</button>
                  <button class="button bg-success text-white" value="<?php echo $reserveID; ?>" name = "accept" data-reserveid="<?php echo $reserveID; ?>">Accept</button>
                </div>
              </section>
            </section>
          </div>
          <?php
            } // end while loop
          ?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    <script>
      //arrive button
      $(document).ready(function() {
        $('button[name="arrive"]').on('click', function() {
          var reserveID = $(this).data('reserveid');
          console.log(reserveID);

          $.ajax({
            url: '../../backend/admin/deleteReservation.php',
            method: 'POST',
            data: { reserveID: reserveID },
            success: function(response) {
              // Handle the response from the server
              if (response === 'success') {
                // alert('Item deleted successfully');
                location.reload();
              } else {
                alert('Failed to delete item');
              }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
              alert('An error occurred while deleting the item');
            }
          });
        });
      });


        //cancel button
        $(document).ready(function() {

          $('button[name="cancel"]').on('click', function() {
          var reserveID = $(this).data('reserveid');
          console.log(reserveID);

          $.ajax({
          url: '../../backend/admin/deleteReservation.php',
          method: 'POST',
          data: { reserveID: reserveID },
          success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
              // alert('Item deleted successfully');
              location.reload();
            } else {
              alert('Failed to delete item');
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert('An error occurred while deleting the item');
          }
          });
        });
      });

      //decline button
    $(document).ready(function() {
      $('button[name="decline"]').on('click', function() {
        var reserveID = $(this).data('reserveid');
        console.log(reserveID);

        $.ajax({
          url: '../../backend/admin/deleteReservation.php',
          method: 'POST',
          data: { reserveID: reserveID },
          success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
              // alert('Item deleted successfully');
              location.reload();
            } else {
              alert('Failed to delete item');
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert('An error occurred while deleting the item');
          }
        });
      });
    });

    //Accept button - change status
    $(document).ready(function() {
      $('button[name="accept"]').on('click', function() {
        var reserveID = $(this).data('reserveid');
        console.log(reserveID);

        $.ajax({
          url: '../../backend/admin/manageReservation.php',
          method: 'POST',
          data: { reserveID: reserveID },
          success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
              alert('Reservation approved and moved to the Reservation tab.');
              location.reload();
            } else {
              alert('Failed to approve the reservation.');
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert('An error occurred while approving the reservation.');
          }
        });
      });
    });

    const tableDivs = document.querySelectorAll('.table');
    const borderColors = <?php if(isset($_SESSION['allTableAvailabilityAdmin'])){echo json_encode($_SESSION['allTableAvailabilityAdmin']);}else echo json_encode(["1","0","0","0","0","0","0","0","0","0","0","0","0","0","0"])?>;
    console.log(borderColors);
    tableDivs.forEach((div, index) => {
            if (borderColors[index] === '1') {
                div.classList.add('reserved');
            } else if (borderColors[index] === '-1') {
                div.classList.add('checkedIn');
            }
    });



    

    </script>
    <script src="../../script/adminViewTable.js"></script>

  </body>
</html>