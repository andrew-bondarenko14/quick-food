require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import { router } from "./router/router"

import App from './components/App'
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
