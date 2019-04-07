import '../scss/main.scss';
import '../images/contact.svg';
import '../images/topography.svg';
import '../fonts/century-gothic-regular.ttf';
import '../fonts/century-gothic-bold.ttf';
import '../fonts/league-spartan-bold.otf';
import { dom } from './modules/dom';
import { eventOn } from './modules/event';
import { getAttr, setAttr, attrToBool } from './modules/attr';

const menuToggle = dom('.menu-toggle');
const masthead = dom(`#${getAttr('aria-controls', menuToggle)}`);

function whenPast(el, fn) {
  return function() {
    const { height } = el.getBoundingClientRect();

    if (window.scrollY > height) {
      fn(true);
    } else {
      fn(false);
    }
  };
}

function toggleNav(masthead) {
  return function(e) {
    const menuOpen = attrToBool('aria-expanded', e.currentTarget);

    setAttr('aria-expanded', !menuOpen, e.currentTarget);
    setAttr('data-menu-open', !menuOpen, masthead);
  };
}

function toggleNavPosition(el) {
  return function(isPast) {
    setAttr('data-header-fixed', isPast, el);
  };
}

eventOn('click', toggleNav(masthead), menuToggle);
eventOn('scroll', whenPast(masthead, toggleNavPosition(masthead)), window);
