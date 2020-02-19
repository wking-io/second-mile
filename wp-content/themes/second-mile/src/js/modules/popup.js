import { attrToBool } from './attr';

export default function togglePopup(e) {
  const popup = document.getElementById(e.currentTarget.getAttribute('aria-controls'));
  console.log(popup);
  const newState = !attrToBool('data-popup-hidden', popup);
  popup.setAttribute('data-popup-hidden', newState);
  return newState;
}
