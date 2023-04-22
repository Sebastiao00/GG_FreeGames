// get references to the login form and input fields
const loginForm = document.getElementById('login-form');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

// add a submit event listener to the login form
loginForm.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the default form submission behavior

  const email = emailInput.value;
  const password = passwordInput.value;

  // make an AJAX request to the server to check the user's credentials
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'login.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = () => {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      console.log(response);
      if (response.success) {
        // redirect the user to the index page
        //window.location.href = './pages/index.php';
        window.alert("success");
      } else {
        // display an error message to the console
        const error = response.message;
        console.error(error);
      }
    }
  };
  xhr.send(`ut_email=${email}&ut_pass=${password}`);
});


