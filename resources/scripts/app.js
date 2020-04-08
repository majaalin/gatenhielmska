/* eslint-disable-next-line */
// console.log(php_data.jsonData);

fetch('/wp-json/wl/v1/facebook')
  .then(response => response.json())
  .then(data => {
    console.log(data);
  });
