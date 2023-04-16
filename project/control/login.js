fetch('database.php')
    .then(function (response) {
        return response.text();
    })
    .then(function (data) {
        console.log(data);
    });

document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    for (var i = 0; i < users.length; i++) {
        if (username === users[i].email && password === users[i].password) {
            alert("Login bem sucedido");
            return;
        }
    }

    alert("Nome de usuário ou senha incorretos");
});