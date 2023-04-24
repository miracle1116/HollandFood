const editModal = new bootstrap.Modal("#edit-item-modal");
const addModal = new bootstrap.Modal("#add-item-modal");
const deleteModal = new bootstrap.Modal("#delete-item-modal");
const editBtns = document.querySelectorAll(".editBtn");
const addBtn = document.querySelector(".addBtn");
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

addBtn.addEventListener("click",function(){
    addModal.show();
});