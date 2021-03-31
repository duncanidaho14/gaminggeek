/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import $ from 'jquery';
global.$ = global.jQuery = $;
import './js/jquery-ui/jquery-ui.min.js';
// any CSS you import will output into a single css file (app.css in this case)
import '@popperjs/core';
// start the Stimulus application
import 'bootstrap';

import './pages/waves/js/waves.min.js';
import './js/jquery-slimscroll/jquery.slimscroll.js';
//import './js/jquery.mousewheel.min.js';
//import './js/jquery.mCustomScrollbar.concat.min.js';
import './js/pcoded.min.js';
import './js/vertical/vertical-layout.min.js';
import './js/script.js';

import './styles/app.scss';
import "./pages/waves/css/waves.min.css";
import "./icon/themify-icons/themify-icons.css";
import "./styles/font-awesome-n.min.css";
import "./styles/font-awesome.min.css";
//import "./styles/jquery.mCustomScrollbar.css";
import "./styles/style.css";

import logo from './images/logo.png';
import avatar2 from './images/avatar-2.jpg';
import avatar3 from './images/avatar-3.jpg';
import avatar4 from './images/avatar-4.jpg';
import userbg from './images/user-bg.jpg';
import selectArrow from './images/select-arrow.png';
import breadcrumb from './images/breadcrumb-bg.jpg';

export default $;

