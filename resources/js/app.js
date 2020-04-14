require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

Vue.use(VueRouter);
Vue.component('pagination', require('laravel-vue-pagination'));

import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './App.vue';

Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import ShowPersonComponent from './components/Person/ShowComponent.vue';
import TestComponent from './components/TestComponent.vue';

Vue.component('loading',{ template: '<div class="load-container start-load-container"><div class="top-50"><div class="loadersmall"></div></div></div>'})

const routes = [
  {
    name: 'home',
    path: '/',
    component: HomeComponent
  },
  {
    name: 'personShow',
    path: '/persons/show/:id',
    component: ShowPersonComponent
  },
  {
    name: 'test',
    path: '/test',
    component: TestComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes });

const app = new Vue({
  el: '#app',
  components : { App },
  router,
  data: { loading: false },
});

router.beforeEach((to, from, next) => {
  app.loading = true
  next();
})

router.afterEach((to, from, next) => {
  setTimeout(() => app.loading = false, 300);
});