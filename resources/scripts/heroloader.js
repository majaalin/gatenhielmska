// const onLoadWrap = () => {
//   document.querySelector('.Preloading-Screen').classList.add('hidden');
//   document.querySelector('.loader-wrap').classList.add('hidden');
//   document.querySelector('.loader-container').classList.add('hidden');
//   document.querySelector('.animation-container').classList.add('hidden');
//   document.querySelector('.loader-logo').classList.add('hidden');
//   document.querySelector('.loader-img').classList.add('hidden');
// };

// const myStorage = window.sessionStorage;

// if (myStorage.getItem('hasCodeRunBefore') === null) {
//   const divContainer = document.querySelector('.Preloading-Screen');
//   const template = `
//   <div class="loader-wrap">
//     <div class="loader-container">
//         <img class="loader-img" src="/themes/Gatenhjelmska/assets/images/Gathenhielmska_huset.jpg" alt="img" />
//           <div class="animation-container">
//         <img class="loader-logo" src="/themes/Gatenhjelmska/assets/images/gatenhielmska-loader-logo.png" alt="img" />
//       </div>
//     </div>
//   </div>
//   `;
//   divContainer.innerHTML = template;
//   setTimeout(() => {
//     onLoadWrap();
//     myStorage.setItem('hasCodeRunBefore', 'yes');
//   }, 2000);
// }
