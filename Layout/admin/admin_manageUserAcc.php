<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap CSS (hosted online)-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../../styles/admin_style.css" />
  <link rel="stylesheet" href="../../styles/admin_manageUserAcc.css" />
  <!--DataTable-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
  <title>Admin Users</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row vh-100">
      <!-- Sidebar -->
      <div class="sideBar col-2 col-md-3 col-xl-2 px-sm-2 px-0">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <div class="mx-auto pt-4 pe-2">
            <img src="../../images/holland_food_icon.png" class="img-fluid" width="120px" />
          </div>
          <a href="/" class="d-flex align-items-center pb-3 mb-0 mx-auto text-white text-decoration-none border-bottom">
            <span class="sidebar-heading fw-bold fs-5 text-center">Holland Food</span>
          </a>

          <ul class="nav nav-pills flex-column mb-sm-auto mx-auto mb-0 align-items-center align-items-sm-start"
            id="menu">
            <li class="nav-item">
              <a href="admin_viewTable.html" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-table"></i>
                  <span class="ms-1 d-none d-sm-inline">Tables</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin_menu.php" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-menu-button-wide"></i>
                  <span class="ms-1 d-none d-sm-inline">Menu</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin_manageUserAcc.php" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-people text-black"></i>
                  <span class="ms-1 d-none d-sm-inline text-black" style="font-weight: 500;">Users</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin_login.html" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-box-arrow-left"></i>
                  <span class="ms-1 d-none d-sm-inline">Sign out</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- sidebar end -->

      <!--dataTable-->

      <?php
      $host = "localhost";
      $database = "holland-food";
      $user = "root";
      $pass = "";

      $conn = mysqli_connect($host, $user, $pass, $database);

      $sql = "SELECT * FROM users";

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }



      ?>

      <div class="table-container col-10 py-3">
        <div class="row table-responsive-sm">
          <table id="accountTable" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">User id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Gender</th>
                <th scope="col">Operation</th>
              </tr>
            </thead>


            <tbody>
              <tr class="userInfo">
                <!-- <td>
                  <img src="../../images/profilePic.png" width="50px" />
                </td> -->
                <?php

                if ($result = $conn->query($sql)) {
                  while ($row = $result->fetch_assoc()) {
                    $profilepic = $row["userProfilePic"];
                    $userID = $row["userID"];
                    $firstName = $row["userFirstName"];
                    $lastName = $row["userLastName"];
                    $email = $row["userEmail"];
                    $contactNo = $row["userContactNo"];
                    $birthDate = $row["userBirthDate"];
                    $gender = $row["userGender"];

                    echo '<tr> 
                <td> <img src = "../../images/'.$profilepic .'"width="50px" /> 
                <td>' . $userID . '</td> 
                <td>' . $firstName . '</td> 
                <td>' . $lastName . '</td> 
                <td>' . $email . '</td> 
                <td>' . $contactNo . '</td> 
                <td>' . $birthDate . '</td> 
                <td>' . $gender . '</td> 
                <td>
                <i class="editBtn fs-4 bi-pencil-square" width="20px"></i>&nbsp; <i
                  class="deleteBtn fs-4 bi-trash"></i>
              </td>';
                  }
                  $result->free();
                }

                ?>
              </tr>
            </tbody>

            <!-- <tr class="userInfo">
                  <td>
                    <img src="../../images/profilePic.png" width="50px" />
                  </td>
                  <td>002</td>
                  <td class="firstname">Chia</td>
                  <td class="lastname">Wen Wei</td>
                  <td class="date">2001-01-25</td>
                  <td class="gender">Female</td>
                  <td class="contactnumber">011-11111111</td>
                  <td class="email">Chia@gmail.com</td>
                  <td class="joindate">2023-05-01</td>
                  <td class="activedate">2023-05-05</td>
                  <td>
                    <i class="editBtn fs-4 bi-pencil-square" width="20px"></i
                    >&nbsp; <i class="deleteBtn fs-4 bi-trash"></i>
                  </td>
                </tr>
                <tr class="userInfo">
                  <td>
                    <img src="../../images/profilePic.png" width="50px" />
                  </td>
                  <td>003</td>
                  <td class="firstname">Tang</td>
                  <td class="lastname">Regina</td>
                  <td class="date">2004-04-25</td>
                  <td class="gender">Female</td>
                  <td class="contactnumber">011-11111111</td>
                  <td class="email">Regina@gmail.com</td>
                  <td class="joindate">2020-11-23</td>
                  <td class="activedate">2022-01-25</td>
                  <td>
                    <i class="editBtn fs-4 bi-pencil-square" width="20px"></i
                    >&nbsp; <i class="deleteBtn fs-4 bi-trash"></i>
                  </td>
                </tr>
                <tr class="userInfo">
                  <td>
                    <img src="../../images/profilePic.png" width="50px" />
                  </td>
                  <td>004</td>
                  <td class="firstname">Chia</td>
                  <td class="lastname">Jaslene</td>
                  <td class="date">2005-07-01</td>
                  <td class="gender">Female</td>
                  <td class="contactnumber">011-11111111</td>
                  <td class="email">Jas@gmail.com</td>
                  <td class="joindate">2023-02-17</td>
                  <td class="activedate">2023-04-18</td>
                  <td>
                    <i class="editBtn fs-4 bi-pencil-square" width="20px"></i
                    >&nbsp; <i class="deleteBtn fs-4 bi-trash"></i>
                  </td>
                </tr>
                <tr class="userInfo">
                  <td>
                    <img src="../../images/profilePic.png" width="50px" />
                  </td>
                  <td>005</td>
                  <td class="firstname">Ong</td>
                  <td class="lastname">Shu Ying</td>
                  <td class="date">2008-11-07</td>
                  <td class="gender">Female</td>
                  <td class="contactnumber">011-11111111</td>
                  <td class="email">Ong@gmail.com</td>
                  <td class="joindate">2022-01-28</td>
                  <td class="activedate">2022-01-28</td>
                  <td>
                    <i class="editBtn fs-4 bi-pencil-square" width="20px"></i
                    >&nbsp; <i class="deleteBtn fs-4 bi-trash"></i>
                  </td>
                </tr> -->

          </table>
        </div>
      </div>
      <!--dataTable End-->

      <?php


      ?>

      <!--Edit User Acc Modal-->
      <div class="container mt-5">
        <div class="modal" id="edit-acc-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit User Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">
                <form class="form">
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12 mb-3">
                      <label class="form-label text-black" for="firstname">First Name</label>
                      <input type="text" class="form-control input" id="firstname"
                        value="<?php echo $result['userFirstName'] ?>" />
                    </div>

                    <div class="form-group col-lg-6 col-sm-12 mb-3">
                      <label class="form-label text-black" for="lastname">Last Name</label>
                      <input type="text" class="form-control input" id="lastname" placeholder="Wick" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-6 col-sm-12 mb-3">
                      <label class="form-label text-black" for="date">Birth Date</label>
                      <div class="input-group">
                        <input type="date" class="form-control input" id="date" aria-describedby="emailHelp"
                          placeholder="Enter email" />
                      </div>
                    </div>

                    <div class="form-group col-lg-6 col-sm-12 mb-3">
                      <label class="form-label text-black" for="gender">Gender</label>
                      <select id="gender" class="form-control form-select input">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                    `
                  </div>
                  <div class="row">
                    <div class="form-group mb-3">
                      <label class="form-label required text-black" for="contactnumber">Contact Number</label>
                      <input type="text" class="form-control input" id="contactnumber" placeholder="0123456789" />
                    </div>

                    <div class="form-group mb-3">
                      <label class="form-label required text-black" for="email">Email</label>
                      <input type="email" class="form-control input" id="email" placeholder="example@gmail.com" />
                    </div>
                  </div>
                </form>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="button" class="btn primary-btn">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Delete User Acc Modal-->
      <div class="modal" id="delete-acc-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete This Account?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>This account will be permanantly deleted.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">
                Close
              </button>
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JavaScript plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <!--dataTable-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="../../script/adminManageUserAcc.js"></script>
</body>

</html>