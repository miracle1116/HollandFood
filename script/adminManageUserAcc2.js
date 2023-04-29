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

// $(function () {
//   $("tr").on("click", function () {
//     $(this).toggleClass("active");
//   });
// });

// let listToggle = document.querySelector("#sidebarContent");

// sectionTitle.addEventListener("click", function () {
//   listToggle.classList.toggle("sideBar2");
// });
