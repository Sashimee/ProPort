// Defining scope

const sideBar = document.querySelector("#sideBarWrapper");
const sideBarButton = document.querySelector("#buttonBar");
const menu = document.querySelector("#mainMenu");
const main = document.querySelector("main");

// Adding event listener

window.addEventListener("resize", windowResize);

//Run once at start

windowResize();

// FUNCTIONS

function windowResize() {
    if (window.innerWidth >= 1200) {
        menu.removeEventListener("click", closeMenu);
        menu.style.display = "flex";
        main.style.display = "initial";
    }
    if (window.innerWidth < 1200) {
        menu.addEventListener("click", closeMenu);
        sideBarButton.addEventListener("click", openMenu);
        menu.style.display = "none";
        sideBar.style.display = "";
        main.style.display = "initial";
    }
}

function openMenu() {
    sideBar.style.display = "none";
    menu.style.display = "flex";
    main.style.display = "none";
}

function closeMenu() {
    sideBar.style.display = "";
    menu.style.display = "none";
    main.style.display = "initial";
}

/// REMOVE THIS AND PLACE INTO GENERAL JS THIS IS NOT FOR THE MENU

body.addEventListener("load", setTimeout(function() {
    window.scrollTo(0, 1);
}), 100);