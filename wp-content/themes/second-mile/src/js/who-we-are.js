import '../scss/main.scss';
import '../images/contact.svg';
import '../images/topography.svg';
import { dom } from './modules/dom';
import { eventOn } from './modules/event';
import { setAttr } from './modules/attr';

function whenPast(el, fn) {
  return function() {
    const { top } = el.getBoundingClientRect();

    if (top <= 0) {
      fn(true);
    } else {
      fn(false);
    }
  };
}

function togglePosition(el) {
  return function(isPast) {
    setAttr('data-fixed', isPast, el);
  };
}

const wrapper = dom('.who-we-are-inner');
const ministries = dom('.ministry-list');
eventOn('scroll', whenPast(wrapper, togglePosition(ministries)), window);
