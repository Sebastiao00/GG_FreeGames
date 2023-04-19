function zoomIn() {
    // Add a class to the body to blur the background
    document.body.classList.add("blur");
  
    // Zoom in the page
    document.body.style.transform = "scale(2)";
    document.body.style.transition = "transform 0.5s";
  
    // Wait for the transition to finish before redirecting
    setTimeout(function() {
      window.location.href = "./login.php";
    }, 500);
  }
  