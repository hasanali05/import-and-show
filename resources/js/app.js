require('./bootstrap');

import Vue from 'vue'

import Reports from './components/ReportsComponent.vue'
import Import from './components/ImportComponent.vue'

const app = new Vue({
    el: '#app',
    components: {
        Reports: Reports,
        Import: Import,
    },
});