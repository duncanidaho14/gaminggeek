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

export default $;

