
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

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
    window.location.href = "/index.html";
  }
}


// to validate the input not empty
function validateSignUpForm(event) {
  event.preventDefault(); // prevent the form from submitting

  const username = document.getElementById("username").value;
  const email = document.getElementById("email-signup").value;
  const password = document.getElementById("password-signup").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const error = document.getElementById('error-signup');

  if (email ==="" ||username===""||password===""||confirmPassword==="") {
    error.innerText = 'All field are required';
  }else {
    if(password!=confirmPassword){
      error.innerText = 'Password not same';
    }else{
      container.classList.remove("sign-up-mode");
    }
  }
}




