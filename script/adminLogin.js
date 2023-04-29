// to validate the input not empty
function validateForm(event) {
  event.preventDefault(); // prevent the form from submitting

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const error = document.getElementById('error');

  if (email === "" ) {
    error.innerText = 'Email is required field';

  }else if (password===""){
    error.innerText = 'Password is required field';
  } else {
    window.location.href = "../admin/admin_viewTable.html";
  }
}
