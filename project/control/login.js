// get references to the login form and input fields
const loginForm = document.getElementById('loginform');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

if (loginForm != null) {
  // add a submit event listener to the login form
  loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // prevent the default form submission behavior

    const email = emailInput.value;
    const password = passwordInput.value;
    const contentType ='';

    try {
      // make an AJAX request to the server to check the user's credentials
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'login.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          contentType == xhr.getResponseHeader('Content-Type');
          if (contentType.includes('application/json')) {
            const response = JSON.parse(xhr.responseText);
            if (response && response.hasOwnProperty('success')) {
              if (response.success) {
                // redirect the user to the index page
                // window.location.href = './pages/index.php';
                window.alert('Success!');
              } else {
                // display an error message to the console
                const error = response.message;
                console.error(error);
              }
            } else {
              console.error('A resposta do servidor não contém a propriedade "success".');
            }
          } else {
            console.error('O servidor não retornou um conteúdo JSON válido.');
          }
        } else {
          console.error(`Erro ${xhr.status}: ${xhr.statusText}`);
        }
      };
      xhr.onerror = function() {
        console.error('Ocorreu um erro de rede.');
      };
      xhr.send(`ut_email=${email}&ut_pass=${password}`);
    } catch (err) {
      alert(err);
    }
  });
} else {
  console.error('O elemento login-form não foi encontrado.');
}
