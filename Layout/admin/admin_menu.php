<?php
// including the database connection file
include_once("../../config.php");
session_start();
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

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../../styles/admin_style.css" />
  <link rel="stylesheet" href="../../styles/admin_menu.css" />

  <title>Admin Menu</title>
</head>

<body>
  <div class="container-fluid vh-100">
    <div class="row">
      <!-- Sidebar -->
      <div class="sideBar col-2 col-md-2 col-xl-2 px-sm-2 px-0">
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
                  <i class="navIcon fs-4 bi-table text-center"></i>
                  <span class="ms-1 d-none d-sm-inline">Tables</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin_menu.html" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-menu-button-wide text-black text-center"></i>
                  <span class="ms-1 d-none d-sm-inline text-black" style="font-weight: 500;">Menu</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="admin_manageUserAcc.html" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-people text-center"></i>
                  <span class="ms-1 d-none d-sm-inline">Users</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../backend/admin/logout.php" class="nav-link">
                <div class="navList">
                  <i class="navIcon fs-4 bi-box-arrow-left text-center"></i>
                  <span class="ms-1 d-none d-sm-inline">Sign out</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- sidebar end -->

      <!--2nd column, 2 rows-->
      <div class="col-10 col-xl-10 col-lg-10 col-sm-10 col-md-10 py-3">

        <!--Top part of menu, row 1-->
        <div class="menu-category container row">

          <div class="menu-category-container col-9">
            <div class="row justify-content-center d-flex flex-nowrap mt-2">

            
            <!-- DISPLAY MENU CATEGORY -->
            <?php
            // Fetch and display menu category from the database
            $query = "SELECT * FROM menucategory";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
              $menuCategoryID = $row['menuCategoryID'];
              $categoryName = $row['menuCategory'];
              $categoryImage = $row['menuCategoryImage'];

            ?>

            <div class="menu_con col-2 justify-content-center" data-category="<?php echo $categoryName; ?>">
              <div class="container-fluid mt-3 p-1 pb-2">
                <img src="../../images/<?php echo $categoryImage; ?>" id="categoryPhotoPreview"
                  class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" style="height:65px; width: 65px;" />
                <p class="category-name text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">
                  <?php echo $categoryName; ?>
                </p>
                <div class="showMore text-center">
                  <a href="#">
                    <i class="bi bi-caret-right text-black"></i>
                  </a>
                </div>
                <div class="dropdown">
                  <a class="dropdownToggle" href="#" role="button" id="menuCardDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-three-dots-vertical text-black"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuCardDropdown">
                    <li><a class="dropdown-item dropdown-edit" name="editMenuCategory" data-menucategoryid="<?php echo $menuCategoryID; ?>" href="#">Edit</a></li>
                    <li><a class="dropdown-item dropdown-delete" data-menucategoryid="<?php echo $menuCategoryID; ?>" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
            </div>

            <?php
            } // end while loop
            ?>

            </div>
          </div>

          <div class="col-1 align-items-center">
            <i class="addCategoryBtn bi bi-plus-circle-fill" a-toggle="tooltip" data-placement="bottom"
              title="Add category"></i>
          </div>

        </div>





        <!--Menu Item-->
        <div class="menu-item-container row d-flex justify-content-around mt-5 ms-2">
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


          <div class="menu-card  col-2 col-lg-2 col-sm-2 col-md-2 me-4 my-3" data-category="<?php echo $menuCategory; ?>">
            <div class="menu-item container-fluid shadow-lg bg-body">
              <img src="../../images/<?php echo $menuImage; ?>" class="align-items-center w-2 img-fluid rounded mx-auto d-block mb-4 ms-3" />
            </div>
            <div class="border_menu">
              <div class="menu-item-desc container-fluid">
              <div class="item-name fw-bold"><?php echo $menuName; ?></div>
              <div class="ingredient"><?php echo $menuIngredient; ?></div>
              <div class="mt-4 prBtns">
                <div class="price">RM<?php echo $menuPrice; ?></div>
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="deleteBtn bi bi-trash ms-auto" data-menuid="<?php echo $menuID; ?>" viewBox="0 0 16 16">
                  <path
                  d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                  <path
                  d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="editBtn bi bi-pencil-fill ms-2" data-menuid="<?php echo $menuID; ?>" viewBox="0 0 16 16">
                  <path
                  d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg>
                </div>
              </div>
              </div>
            </div>
          </div>

          <?php
          } // end while loop
          ?>


<?php
  $query = "SELECT menuCategory FROM menucategory";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $menuCategories = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $menuCategories[] = $row['menuCategory'];
    }
  }
?>

<!--Edit Menu Item Modal-->
<div class="container mt-5">
  <div class="modal" id="edit-item-modal">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edit Menu Item</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
                <form action="../../backend/admin/manageMenu.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="mb-3">
                      <input type="hidden" name="menuID" id="menuID" />

                        <label for="menu-category" class="form-label required">Menu Category</label>
                        <select name="menuCategory" id="menu-category" class="form-select">
                        <option value="-" selected>-</option>
                        <?php
                          foreach ($menuCategories as $category) {
                            echo '<option value="' . $category . '">' . $category . '</option>';
                          }
                        ?>
                        </select>
                      </div>
                      <div class="mb-3">
                          <label class="form-label required">Name</label>
                          <input type="text" name="itemName" class="form-control item-name">
                      </div>
                      <div class="mb-3">
                          <label class="form-label required">Price(RM)</label>
                          <input type="text" name="itemPrice" class="form-control price">
                      </div>
                      <div class="mb-3">
                        <label for="upload-photo" class="form-label required">Upload Image</label>
                        <input
                        type="file" 
                        id="upload-photo" 
                        name="itemImage"
                        class="form-control image-name"
                        />

                      </div>
                      <div class="mb-3">
                          <label class="form-label required">Ingredient</label>
                          <textarea name="itemIngredient" class="form-control ingredient"></textarea>
                      </div>
                  </div>

                <div class="modal-footer">
                  <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="edititem" class="btn primary-btn">Save changes</button>
                </div>
              </form>
          </div>
      </div>
  </div>
</div>



<!--Edit Menu Category Modal-->
<div class="container mt-5">
<div class="modal" id="edit-category-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
              <form action="../../backend/admin/manageMenu.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">

                <input type="hidden" name="menuCategoryID" id="menuCategoryID" />

                    <div class="mb-3">
                        <label class="form-label required">Menu Category Name</label>
                        <input type="text" name="categoryName" class="form-control category-name">
                    </div>
                    <div class="mb-3">
                      <label for="upload-photo" class="form-label required">Upload Image</label>
                      <input
                      type="file" 
                      id="upload-photo" 
                      name="menuCategoryImage"
                      class="form-control image-name"
                      />
                    </div>
                  </div>

              <div class="modal-footer">
                <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="editcategory" class="btn primary-btn">Save changes</button>
              </div>
            </form>
        </div>
    </div>
</div>
</div>

          

<!--Add Menu Item Modal-->
<div class="container mt-5">
<div class="modal" id="add-item-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Menu Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="../../backend/admin/manageMenu.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="mb-3">
                    <label for="menu-category" class="form-label required">Menu Category</label>
                    <select name="menuCategory" id="menuCategory" class="form-select">
                    <option value="-" selected>-</option>
                      <?php
                        foreach ($menuCategories as $category) {
                          echo '<option value="' . $category . '">' . $category . '</option>';
                        }
                      ?>
                      </select>
                  </div>

                    <div class="mb-3">
                        <label class="form-label required">Name</label>
                        <input type="text" name="itemName" id="itemName" class="form-control addItemName">
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Price(RM)</label>
                        <input type="text" name="itemPrice" id="itemPrice" class="form-control addPrice">
                    </div>
                    <div class="mb-3">
                      <label for="upload-photo" class="form-label required">Upload Image</label>
                      <input
                      type="file" 
                      id="itemImage" 
                      name="itemImage"
                      class="form-control"
                      />
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Ingredient</label>
                        <textarea name="itemIngredient" id="itemIngredient" class="form-control addIngredient"></textarea>
                    </div>
                
              </div>

              <div class="modal-footer">
                <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="additem" class="btn primary-btn">Add</button>
              </div>
            </form>
        </div>
    </div>
</div>
</div>

          <!--Add Menu Category Modal-->
          <div class="container mt-5">
            <div class="modal" id="add-category-modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add Menu Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <form id="add-category-form" action="../../backend/admin/manageMenu.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="mb-3">
                        <label class="form-label required">Menu Category Name</label>
                        <input type="text" name="menuCategory" id="menuCategory" class="categoryName form-control">
                      </div>
                      <div class="mb-3">
                        <label for="upload-photo" class="form-label required">Upload Image</label>
                        <input type="file" name="menuCategoryImage" id="menuCategoryImage" class="form-control"/>
                      </div>
                      
                    </div>

                    <div class="modal-footer">
                      <button type="button" name="close" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="addcategory" class="btn primary-btn">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>



          <!--Delete Menu Item Modal-->
          <div class="modal" id="delete-item-modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete This Item?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>This item will be permanantly deleted.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                  <button type="button" name="deleteitem" class="btn btn-danger" data-menuid="<?php echo $menuID; ?>">Delete</button>
                </div>
              </div>
            </div>
          </div>

          <!--Delete Menu Category Modal-->
          <div class="modal" id="delete-category-modal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete This Menu Category?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>This category will be permanantly deleted.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn secondary-btn" data-bs-dismiss="modal">Close</button>
                  <button type="button" name="deletecategory" class="btn btn-danger" data-menucategoryid="<?php echo $menuCategoryID; ?>">Delete</button>
                </div>
              </div>
            </div>
          </div>




        </div>

        <div>
          <i class="addItemBtn bi bi-plus-circle-fill" a-toggle="tooltip" data-placement="bottom" title="Add Item"></i>
        </div>

      </div>
    </div>

    <?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
          echo "<script>alert('Update failed! Input field cannot be empty.');</script>";
        }
        else if($_GET["error"]=="filetypeerror"){
            echo "<script>alert('Invalid file type. Only PNG, JPG, and JPEG images are allowed.');</script>";
        }
        else if($_GET["error"]=="invalidprice"){
          echo "<script>alert('Invalid Price. Only numeric values can be accepted.');</script>";
        }
      }
    
    ?>

    <!-- Include Bootstrap JavaScript plugin -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
    <script src="../../script/adminMenu.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>

    //Disable ADD CATEGORY button
    $(document).ready(function() {
      $('.addCategoryBtn').on('click', function() {
        $('#add-category-modal').modal('show');
      });

      // Disable "Add" button initially
      $('#add-category-modal .primary-btn').prop('disabled', true);

      // Check input values on change
      $('#menuCategory, #menuCategoryImage').on('change', function() {
          var categoryName = $('#menuCategory').val();
          var categoryImage = $('#menuCategoryImage').val();

          // Enable "Add" button if both inputs are not empty
          if (categoryName.trim() !== '' && categoryImage.trim() !== '') {
              $('#add-category-modal .primary-btn').prop('disabled', false);
          } else {
              $('#add-category-modal .primary-btn').prop('disabled', true);
          }
      });

      

    });


    //Disable ADD ITEM button
    $(document).ready(function() {
      $('.addItemBtn').on('click', function() {
        $('#add-item-modal').modal('show');
      });
        // Disable "Add" button initially
        $('#add-item-modal .primary-btn').prop('disabled', true);

        // Check input values on change
        $('#menuCategory, #itemName, #itemPrice, #itemImage, #itemIngredient').on('change', function() {
          var categoryName = $('#menuCategory').val();
          var itemName = $('#itemName').val();
          var itemPrice = $('#itemPrice').val();
          var itemImage = $('#itemImage').val();
          var itemIngredient = $('#itemIngredient').val();

          // Enable "Add" button if both inputs are not empty
          if (categoryName.trim() !== '-' && itemName.trim() !== '' && itemPrice.trim() !== '' && itemImage.trim() !== '' && itemIngredient.trim() !== '' ) {
              $('#add-item-modal .primary-btn').prop('disabled', false);
          } else {
              $('#add-item-modal .primary-btn').prop('disabled', true);
          }
        });
        $('#add-item-modal').modal('hide');
    });

    //Delete Menu Category
    $(document).ready(function() {
      // Set the menuID
      $('.menu_con .dropdown-delete').on('click', function() {
        var menuCategoryID = $(this).data('menucategoryid');
        // Set the menuID in the delete modal
        $('#delete-category-modal .btn-danger').data('menucategoryid', menuCategoryID);
        // Show the delete confirmation modal
        $('#delete-category-modal').modal('show');
      });

      $('button[name="deletecategory"]').on('click', function() {
        var menuCategoryID = $(this).data('menucategoryid');
        console.log(menuCategoryID);

        $.ajax({
          url: '../../backend/admin/deleteMenu.php',
          method: 'POST',
          data: { menuCategoryID: menuCategoryID },
          success: function(response) {
            // Handle the response from the server
            if (response === 'success') {
              location.reload();
            } else if (response === 'CategoryNotEmpty') {
              alert('Cannot delete category. Category contains items.');
            } else {
              alert('Failed to delete category');
            }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
            alert('An error occurred while deleting the menucategory');
          }
        });
        // Hide the delete confirmation modal
        $('#delete-category-modal').modal('hide');
      });
    });


    //Delete Menu Item
    $(document).ready(function() {
      // Set the menuID
      $('.menu-card .deleteBtn').on('click', function() {
        var menuID = $(this).data('menuid');
        // Set the menuID in the delete modal
        $('#delete-item-modal .btn-danger').data('menuid', menuID);
        // Show the delete confirmation modal
        $('#delete-item-modal').modal('show');
      });

      $('button[name="deleteitem"]').on('click', function() {
        var menuID = $(this).data('menuid');
        console.log(menuID);

        $.ajax({
          url: '../../backend/admin/deleteMenu.php',
          method: 'POST',
          data: { menuID: menuID },
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
        // Hide the delete confirmation modal
        $('#delete-item-modal').modal('hide');
      });
    });
    


    //Edit CATEGORY
    $(document).ready(function() {
      $('.menu_con .dropdown-edit').on('click', function() {
        var menuCategoryID = $(this).data('menucategoryid');
        $('#menuCategoryID').val(menuCategoryID);
        $('#edit-category-modal').modal('show');

        const menuItem = $(this).closest(".menu_con");

        var menuCategory = $.trim(menuItem.find(".category-name").text());
        $("#edit-category-modal .category-name").val(menuCategory);
      });

      $('#edit-category-modal .primary-btn').on('click', function() {
        var menuCategory = $("#edit-category-modal .category-name").val();
      });

    });


    //Edit ITEM 
    $(document).ready(function() {
      $('.menu-card .editBtn').on('click', function() {
        var menuID = $(this).data('menuid');
        console.log(menuID);
        $('#menuID').val(menuID);
        $('#edit-item-modal').modal('show');

        const menuItem = $(this).closest(".menu-card");

        // Fetch and populate data in input fields
        var menuCategory = menuItem.find(".menu-category").text();
        var itemName = menuItem.find(".item-name").text();
        var itemPrice = menuItem.find(".price").text().replace(/RM/, "");
        // var itemImage = menuItem.find(".image-name").attr("src");
        var itemIngredient = menuItem.find(".ingredient").text();

        $("#edit-item-modal #menu-category").val(menuCategory);
        $("#edit-item-modal .item-name").val(itemName);
        $("#edit-item-modal .price").val(itemPrice);
        // $("#edit-item-modal .image-name").val(itemImage);
        $("#edit-item-modal .ingredient").val(itemIngredient);

        // Get the category
        const category = $(menuItem).data('category');
        console.log(category);

        // Get the select element
        const selectElement = $("#edit-item-modal #menu-category");

        // Loop through each option in the select element
        selectElement.find("option").each(function() {
          const option = $(this);
          option.prop("selected", false);
          
          // Check if the option's value matches the category
          if (option.val() == category) {
            // Set the option as selected
            option.prop("selected", true);
            return false; // Exit the loop
          }
        });
      });
       
      $('#edit-item-modal .primary-btn').on('click', function() {
        var menuCategory = $("#edit-item-modal #menu-category").val();
        var itemName = $("#edit-item-modal .item-name").val();
        var itemPrice = $("#edit-item-modal .price").val();
        var itemImage = $("#edit-item-modal .image-name").val();
        var itemIngredient = $("#edit-item-modal .ingredient").val();
      });

    });

</script>

</body>

</html>