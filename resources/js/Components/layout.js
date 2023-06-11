// Get DOM elements
const menuToggle = document.querySelector(".menu_toggle");
const asideMenu = document.querySelector(".aside_menu");

menuToggle &&
    menuToggle.addEventListener("click", function () {
        if (asideMenu) {
            asideMenu.classList.toggle("hidden");
        }
    });
