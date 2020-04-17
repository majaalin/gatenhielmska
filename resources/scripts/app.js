import smoothScroll from './smoothScroll';

// Smooth Scroll
const homeScrollButton = document.querySelector('.homeScrollButton');

if (homeScrollButton) {
  homeScrollButton.addEventListener('click', function() {
    smoothScroll.smoothScroll('#anchor1', 1000);
  });
}

// On scroll change header color
function scrollFunction() {
  const subMenu = document.querySelectorAll('.sub-menu');
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    document.querySelector('header').style.backgroundColor =
      'rgba(13, 17, 23, 0.97)';
    document.querySelector('.mobile').style.backgroundColor =
      'rgba(13, 17, 23, 0.97)';
    subMenu.forEach(element => {
      element.style.backgroundColor = 'rgba(13, 17, 23, 0.97)';
    });
  } else {
    document.querySelector('header').style.backgroundColor = 'transparent';
    document.querySelector('.mobile').style.backgroundColor = 'transparent';
    subMenu.forEach(element => {
      element.style.backgroundColor = 'transparent';
    });
  }
}

window.onscroll = function() {
  scrollFunction();
};

const hamburger = document.querySelector('.nav-icon');
const cross = document.querySelector('.cross');
function open() {
  const menu = document.querySelector('.mobile-menu ');
  menu.classList.toggle('open');
  cross.classList.toggle('cross-visible');
  hamburger.classList.toggle('nav-icon-visible');
  document.querySelector('.mobile').style.backgroundColor =
    'rgba(13, 17, 23, 0.97)';
}
hamburger.addEventListener('click', open);
cross.addEventListener('click', open);
hamburger.addEventListener('click', open);

// Fetch from rest api and print out instagram content.
if (document.querySelector('.gallery')) {
  const printOutGallery = data => {
    data.data.forEach(media => {
      const divContainer = document.querySelector('.gallery-container');
      if (
        media.media_type === 'IMAGE' ||
        media.media_type === 'CAROUSEL_ALBUM'
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

  fetch('/wp-json/wl/v1/instagram')
    .then(res => res.json())
    .then(data => {
      printOutGallery(data);
    });
}

if (document.querySelector('.event-container')) {
  const firstLettertoUppercase = str => {
    const lowerStr = str.toLowerCase();
    const res = lowerStr.replace(/^./, lowerStr[0].toUpperCase());
    return res;
  };

  const printOutDayAndMonth = date => {
    const monthsShort = [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'Maj',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec',
    ];
    const monthsLong = [
      'januari',
      'februari',
      'mars',
      'april',
      'maj',
      'jun',
      'jul',
      'augusti',
      'september',
      'october',
      'november',
      'december',
    ];

    const hourSingel = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

    const options = { weekday: 'long' };
    const d = new Date(date);
    let minutes = '';
    let hour = '';
    if (d.getMinutes() === 0) {
      minutes = `${d.getMinutes()}0`;
    } else {
      minutes = d.getMinutes();
    }

    if (hourSingel[d.getHours()] === d.getHours()) {
      hour = `0${d.getHours()}`;
    } else {
      hour = d.getHours();
    }

    const day = d.getDate();
    const dayString = firstLettertoUppercase(
      new Intl.DateTimeFormat('sv-SE', options).format(d)
    );
    const month = d.getMonth(); // returns month from 0-11.
    const year = d.getFullYear();
    const monthStringLong = monthsLong[month];

    console.log(monthsShort[month]);

    const dateHolder = {
      day,
      month,
      year,
      dayMonthYear: `${day}/${month}/${year}`,
      monthStringShort: monthsShort[month],
      dayString,
      modaltime: `${dayString} ${day} ${monthStringLong} ${year} kl. ${hour}:${minutes}`,
    };

    return dateHolder;
  };

  const showModalForEventsCard = () => {
    const cardbuttons = document.querySelectorAll('.card-button');
    const modalOuter = document.querySelector('.modal-outer');
    const modalInner = document.querySelector('.modal-inner');

    const handelCardButtonClick = event => {
      const button = event.currentTarget;
      const card = button.closest('.box');

      const imgSrc = card.querySelector('img').src;
      const h1 = card.querySelector('h1').textContent;
      const description = card.querySelector('.event-description').textContent;
      const ticketUrl = card.querySelector('.event-ticket').textContent;
      const startTime = card.querySelector('.event-startTime').textContent;
      const address = card.querySelector('.event-address').textContent;
      const owner = card.querySelector('.event-owner').textContent;
      const id = card.querySelector('.event-id').textContent;

      modalInner.innerHTML = `
      <div class="modal-header">
        <div class="modal-filter"></div>
        <img class="modal-img" src="${imgSrc}">
        <h1 class="modal-h1">${h1}</h1>
        <div class="modal-button-container">
          <a class="modal-link" href="${ticketUrl}"><button class="modal-button-buy">Köp biljett</button></a>
          <a class="modal-link" href="https://www.facebook.com/events/${id}"><button class="modal-button-facebook">Se eventet på facebook</button></a>
        </div>
      </div>
      <div class="modal-body">
          <div class="modal-li-container">
            <ul class="modal-firstList">
            <li>Tid:</li>
            <li>Plats:</li>
            <li>Arrangeras av:</li>
            </ul>
            <ul class="modal-secoundList">
            <li>${startTime}</li>
            <li>${address}</li>
            <li>${owner}</li>
            </ul>
          </div>
        <p class="modal-description">${description}</p>
      </div>
    `;

      modalOuter.classList.add('open');

      if (window.innerWidth > 960) {
        document.querySelector('header').style.display = 'none';
      }
    };

    cardbuttons.forEach(button =>
      button.addEventListener('click', handelCardButtonClick)
    );

    const removeModal = () => {
      modalOuter.classList.remove('open');

      if (window.innerWidth > 960) {
        document.querySelector('header').style.display = 'block';
      }
    };

    modalOuter.addEventListener('click', event => {
      const isOutSide = !event.target.closest('.modal-inner');
      if (isOutSide) {
        removeModal();
      }
    });

    window.addEventListener('keydown', event => {
      if (event.key === 'Escape') {
        removeModal();
      }
    });
  };

  const printOutCategory = str => {
    if (str === undefined || str === 'OTHER') {
      return '';
    }
    const splitStr = str.split('_');

    return `${firstLettertoUppercase(splitStr[0])}`;
  };

  const setGridOnEvents = i => {
    const grids = [
      'box landscape3',
      'box',
      'box landscape2',
      'box landscape2',
      'box',
      'box',
      'box',
      'box landscape2',
      'box landscape2',
    ];

    return `${grids[i]}`;
  };

  const printOutDateLineInGrid = dateObject => {
    const divContainer = document.querySelector('.event-container');
    const template = `<div class="breakline"><p class="breakline-text">Event för ${dateObject.monthStringShort} ${dateObject.year}</p></div>`;
    divContainer.innerHTML += template;
  };

  const printOutEvents = data => {
    const divContainer = document.querySelector('.event-container');
    let gridCount = 0;
    let monthCount = '';

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

      const div = document.createElement('div');
      div.className = setGridOnEvents(gridCount);

      const template = `
      <div class="event-filter"></div>
      <p class="event-header-p"> ${printOutCategory(event.category)} Event - ${
        dateObject.day
      } ${dateObject.monthStringShort}</p>
      <h1>${event.name}</h1>
      <button class="card-button">Anmäl dig</button>
      <img src="${event.cover.source}">
      <p class="hidden event-description">${event.description}</p>
      <p class="hidden event-ticket">${event.ticket_uri}</p>
      <p class="hidden event-startTime">${dateObject.modaltime}</p>
      <p class="hidden event-address">${event.place.name}</p>
      <p class="hidden event-owner">${event.owner.name}</p>
      <p class="hidden event-id">${event.id}</p>
      `;

      div.innerHTML = template;
      divContainer.appendChild(div);
      gridCount += 1;
    });
    showModalForEventsCard();
  };

  fetch('/wp-json/wl/v1/facebook')
    .then(res => res.json())
    .then(data => {
      printOutEvents(data);
    });
}
