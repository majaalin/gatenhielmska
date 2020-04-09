import PreloadningScreen from './pageLoadWrap';

// Preloadning Screen on landing page
PreloadningScreen.templatePageLoad();

const myStorage = window.sessionStorage;
console.log(myStorage.getItem('hasCodeRunBefore'));

if (myStorage.getItem('hasCodeRunBefore') === null) {
  setTimeout(() => {
    PreloadningScreen.onLoadWrap();
    myStorage.setItem('hasCodeRunBefore', 'yes');
  }, 2000);
} else {
  PreloadningScreen.onLoadWrap2();
}

function scrollFunction() {
  const subMenu = document.querySelectorAll('.sub-menu');

  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector('header').style.backgroundColor =
      'rgba(13, 17, 23, 0.97)';
    subMenu.forEach(element => {
      element.style.backgroundColor = 'rgba(13, 17, 23, 0.97)';
    });
  } else {
    document.querySelector('header').style.backgroundColor = 'transparent';
    subMenu.forEach(element => {
      element.style.backgroundColor = 'transparent';
    });
  }
}

window.onscroll = function() {
  scrollFunction();
};

const hamburger = document.querySelector('.nav-icon');

function open() {
  const menu = document.querySelector('.mobile-menu ');
  menu.classList.toggle('open');
  // document.body.classList.toggle("overflow-hidden");
}

hamburger.addEventListener('click', open);
// function openMenu() {
//   const mobile = document.querySelector(".mobile");
//   const mobilMenu = mobile.querySelectorAll(".sub-menu");

//   mobilMenu.forEach(menu => {
//     menu.classList.toggle("sub-menu-open");
//   });
//   console.log(mobilMenu);
