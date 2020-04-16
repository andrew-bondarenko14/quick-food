window.Vue = require('vue');
const MainPageModer = Vue.component('main-page-moder', require('../components/moder/MainPageModer.vue').default);
const MainPageAdmin = Vue.component('main-page-admin', require('../components/admin/MainPageAdmin.vue').default);
export const routes = [
    {
    path: '/moder-dashboard/home',
    component: MainPageModer,
    name: 'MainPageModer',
    },
    {
        path: '/admin-dashboard/home',
        component: MainPageAdmin,
        name: 'MainPageAdmin',
    },
];