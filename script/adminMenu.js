const editModal = new bootstrap.Modal("#edit-item-modal");
const addModal = new bootstrap.Modal("#add-item-modal");
const deleteModal = new bootstrap.Modal("#delete-item-modal");
const editBtns = document.querySelectorAll(".editBtn");
const addItemBtn = document.querySelector(".addItemBtn");
const deleteBtns = document.querySelectorAll(".deleteBtn");

editBtns.forEach((editBtn) => {
  editBtn.addEventListener("click", function () {
    const menuItem = editBtn.closest(".menu-card");

    const name = document.querySelector("#edit-item-modal .item-name");
    name.value = menuItem.querySelector(".item-name").textContent;

    const price = document.querySelector("#edit-item-modal .price");
    price.value = menuItem
      .querySelector(".price")
      .textContent.replace(/RM/, "")
      .trim();

    const ingredient = document.querySelector("#edit-item-modal .ingredient");
    ingredient.value = menuItem.querySelector(".ingredient").textContent;

    // Get the category
    const category = menuItem.dataset.category;
    console.log(category);
    // Get the select element
    const selectElement = document.querySelector(
      "#edit-item-modal #menu-category"
    );
    // Loop through each option in the select element
    for (let i = 0; i < selectElement.options.length; i++) {
      const option = selectElement.options[i];
      option.selected = false;
      // Check if the option's value matches the category
      if (option.value == category) {
        // Set the option as selected
        option.selected = true;
        break;
      }
    }

    editModal.show();

    // Get the image source from the menuItem and set it in the modal
    const imageInput = document.querySelector("#edit-item-modal .image-name");
    const menuItemImg = menuItem.querySelector("img");
    console.log(imageInput);

    // Get the saveChanges button inside the modal
    const saveBtn = document.querySelector("#edit-item-modal .primary-btn");

    saveBtn.addEventListener("click", () => {
      //FOR UPLOAD IMAGES
      //problem here kot:( but nvm la
      //Get the selected file from the image input element
      const selectedFile = imageInput.files[0];
      console.log(selectedFile);

      if (selectedFile) {
        // Create a new FileReader object
        const reader = new FileReader();
        // Add an event listener to the FileReader object
        reader.addEventListener("load", () => {
          // Set the image source in the menu item
          menuItemImg.src = reader.result;
        });
        // Read the selected file as a data URL
        reader.readAsDataURL(selectedFile);
      }

      menuItem.querySelector(".item-name").textContent = name.value;
      menuItem.querySelector(".ingredient").textContent = ingredient.value;
      menuItem.querySelector(".price").textContent = "RM" + price.value;

      // Hide the edit category modal
      editModal.hide();
    });
  });
});

deleteBtns.forEach((deleteBtn) => {
  deleteBtn.addEventListener("click", function () {
    // Get a reference to the menu item to be deleted
    const menuItem = deleteBtn.closest(".menu-card");
    deleteModal.show();

    // Get the delete button inside the modal
    const deleteItemModalBtn = document.querySelector(
      "#delete-item-modal .btn-danger"
    );

    // Add a click event listener to the delete button inside the modal
    deleteItemModalBtn.addEventListener("click", () => {
      // Delete the menu item
      console.log("Deleting menu item...");
      menuItem.remove();
      // Hide the delete item modal
      deleteModal.hide();
    });
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
    const menuItem = editDropDown.closest(".menu_con");

    // Get the category name from the menuItem and set it in the modal
    const name = document.querySelector("#edit-category-modal .category-name");
    name.value = menuItem.querySelector(".category-name").textContent.trim();

    // Get the image source from the menuItem and set it in the modal
    const imageInput = document.querySelector(
      "#edit-category-modal .image-name"
    );
    const menuItemImg = menuItem.querySelector("img");

    console.log(menuItemImg.src);
    console.log(imageInput);

    editCategoryModal.show();

    // Get the saveChanges button inside the modal
    const saveBtn = document.querySelector("#edit-category-modal .primary-btn");

    saveBtn.addEventListener("click", () => {
      //FOR UPLOAD IMAGES
      //problem here kot:( but nvm la
      //Get the selected file from the image input element
      const selectedFile = imageInput.files[0];
      console.log(selectedFile);

      if (selectedFile) {
        // Create a new FileReader object
        const reader = new FileReader();
        // Add an event listener to the FileReader object
        reader.addEventListener("load", () => {
          // Set the image source in the menu item
          menuItemImg.src = reader.result;
        });
        // Read the selected file as a data URL
        reader.readAsDataURL(selectedFile);
      }

      menuItem.querySelector(".category-name").textContent = name.value;

      // Hide the edit category modal
      editCategoryModal.hide();
    });
  });
});

deleteDropDowns.forEach((deleteDropDown) => {
  deleteDropDown.addEventListener("click", function () {
    // Get a reference to the menu category to be deleted
    const menuCategory = deleteDropDown.closest(".menu_con");
    deleteCategoryModal.show();

    // Get the delete button inside the modal
    const deleteCategoryModalBtn = document.querySelector(
      "#delete-category-modal .btn-danger"
    );

    // Add a click event listener to the delete button inside the modal
    deleteCategoryModalBtn.addEventListener("click", () => {
      // Delete the menu item
      console.log("Deleting menu category...");
      menuCategory.remove();
      // Hide the delete item modal
      deleteCategoryModal.hide();
    });
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

// menu category filter
const menuItems = document.querySelectorAll(".menu-card");
const categoryButtons = document.querySelectorAll(".menu_con");

categoryButtons.forEach((item) => {
  item.addEventListener("click", () => {
    const category = item.dataset.category;

    menuItems.forEach((item) => {
      if (category === "all") {
        item.style.display = "block";
      } else if (item.dataset.category === category) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  });
});
