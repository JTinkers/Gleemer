require('./bootstrap');

window.Vue = require('vue');

import hljs from 'highlight.js';

import VueHighlightJS from 'vue-highlight.js';

Vue.use(VueHighlightJS);

Vue.config.productionTip = false;

const app = new Vue
({
    el: '#main'
});
