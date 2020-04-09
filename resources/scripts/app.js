window.onscroll = function() {
  scrollFunction();
};

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

const hamburger = document.querySelector(".nav-icon");

hamburger.addEventListener("click", open);

function open() {
  const menu = document.querySelector(".mobile-menu ");
  menu.classList.toggle("open");
  // document.body.classList.toggle("overflow-hidden");
}

// function openMenu() {
//   const mobile = document.querySelector(".mobile");
//   const mobilMenu = mobile.querySelectorAll(".sub-menu");

//   mobilMenu.forEach(menu => {
//     menu.classList.toggle("sub-menu-open");
//   });
//   console.log(mobilMenu);
