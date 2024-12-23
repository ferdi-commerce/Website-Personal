document.addEventListener("DOMContentLoaded", function () {
  const hamburgerMenu = document.getElementById("hamburger-menu");
  const navbarNav = document.querySelector(".navbar .navbar-nav");

  hamburgerMenu.addEventListener("click", function () {
    navbarNav.classList.toggle("active");
  });
});
