/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import 'bootstrap';
import "bootstrap/dist/css/bootstrap.css";
import './styles/app.scss';
import Inputmask from "inputmask"; $(document).ready(function () { Inputmask().mask(document.querySelectorAll("input")); })
import '@fortawesome/fontawesome-free';
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
import '../patch/patch_crud/alias.js';



// start the Stimulus application

import "bootstrap/dist/js/bootstrap.bundle.min";

import './bootstrap';

