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

  // when the "Add" button in the modal is clicked
  const addBtn = document.querySelector("#add-item-modal .primary-btn");
  addBtn.addEventListener("click", function () {
    // get the menu item name and image source
    // var itemCategory = document.querySelector("#add-item-modal #menu-category").value;
    var itemName = document.querySelector(".itemName").value;
    var itemPrice = document.querySelector(".item-price").value;
    var imageInput = document.querySelector("#categoryPhotoInput").getAttribute("src");
    var itemIngredient = document.querySelector(".item-ingredient").value;
   
    // create a new menu item card
    var menuItem =
    '<div class="menu-item-container row d-flex justify-content-around mt-5 ms-2">'+
    '<div class="menu-card col-2 col-lg-2 col-sm-2 col-md-2 me-4 my-3" data-category="pizza">'+
      '<div class="menu-item container-fluid shadow-lg bg-body">'+
        '<img src="'+imageInput+'" class="menu-item rounded-circle shadow-lg bg-body" />'+
      '</div>'+
      '<div class="border_menu">'+
        '<div class="menu-item-desc container-fluid">'+
          '<div class="item-name fw-bold">'+itemName+'</div>'+
          '<div class="ingredient">'+itemIngredient+'</div>'+
          '<div class="mt-4 prBtns">'+
            '<div class="price"> RM'+itemPrice+'</div>'+
            '<div>'+
              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="deleteBtn bi bi-trash ms-auto" viewBox="0 0 16 16">'+
                '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>'+
                '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>'+
              '</svg>'+
              '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="editBtn bi bi-pencil-fill ms-2" viewBox="0 0 16 16">'+
              '<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>'+
              '</svg>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '</div>'+
    '</div>';
      

    // add the new menu item card to the end of the container
    document.querySelector(".menu-item-container").insertAdjacentHTML("beforeend", menuItem);

    // hide the modal
    addModal.hide();
    
  });
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

  // when the "Add" button in the modal is clicked
  const addBtn = document.querySelector("#add-category-modal .primary-btn");
  addBtn.addEventListener("click", function () {
    // get the menu item name and image source
    var name = document.querySelector(".categoryName").value;
    var imageInput = document.querySelector("#categoryPhotoInput").getAttribute("src");

    // update the image preview when a file is selected (NO FUNCTION)
    // const categoryPhotoInput = document.querySelector("#categoryPhotoInput");
    // const file = categoryPhotoInput.files[0];
    // if(file){
    //   const reader = new FileReader();
    //   reader.addEventListener("load", function () {
    //     categoryPhotoInput.setAttribute("src", reader.result);
    //   });
    //   reader.readAsDataURL(file);
    // }

    // create a new menu category card
    var menuCategory =
    '<div class="menu_con col-2 justify-content-center">' +
    '<div class="container-fluid mt-3 p-1 pb-2">' +
    '<img src="' +
    imageInput +
    '" class="align-items-center w-3 img-fluid rounded mx-auto d-block mb-4" style="height:65px; width: 65px;" ' +
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

    // add the new menu category card to the end of the container
    document.querySelector(".menu-category-container").insertAdjacentHTML("beforeend", menuCategory);

    // hide the modal
    addCategoryModal.hide();

  });
  
});



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
