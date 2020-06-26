/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import vue from 'vue';
import VueFilterDateFormat from '@vuejs-community/vue-filter-date-format';
import VueFilterDateParse from '@vuejs-community/vue-filter-date-parse';

vue.use(VueFilterDateParse);
vue.use(VueFilterDateFormat);

window.Vue = vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('query-message', require('./components/base/QueryMessage.vue').default);
Vue.component('navigation-message', require('./components/base/NavigationMessage.vue').default);
Vue.component('hero', require('./components/base/HeroComponent.vue').default);
Vue.component('recipe-table', require('./components/recipes/RecipeTableComponent.vue').default);
Vue.component('recipe-list', require('./components/recipes/RecipeListComponent.vue').default);
Vue.component('recipe-form', require('./components/recipes/RecipeFormComponent.vue').default);
Vue.component('ingredient-table', require('./components/ingredients/IngredientTableComponent.vue').default);
Vue.component('ingredient-list', require('./components/ingredients/IngredientListComponent.vue').default);
Vue.component('ingredient-form', require('./components/ingredients/IngredientFormComponent.vue').default);
Vue.component('ingredient-search', require('./components/ingredients/IngredientSearchComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
