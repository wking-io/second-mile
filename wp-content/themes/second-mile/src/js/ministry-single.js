import Player from '@vimeo/player';
import { dom, domAll } from './modules/dom';
import togglePopup from './modules/popup';

const theVideo = dom('[data-popup] iframe');
if (!theVideo.hasOwnProperty('error')) {
  const player = new Player(theVideo);
  const popupBtns = domAll('[data-popup-action]');

  popupBtns.forEach((btn) => {
    btn.addEventListener('click', (e) => {
      const state = togglePopup(e);
      if (state) {
        player.pause();
      } else {
        player.play();
      }
    });
  });
}
