
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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import VueQuillEditor from 'vue-quill-editor';
import VueRouter from 'vue-router';
import router from './router';
import 'quill/dist/quill.snow.css';

Vue.component('editor', require('./components/Editor.vue').default);
Vue.component('inputimage', require('./components/InputImage.vue').default);
Vue.component('custumselect', require('./components/MultiSelect.vue').default);

Vue.use(VueRouter);
Vue.use(VueQuillEditor);

if(document.getElementById("app")){
  const app = new Vue({
      el: '#app',
      router
  });
}

