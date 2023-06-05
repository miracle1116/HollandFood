
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