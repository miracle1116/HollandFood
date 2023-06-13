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

<body></body>

<!-- Edit User Acc Modal -->
<div class="container mt-5">
    <div class="modal" id="edit-acc-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="userID" id="userID" />
                    <form class="form">
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12 mb-3">
                                <label class="form-label text-black" for="firstname">First Name</label>
                                <input type="text" class="first-name form-control input" id="firstname" />
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
                                <input type="text" class="form-control input" id="contactnumber"
                                    placeholder="0123456789" />
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label required text-black" for="email">Email</label>
                                <input type="email" class="form-control input" id="email"
                                    placeholder="example@gmail.com" />
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
</body>

</html>