import stringConverter from './stringConverter';

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
  const dayString = stringConverter.firstLettertoUppercase(
    new Intl.DateTimeFormat('sv-SE', options).format(d)
  );
  const month = d.getMonth(); // returns month from 0-11.
  const year = d.getFullYear();
  const monthStringLong = monthsLong[month];

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

export default { printOutDayAndMonth };
