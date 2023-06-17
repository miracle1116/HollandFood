<?php
// including the database connection file
include_once("../../config.php");
session_start();
if(isset($_SESSION['adminEmail'])){

?>

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
    <link rel="shortcut icon" type="image/png" href="../../images/holland_food_icon.png">
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
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-0 mx-auto text-white text-decoration-none border-bottom">
                        <span class="sidebar-heading fw-bold fs-5 text-center">Holland Food</span>
                    </a>

                    <ul class="nav nav-pills flex-column mb-sm-auto mx-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="admin_viewTable.php" class="nav-link">
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
                                    <span class="ms-1 d-none d-sm-inline text-black"
                                        style="font-weight: 500;">Users</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_login.php" class="nav-link">
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
                            <?php
                                $sql = "SELECT * FROM users";
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
                            ?>
                            <tr class="userInfo">
                                <td>
                                <img src="<?php echo $profilepic; ?>" class="rounded-circle" width="50px" height='50px'/>
                                </td>
                                <td><?php echo $userID; ?></td>
                                <td class="firstname"><?php echo $firstName; ?></td>
                                <td class="lastname"><?php echo $lastName; ?></td>
                                <td class="email"><?php echo $email; ?></td>
                                <td class="contactnumber"><?php echo $contactNo; ?></td>
                                <td class="date"><?php echo $birthDate; ?></td>
                                <td class="gender"><?php echo $gender; ?></td>
                                <td>
                                    <i class="editBtn fs-4 bi-pencil-square" width="20px" data-userid="<?php echo $userID; ?>"></i>&nbsp; <i
                                        class="deleteBtn fs-4 bi-trash" data-userid="<?php echo $userID; ?>"></i>
                                </td>
                            </tr>

                                    <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!--dataTable End-->

            <!--Edit User Acc Modal-->
            <div class="container mt-5">
                <div class="modal" id="edit-acc-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit User Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="../../backend/admin/manageUserAcc.php" method="POST">
                                <div class="modal-body">

                                    <input type="hidden" name="userID" id="userID" />

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-sm-12 mb-3">
                                            <label class="form-label text-black" for="firstname">First Name</label>
                                            <input type="text" name="first-name" class="form-control input"
                                                id="firstname" placeholder="John" />
                                        </div>

                                        <div class="form-group col-lg-6 col-sm-12 mb-3">
                                            <label class="form-label text-black" for="lastname">Last Name</label>
                                            <input type="text" name="last-name" class="form-control input" id="lastname"
                                                placeholder="Wick" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12 mb-3">
                                            <label class="form-label text-black" for="date">Birth Date</label>
                                            <div class="input-group">
                                                <input type="date" name="birth-date" class="form-control input"
                                                    id="date" aria-describedby="emailHelp" placeholder="Enter email" />
                                            </div>
                                        </div>

                                        <div class="form-group col-lg-6 col-sm-12 mb-3">
                                            <label class="form-label text-black" for="gender">Gender</label>
                                            <select id="gender" name="gender" class="form-control form-select input">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        `
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-3">
                                            <label class="form-label required text-black" for="contactnumber">Contact
                                                Number</label>
                                            <input type="text" name="contact-number" class="form-control input"
                                                id="contactnumber" placeholder="0123456789" />
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label required text-black" for="email">Email</label>
                                            <input type="email" name="email" class="form-control input" id="email"
                                                placeholder="example@gmail.com" />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" name="updateUser" class="btn primary-btn">
                                        Save changes
                                    </button>
                                </div>
                            </form>
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
                            <button type="button" name="deleteUser" data-userid="<?php echo $userID; ?>"
                                class="btn btn-danger">Delete</button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../script/adminManageUserAcc.js"></script>
    <script>

        //Edit USER ACC
        $(document).ready(function () {
            $('.editBtn').on('click', function () {
                var userID = $(this).data('userid');
                $('#userID').val(userID);
                $('#edit-acc-modal').modal('show');

                const userAccount = $(this).closest(".userInfo");

                const first_name = $("#edit-acc-modal #firstname");
                first_name.val(userAccount.find(".firstname").text());

                const last_name = $("#edit-acc-modal #lastname");
                last_name.val(userAccount.find(".lastname").text());

                const date = $("#edit-acc-modal #date");
                date.val(userAccount.find(".date").text());

                const gender = $("#edit-acc-modal #gender");
                gender.val(userAccount.find(".gender").text());

                const contactnumber = $("#edit-acc-modal #contactnumber");
                contactnumber.val(userAccount.find(".contactnumber").text());

                const email = $("#edit-acc-modal #email");
                email.val(userAccount.find(".email").text());

            });
        });


        //Delete USER ACCOUNT
        $(document).ready(function () {
            $('.deleteBtn').on('click', function () {
                var userID = $(this).data('userid');
                $('#delete-acc-modal .btn-danger').data('userid', userID);
                $('#delete-acc-modal').modal('show');
            });
            $('button[name="deleteUser"]').on('click', function () {
                var userID = $(this).data('userid');
                console.log(userID);

                $.ajax({
                    url: '../../backend/admin/deleteUser.php',
                    method: 'POST',
                    data: { userID: userID },

                    success: function (response) {
                        console.log(response);
                        if (response == "success") {
                            // Refresh or update the user list after successful deletion
                            $('#delete-acc-modal').modal('hide');
                            location.reload();
                        }
                        else {
                            // Display an error message
                            alert("Error deleting user account.");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);

                    },

                });


            });

        });



    </script>
</body>

</html>
<?php
}else{
    header("location: ../../Layout/admin/admin_login.php?error=unauthorizedaccess");
    exit();
  }
  ?>