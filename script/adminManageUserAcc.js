$(document).ready(function () {
  $("#accountTable").DataTable();
});

const editUserAccountModal = new bootstrap.Modal("#edit-acc-modal");
const deleteAccountUserModal = new bootstrap.Modal("#delete-acc-modal");
const editBtns = document.querySelectorAll(".editBtn");
const deleteBtns = document.querySelectorAll(".deleteBtn");

// //EDIT BTN
// editBtns.forEach((editBtn) => {
//   editBtn.addEventListener("click", function () {
//     //selects the closest ancestor element with the class "userInfo"
//     //then assign it to 'userAccount'
//     const userAccount = editBtn.closest(".userInfo");

//     //get the firstname variable from the edit modal (empty)
//     const first_name = document.querySelector("#edit-acc-modal #firstname");
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     first_name.value = userAccount.querySelector(".firstname").textContent;

//     //get the lastname variable from the edit modal (empty)
//     const last_name = document.querySelector("#edit-acc-modal #lastname");
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     last_name.value = userAccount.querySelector(".lastname").textContent;

//     //get the date variable from the edit modal (empty)
//     const date = document.querySelector("#edit-acc-modal #date");
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     date.value = userAccount.querySelector(".date").textContent;

//     //get the gender variable from the edit modal (empty)
//     const gender = document.querySelector("#edit-acc-modal #gender");
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     gender.value = userAccount.querySelector(".gender").textContent;

//     //get the contact number variable from the edit modal (empty)
//     const contactnumber = document.querySelector(
//       "#edit-acc-modal #contactnumber"
//     );
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     contactnumber.value =
//       userAccount.querySelector(".contactnumber").textContent;

//     //get the email variable from the edit modal (empty)
//     const email = document.querySelector("#edit-acc-modal #email");
//     //select the text content of old data and put it in the variable of edit modal (info get /)
//     email.value = userAccount.querySelector(".email").textContent;

//     editUserAccountModal.show();


    const saveBtn = document.querySelector("#edit-acc-modal .primary-btn");

    saveBtn.addEventListener("click", () => {
      //change the data from the user account page to the data editted in modal
      userAccount.querySelector(".firstname").textContent = first_name.value;
      userAccount.querySelector(".lastname").textContent = last_name.value;
      userAccount.querySelector(".date").textContent = date.value;
      userAccount.querySelector(".gender").textContent = gender.value;
      userAccount.querySelector(".contactnumber").textContent =
        contactnumber.value;
      userAccount.querySelector(".email").textContent = email.value;

      //Hide the edit user account modal
      editUserAccountModal.hide();
    });
  });
});

//DELETE BTN
deleteBtns.forEach((deleteBtn) => {
  deleteBtn.addEventListener("click", function () {
    //Get a reference to the user account to be deleted
    const userAccount = deleteBtn.closest(".userInfo");
    //show the user account delete modal
    deleteAccountUserModal.show();

    //Get the delete button inside the user account modal
    const deleteUserAccountModalBtn = document.querySelector(
      "#delete-acc-modal .btn-danger"
    );

    //Add a click event listener to the delete button inside the modal
    deleteUserAccountModalBtn.addEventListener("click", () => {
      // Delete the user account
      console.log("Deleting menu category...");
      userAccount.remove();
      //Hide the deleted user account modal
      deleteAccountUserModal.hide();
    });
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
