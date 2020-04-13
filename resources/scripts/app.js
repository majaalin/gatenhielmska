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
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector("header").style.backgroundColor =
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
function open() {
  const menu = document.querySelector(".mobile-menu ");
  menu.classList.toggle("open");
  // document.body.classList.toggle("overflow-hidden");
}
hamburger.addEventListener("click", open);
// function openMenu() {
//   const mobile = document.querySelector(".mobile");
//   const mobilMenu = mobile.querySelectorAll(".sub-menu");
//   mobilMenu.forEach(menu => {
//     menu.classList.toggle("sub-menu-open");
//   });
//   console.log(mobilMenu);
if (document.querySelector(".gallery")) {
  const printOutGallery = data => {
    data.data.forEach(media => {
      const divContainer = document.querySelector(".gallery-container");
      if (
        media.media_type === "IMAGE" ||
        media.media_type === "CAROUSEL_ALBUM"
      ) {
        const mediaUrlTemplate = `<img src="${media.media_url}" />`;
        const template = `<div class="gallery-inner-container">${mediaUrlTemplate}</div>`;
        divContainer.innerHTML += template;
      } else {
        const mediaUrlTemplate = `<video controls><source src="${media.media_url}"></video>`;
        const template = `<div class="gallery-inner-container">${mediaUrlTemplate}</div>`;
        divContainer.innerHTML += template;
      }
    });
  };
  fetch("/wp-json/wl/v1/instagram")
    .then(res => res.json())
    .then(data => {
      printOutGallery(data);
    });
}
