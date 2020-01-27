/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.onload = function() {
	lax.setup() // init

	const updateLax = () => {
		lax.update(window.scrollY)
		window.requestAnimationFrame(updateLax)
	}

	window.requestAnimationFrame(updateLax)
}

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

import Vrouter from 'vue-router';
import test from './components/ExampleComponent.vue';
import landing from './components/landing.vue';

// Vue.use(Vrouter);
// const routes = [
// 	{path:'/',component:landing},
// 	{path:'/recipes',component:require('./components/ShowAllRecipe.vue')}
// ];
// const router = new Vrouter ({
// 	routes,
// 	history:true,
	
// });




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('recipe-form', require('./components/CreateRecipeForm.vue').default);
Vue.component('user-list', require('./components/ShowAllUsers.vue').default);
Vue.component('test-ing', require('./components/Fetch.vue').default);
Vue.component('recipe-edit' , require('./components/EditRecipeForm.vue').default);
Vue.component('pro-ps', require('./components/props.vue').default);
Vue.component('recipe-show', require('./components/ShowRecipe.vue').default);
Vue.component('lan-ding', require('./components/landing.vue').default);
Vue.component('recipe-list', require('./components/ShowAllRecipe.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('reg-form', require('./components/RegForm.vue').default);
Vue.component('log-in', require('./components/LogForm.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
	el: '#app',
	// router,

});


