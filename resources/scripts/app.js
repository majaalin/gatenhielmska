/* eslint-disable-next-line */
// console.log(php_data.jsonData);

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

const onLoadWrap = () => {
  const wrap = document.querySelector('.loader-wrap');
  const loaderContainer = document.querySelector('.loader-container');
  const animationContainer = document.querySelector('.animation-container');

  wrap.classList.add('hidden');
  loaderContainer.classList.add('hidden');
  animationContainer.classList.add('hidden');
};

setTimeout(() => {
  onLoadWrap();
}, 2000);
