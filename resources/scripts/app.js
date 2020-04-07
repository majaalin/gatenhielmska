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
