 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container px-4 px-lg-5">
         <a class="navbar-brand" href="./index.php">GG-FreeGames</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                 <li class="nav-item"><a class="nav-link active" aria-current="page" href="./index.php">Home</a></li>
                 <li class="nav-item"><a class="nav-link" href="#!">Games</a></li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="#!">About Me!!!</a></li>
                         <li>
                             <hr class="dropdown-divider" />
                         </li>
                         <li><a class="dropdown-item" href="#!">Why to create Website</a></li>
                         <li><a class="dropdown-item" href="#!">What a f</a></li>
                     </ul>
                 </li>
             </ul>
             <form class="d-flex" href="./account.php">
                 <button class="btn btn-outline-light" id="account">
                     <i class="bi bi-person-circle"></i>
                     Account
                 </button>
             </form>
         </div>
     </div>
 </nav>

 <script>
     // Get the button element by its ID
     const accountButton = document.getElementById("account");

     // Add an event listener to the button
     accountButton.addEventListener("click", function() {
         // Change the page by setting the window location to the desired URL
         window.location.href = "./account.php";

     });
 
 </script>