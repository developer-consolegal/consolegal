function toggleMenu() {
  var menu = document.getElementById("mobileMenu");
  var hamburger = document.querySelector(".hamburger i"); // Select the icon inside the hamburger

  menu.classList.toggle("show");

  if (menu.classList.contains("show")) {
    hamburger.classList.remove("fa-bars");
    hamburger.classList.add("fa-times");
  } else {
    hamburger.classList.remove("fa-times");
    hamburger.classList.add("fa-bars");
  }
}
