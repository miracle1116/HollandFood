const editModal = new bootstrap.Modal("#edit-item-modal");
const addModal = new bootstrap.Modal("#add-item-modal");
const deleteModal = new bootstrap.Modal("#delete-item-modal");
const editBtns = document.querySelectorAll(".editBtn");
const addItemBtn = document.querySelector(".addItemBtn");
const deleteBtns = document.querySelectorAll(".deleteBtn");

editBtns.forEach(editBtn => {
    editBtn.addEventListener("click",function(){
        editModal.show();
    });
});

deleteBtns.forEach(deleteBtn => {
    deleteBtn.addEventListener("click",function(){
        deleteModal.show();
    });
});

addItemBtn.addEventListener("click",function(){
    addModal.show();
});


const editCategoryModal = new bootstrap.Modal("#edit-category-modal");
const addCategoryModal = new bootstrap.Modal("#add-category-modal");
const deleteCategoryModal = new bootstrap.Modal("#delete-category-modal");
const editDropDowns = document.querySelectorAll(".dropdown-edit");
const addCategoryBtn = document.querySelector(".addCategoryBtn");
const deleteDropDowns = document.querySelectorAll(".dropdown-delete");

editDropDowns.forEach(editDropDown => {
    editDropDown.addEventListener("click",function(){
        editCategoryModal.show();
    });
});

deleteDropDowns.forEach(deleteDropDown => {
    deleteDropDown.addEventListener("click",function(){
        deleteCategoryModal.show();
    });
});

addCategoryBtn.addEventListener("click",function(){
    addCategoryModal.show();
});

// menu category filter
const menuItems = document.querySelectorAll('.menu-card');
const categoryButtons = document.querySelectorAll('.menu_con');

categoryButtons.forEach(item => {
item.addEventListener('click', () => {
    const category = item.dataset.category;

    menuItems.forEach(item => {
    if (category === 'all') {
    item.style.display = 'block';
    } else if (item.dataset.category === category) {
    item.style.display = 'block';
    } else {
    item.style.display = 'none';
    }
    });
});
});