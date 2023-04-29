$(document).ready(function () {
  $("#accountTable").DataTable();
});

const editModal = new bootstrap.Modal("#edit-acc-modal");
const deleteModal = new bootstrap.Modal("#delete-acc-modal");
const editBtns = document.querySelectorAll(".editBtn");
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