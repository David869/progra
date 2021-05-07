require('./bootstrap');
//window.Vue = require('vue').default;
import Vue from 'vue';

Vue.component('registros-list', require('./components/Registros.vue').default);


const app = new Vue({
    el: '#app'
}); 