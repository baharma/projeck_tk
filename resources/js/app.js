import  { Helpers }  from "../theme/js/helpers.js";
window.Helpers = Helpers;

// console.log(Helpers);


import config from "../theme/js/config.js";
window.config = config;

import { $ , jQuery } from "../theme/vendor/libs/jquery/jquery.js";
window.$ = $;
window.jQuery = jQuery;



import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

