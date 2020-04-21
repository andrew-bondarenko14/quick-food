window.Vue = require('vue');
const MainPageModer = Vue.component('main-page-moder', require('../components/moder/MainPageModer.vue').default);
const MainPageAdmin = Vue.component('main-page-admin', require('../components/admin/MainPageAdmin.vue').default);
const EditUsers = Vue.component('edit-users', require('../components/admin/EditUsers.vue').default);
const CreateUser = Vue.component('create-user', require('../components/admin/CreateUser.vue').default);
const EditCategories = Vue.component('edit-categories', require('../components/moder/EditCategories.vue').default);
const CreateCategory = Vue.component('create-category', require('../components/moder/CreateCategory.vue').default);
const EditProducts = Vue.component('edit-products', require('../components/moder/EditProducts.vue').default);
const CreateProduct = Vue.component('create-product', require('../components/moder/CreateProduct.vue').default);
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
    {
        path: '/admin-dashboard/edit-users',
        component: EditUsers,
        name: 'EditUsers',
    },
    {
        path: '/admin-dashboard/create-user',
        component: CreateUser,
        name: 'CreateUser',
    },
    {
        path: '/moder-dashboard/edit-categories',
        component: EditCategories,
        name: 'EditCategories',
    },
    {
        path: '/moder-dashboard/create-category',
        component: CreateCategory,
        name: 'CreateCategory',
    },
    {
        path: '/moder-dashboard/edit-products',
        component: EditProducts,
        name: 'EditProducts',
    },
    {
        path: '/moder-dashboard/create-product',
        component: CreateProduct,
        name: 'CreateProduct',
    },
];