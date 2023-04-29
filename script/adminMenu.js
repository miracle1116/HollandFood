const editModal = new bootstrap.Modal("#edit-item-modal");
const addModal = new bootstrap.Modal("#add-item-modal");
const deleteModal = new bootstrap.Modal("#delete-item-modal");
const editBtns = document.querySelectorAll(".editBtn");
const addItemBtn = document.querySelector(".addItemBtn");
const deleteBtns = document.querySelectorAll(".deleteBtn");

editBtns.forEach((editBtn) => {
  editBtn.addEventListener("click", function () {
    editModal.show();
  });
});

deleteBtns.forEach((deleteBtn) => {
  deleteBtn.addEventListener("click", function () {
    deleteModal.show();
  });
});

addItemBtn.addEventListener("click", function () {
  addModal.show();
});

const editCategoryModal = new bootstrap.Modal("#edit-category-modal");
const addCategoryModal = new bootstrap.Modal("#add-category-modal");
const deleteCategoryModal = new bootstrap.Modal("#delete-category-modal");
const editDropDowns = document.querySelectorAll(".dropdown-edit");
const addCategoryBtn = document.querySelector(".addCategoryBtn");
const deleteDropDowns = document.querySelectorAll(".dropdown-delete");

editDropDowns.forEach((editDropDown) => {
  editDropDown.addEventListener("click", function () {
    editCategoryModal.show();
  });
});

deleteDropDowns.forEach((deleteDropDown) => {
  deleteDropDown.addEventListener("click", function () {
    deleteCategoryModal.show();
  });
});

//ADD CATEGORY
addCategoryBtn.addEventListener("click", function () {
  addCategoryModal.show();
});
// when the "Add" button in the modal is clicked
const addBtn = document.querySelector("#add-category-modal .primary-btn");
addBtn.addEventListener("click", function () {
  // get the menu item name and image source
  var name = document.querySelector(".categoryName").value;
  var imageSrc = document
    .querySelector("#categoryPhotoPreview")
    .getAttribute("src");

  // create a new menu cart item and add it to the cart
  var menuItem =
    // '<div class="menu-category container row" style="justify-content: center; align-items: center;">' +
    // '<div class="menu-category-container col-9" style=" display: flex; overflow-x: auto;">' +
    // '<div class="row justify-content-center d-flex flex-nowrap mt-2">' +
    '<div class="menu_con col-2 justify-content-center">' +
    '<div class="container-fluid mt-3 p-1 pb-2">' +
    '<img src="' +
    imageSrc +
    '" class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" style="width: 65px;" ' +
    "/>" +
    '<p class="text-center fs-6 border-bottom border-3 fw-bold mb-4 pb-4">' +
    name +
    "</p>" +
    '<div class="showMore text-center">' +
    '<a href="#">' +
    '<i class="bi bi-caret-right text-black"></i>' +
    "</a>" +
    "</div>" +
    '<div class="dropdown"><a class="dropdownToggle" href="#" role="button" id="menuCardDropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical text-black"></i> </a>' +
    '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuCardDropdown">' +
    '<li><a class="dropdown-item dropdown-edit" href="#"> Edit </a></li>' +
    '<li><a class="dropdown-item dropdown-delete" href="#">Delete</a>' +
    "</li></ul></div></div></div>";

  // add the new menu cart item to the cart
  document
    .querySelector(".menu-category-container")
    .insertAdjacentHTML("beforeend", menuItem);

  // hide the modal
  addCategoryModal.hide();

  // update the image preview when a file is selected
  const categoryPhotoInput = document.querySelector("#categoryPhotoInput");
  categoryPhotoInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      document
        .querySelector("#categoryPhotoPreview")
        .setAttribute("src", reader.result);
    });
    reader.readAsDataURL(file);
  });
});

// const menuItems = document.querySelectorAll("category_card");
// const categoryButtons = document.querySelectorAll(".menu");

// categoryButtons.forEach((item) => {
//   item.addEventListener("click", () => {
//     const category = item.dataset.category;

//     menuItems.forEach((item) => {
//       if (category === "all") {
//         item.style.display = "block";
//       } else if (item.dataset.category === category) {
//         item.style.display = "block";
//       } else {
//         item.style.display = "none";
//       }
//     });
//   });
// });

// $(document).ready(function () {
//   $(".addCategoryBtn").click(function () {
//     // get the menu item name and image source
//     var name = $(this).find(".categoryName").text().trim();
//     var imageSrc = $(this).find(".categoryPhoto").attr("src");
//     console.log(imageSrc);

//     // create a new menu cart item and add it to the cart
//     var menuItem =
//       '<div class="menu col-2">' +
//       '<div class="container-fluid mt-3 p-1">' +
//       '<img src="' +
//       imageSrc +
//       '" class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4"' +
//       "/>" +
//       '<p class="text-center fs-4 border-bottom border-3 fw-bold mb-4 pb-4">' +
//       name +
//       "</p>" +
//       '<div class="showMore"><a href="#"><i class="bi bi-caret-right text-black"></i></a></div>' +
//       '<div class="dropdown"><a class="dropdownToggle" href="#" role="button" id="menuCardDropdown" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-three-dots-vertical text-black"></i> </a>' +
//       '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuCardDropdown">' +
//       '<li><a class="dropdown-item dropdown-edit" href="#"> Edit </a></li>' +
//       '<li><a class="dropdown-item dropdown-delete" href="#">Delete</a>' +
//       "</li></ul></div></div></div>";

//     // add the new menu cart item to the cart
//     $(".menu-category-container").append(menuItem);

//     $(document).on("click", "#add-category-modal .btn-close", function () {
//       // add the new menu cart item to the cart
//       $(".menu-category-container").add(menuItem);
//     });
//   });
// });
