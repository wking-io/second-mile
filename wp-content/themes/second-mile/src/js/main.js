import '../scss/main.scss';
import '../images/contact.svg';
import { dom } from './modules/dom';
import { eventOn } from './modules/event';
import { getAttr, setAttr, attrToBool } from './modules/attr';

const menuToggle = dom('.menu-toggle');
const masthead = dom(`#${getAttr('aria-controls', menuToggle)}`);

function toggleNav(masthead) {
  return function(e) {
    const menuOpen = attrToBool('aria-expanded', e.currentTarget);

    setAttr('aria-expanded', !menuOpen, e.currentTarget);
    setAttr('data-menu-open', !menuOpen, masthead);
  };
}

eventOn('click', toggleNav(masthead), menuToggle);
