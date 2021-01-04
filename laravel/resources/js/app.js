/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
import Vue from "vue";
=======
>>>>>>> test
=======
import Vue from "vue";
>>>>>>> DB_redesign
=======
import Vue from "vue";
>>>>>>> frontend
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('redirect_button-component', require('./components/redirect_button.vue').default);
=======

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
>>>>>>> test
=======
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('redirect_button-component', require('./components/redirect_button.vue').default);
>>>>>>> DB_redesign
=======
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('redirect_button-component', require('./components/redirect_button.vue').default);
>>>>>>> frontend

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

import './bootstrap'
import Vue from 'vue'
import FooBar from './components/FooBar'


>>>>>>> test
=======
>>>>>>> DB_redesign
=======
>>>>>>> frontend
const app = new Vue({
    el: '#app',
});
