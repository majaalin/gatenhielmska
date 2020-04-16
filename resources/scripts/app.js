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
  document.querySelector(".mobile").style.backgroundColor =
    "rgba(13, 17, 23, 0.97)";
}
hamburger.addEventListener("click", open);
cross.addEventListener("click", open);

hamburger.addEventListener("click", open);
// function openMenu() {
//   const mobile = document.querySelector(".mobile");
//   const mobilMenu = mobile.querySelectorAll(".sub-menu");

//   mobilMenu.forEach(menu => {
//     menu.classList.toggle("sub-menu-open");
//   });

// Fetch from rest api and print out instagram content.
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

if (document.querySelector(".event-container")) {
  const showModalForEventsCard = () => {
    const cardbuttons = document.querySelectorAll(".card-button");
    const modalOuter = document.querySelector(".modal-outer");
    const modalInner = document.querySelector(".modal-inner");

    const handelCardButtonClick = event => {
      const button = event.currentTarget;
      const card = button.closest(".box");

      const imgSrc = card.querySelector("img").src;
      const h1 = card.querySelector("h1").textContent;
      // const description = card.querySelector('.event-description-p')
      //   .textContent;
      // const hiddenElements = card.querySelectorAll('.hidden');
      // console.log(description);

      modalInner.innerHTML = `
    <img class="modalImg" src="${imgSrc}">
    <h1>${h1}</h1>
    `;

      modalOuter.classList.add("open");
    };

    cardbuttons.forEach(button =>
      button.addEventListener("click", handelCardButtonClick)
    );

    const removeModal = () => {
      modalOuter.classList.remove("open");
    };

    modalOuter.addEventListener("click", event => {
      const isOutSide = !event.target.closest(".modal-inner");
      if (isOutSide) {
        removeModal();
      }
    });

    window.addEventListener("keydown", event => {
      if (event.key === "Escape") {
        removeModal();
      }
    });
  };

  const printOutDayAndMonth = date => {
    const months = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "Maj",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec"
    ];

    const d = new Date(date);
    const day = d.getDate();
    const month = d.getMonth(); // returns month from 0-11.
    const year = d.getFullYear();

    const dateHolder = {
      day,
      month,
      year,
      dateStr: `${day}/${month}/${year}`,
      monthString: months[month]
    };

    return dateHolder;
  };

  const printOutCategory = str => {
    if (str === undefined || str === "OTHER") {
      return "";
    }
    const splitStr = str.split("_");
    const lowerStr = splitStr[0].toLowerCase();
    const res = lowerStr.replace(/^./, lowerStr[0].toUpperCase());
    return `${res}`;
  };

  const setGridOnEvents = i => {
    const grids = [
      "box landscape3",
      "box",
      "box landscape2",
      "box landscape2",
      "box",
      "box",
      "box",
      "box landscape2",
      "box landscape2"
    ];

    return `${grids[i]}`;
  };

  const printOutDateLineInGrid = dateObject => {
    const divContainer = document.querySelector(".event-container");
    const template = `<div class="breakline"><p class="breakline-text">Event för ${dateObject.monthString} ${dateObject.year}</p></div>`;
    divContainer.innerHTML += template;
  };

  const printOutEvents = data => {
    const divContainer = document.querySelector(".event-container");
    let gridCount = 0;
    let monthCount = "";

    data.forEach(event => {
      if (gridCount === 9) {
        gridCount = 0;
      }

      const dateObject = printOutDayAndMonth(event.start_time.date);

      if (dateObject.month !== monthCount) {
        monthCount = dateObject.month;

        printOutDateLineInGrid(dateObject);

        if (gridCount !== 0) {
          if (gridCount === 1) {
            gridCount = 2;
          } else if (gridCount <= 3) {
            gridCount = 4;
          } else if (gridCount <= 6) {
            gridCount = 7;
          }
        }
      }

      const div = document.createElement("div");
      div.className = setGridOnEvents(gridCount);

      const template = `
      <div class="event-filter"></div>
      <p class="event-header-p"> ${printOutCategory(event.category)} Event - ${
        dateObject.day
      } ${dateObject.monthString}</p>
      <h1>${event.name}</h1>
      <button class="card-button">Anmäl dig</button>
      <img src="${event.cover.source}">
      <p class="hidden event-description-p">${event.description}</p>
      `;

      div.innerHTML = template;
      divContainer.appendChild(div);
      gridCount += 1;
    });
    showModalForEventsCard();
  };

  fetch("/wp-json/wl/v1/facebook")
    .then(res => res.json())
    .then(data => {
      printOutEvents(data);
    });
}
