// Defining scope

const sideBar = document.querySelector("#sideBarWrapper");
const sideBarButton = document.querySelector("#buttonBar");
const menu = document.querySelector("#mainMenu");

// Adding event listener

window.addEventListener("resize", windowResize);

//Run once at start

windowResize();

// FUNCTIONS

function windowResize() {
    if (window.innerWidth >= 1200) {
        menu.removeEventListener("click", closeMenu);
        menu.style.display = "flex";
    }
    if (window.innerWidth < 1200) {
        menu.addEventListener("click", closeMenu);
        sideBarButton.addEventListener("click", openMenu);
        menu.style.display = "none";
        sideBar.style.display = "";
    }
}

function openMenu() {
    sideBar.style.display = "none";
    menu.style.display = "flex";
}

function closeMenu() {
    sideBar.style.display = "";
    menu.style.display = "none";
}