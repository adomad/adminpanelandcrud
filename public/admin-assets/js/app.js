/* Custom JavaScript Code */

// Example JavaScript function
function toggleMenu() {
    var menu = document.getElementById('menu');
    menu.classList.toggle('show');
  }
  
  // Add event listener to toggle menu on button click
  var toggleBtn = document.getElementById('toggle-btn');
  toggleBtn.addEventListener('click', toggleMenu);
  