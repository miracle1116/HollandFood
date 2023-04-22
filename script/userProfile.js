const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirmpassword');
const tick = document.getElementById('tick');
const error = document.getElementById('error');

confirmPassword.addEventListener('input', () => {
    
  if (password.value === confirmPassword.value) {
    tick.style.display = 'inline-block';
    error.innerText = '';
  } else {
    tick.style.display = 'none';
    error.innerText = 'Error: Inputs do not match';
  }
});

password.addEventListener('input', () => {
    
    if (password.value === confirmPassword.value) {
      tick.style.display = 'inline-block';
      error.innerText = '';
    } else {
      tick.style.display = 'none';
      error.innerText = 'Error: Inputs do not match';
    }
  });