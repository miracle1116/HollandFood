
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmpassword');
const tick = document.getElementById('tick');
const error = document.getElementById('error');

confirmPassword.addEventListener('input', () => {
    
  if (password.value === confirmPassword.value&&confirmPassword.value!="") {
    tick.style.display = 'inline-block';
    error.innerText = '';
  } else if(password.value===""){
    tick.style.display = 'none';
    error.innerText = '';
  }else {
    tick.style.display = 'none';
    error.innerText = 'Error: Inputs do not match';
  }
});

password.addEventListener('input', () => {
    
    if (password.value === confirmPassword.value&&confirmPassword.value!="") {
      tick.style.display = 'inline-block';
      error.innerText = '';
    } else if(confirmPassword.value===""){
      tick.style.display = 'none';
      error.innerText = '';
    }
    else {
      tick.style.display = 'none';
      error.innerText = 'Error: Inputs do not match';
    }
  });


  //change profile pic 
  const editIcon = document.getElementById('edit-icon');
  const profileImage = document.getElementById('profile-image');

  // Add an event listener to the edit icon
  editIcon.addEventListener('click', () => {
    // Create a file input element
    const fileInput = document.createElement('input');
    fileInput.type = 'file';

    // Add an event listener to the file input element
    fileInput.addEventListener('change', () => {
      // Get the selected file from the file input element
      const selectedFile = fileInput.files[0];

      // Create a new FileReader object
      const reader = new FileReader();

      // Add an event listener to the FileReader object
      reader.addEventListener('load', () => {
        // Set the profile image source to the loaded image
        profileImage.src = reader.result;
      });

      // Read the selected file as a data URL
      reader.readAsDataURL(selectedFile);
    });

    // Click the file input element to open the file dialog box
    fileInput.click();
  });

  var modalSubmit = new bootstrap.Modal("#submit-modal");
  var submitButton = document.getElementById('submitBtn');


  submitButton.addEventListener("click", function () {
      console.log(1);
      modalSubmit.show();
  });


  var modalDelete = new bootstrap.Modal("#delete-modal");
  var deleteButton = document.getElementById('deleteBtn');
  deleteButton.addEventListener("click", function () {
      console.log(1);
      modalDelete.show();
  });

  var modalLogout = new bootstrap.Modal("#logout-modal");
  var logoutButton = document.getElementById('logoutBtn');
  logoutButton.addEventListener("click", function () {
      console.log(1);
      modalLogout.show();
  });