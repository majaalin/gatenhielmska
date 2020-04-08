/* eslint-disable-next-line */
// console.log(php_data.jsonData);

fetch('/wp-json/wl/v1/facebook')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });
window.onscroll = function() {
  scrollFunction();
};

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
