/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./components/', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import ElementUI                 from "element-ui";
import { Message, Notification } from "element-ui";
/** Element UI default locale is Simplified Chinese, do this to switch to English */
import locale                    from "element-ui/lib/locale/lang/en";

Vue.use(ElementUI, {locale});
global.Message = Message;
global.Notification = Notification;

/*
Uncomment for SPA solution
import App from "./components/AppSpa";

new Vue({
    el: '#app',
    render: h => h(App)
});
*/

const app = new Vue({
    el: '#app',
});