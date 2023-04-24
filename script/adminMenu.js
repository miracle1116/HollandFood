const editModal = new bootstrap.Modal("#edit-item-modal");
const addModal = new bootstrap.Modal("#add-item-modal");
const deleteModal = new bootstrap.Modal("#delete-item-modal");
const editBtn = document.querySelector(".editBtn");
const addBtn = document.querySelector(".addBtn");
const deleteBtn = document.querySelector(".deleteBtn");

editBtn.addEventListener("click",function(){
    editModal.show();
});

addBtn.addEventListener("click",function(){
    addModal.show();
});

deleteBtn.addEventListener("click",function(){
    deleteModal.show();
});