import PreloadningScreen from "./pageLoadWrap";
import smoothScroll from "./smoothScroll";
// Preloading Screen on landing page
if (document.querySelector(".home__Preloading-Screen")) {
  PreloadningScreen.templatePageLoad();

  const myStorage = window.sessionStorage;

  if (myStorage.getItem("hasCodeRunBefore") === null) {
    setTimeout(() => {
      PreloadningScreen.onLoadWrap();
      myStorage.setItem("hasCodeRunBefore", "yes");
    }, 2000);
  } else {
    PreloadningScreen.onLoadWrap();
  }
}
// Smooth Scroll
const homeScrollButton = document.querySelector(".homeScrollButton");

if (homeScrollButton) {
  homeScrollButton.addEventListener("click", function() {
    smoothScroll.smoothScroll("#anchor1", 1000);
  });
}

// On scroll change header color
function scrollFunction() {
  const subMenu = document.querySelectorAll(".sub-menu");
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    document.querySelector("header").style.backgroundColor =
      "rgba(13, 17, 23, 0.97)";
    document.querySelector(".mobile").style.backgroundColor =
      "rgba(13, 17, 23, 0.97)";
    subMenu.forEach(element => {
      element.style.backgroundColor = "rgba(13, 17, 23, 0.97)";
    });
  } else {
    document.querySelector("header").style.backgroundColor = "transparent";
    subMenu.forEach(element => {
      element.style.backgroundColor = "transparent";
    });
  }
}
window.onscroll = function() {
  scrollFunction();
};

const hamburger = document.querySelector(".nav-icon");
const cross = document.querySelector(".cross");
function open() {
  const menu = document.querySelector(".mobile-menu ");
  menu.classList.toggle("open");
  cross.classList.toggle("cross-visible");
  hamburger.classList.toggle("nav-icon-visible");
}
hamburger.addEventListener("click", open);
cross.addEventListener("click", open);

fetch("wp-json/wl/v1/instagram")
  .then(res => res.json())
  .then(data => {
    console.log(data);
  });
