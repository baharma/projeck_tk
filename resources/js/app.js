import  { Helpers }  from "../theme/js/helpers.js";
window.Helpers = Helpers;

// console.log(Helpers);


import config from "../theme/js/config.js";
window.config = config;

import { $ , jQuery } from "../theme/vendor/libs/jquery/jquery.js";
window.$ = $;
window.jQuery = jQuery;

import "../theme/vendor/libs/popper/popper.js";
import "../theme/js/bootstrap.js";
import "../theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.js";
import "../theme/js/menu.js";
import "../theme/vendor/libs/apex-charts/apexcharts.js";
import "../theme/vendor/libs/apex-charts/apexcharts.js";
import "../theme/js/dashboards-analytics.js";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

