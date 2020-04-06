window.onscroll = function() {
  scrollFunction();
};

const subMenu = document.getElementsByClassName("sub-menu");

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.querySelector("header").style.backgroundColor =
      "rgba(13, 17, 23, 0.97)";
  } else {
    document.querySelector("header").style.backgroundColor = "transparent";
  }
}
