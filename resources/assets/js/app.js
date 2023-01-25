
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('unread', require('./components/UnreadNots.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('file', require('./components/File.vue'));
Vue.component('follower', require('./components/Follower.vue'));
Vue.component('comment', require('./components/Comment.vue'));
Vue.component('search', require('./components/Search.vue'));
Vue.component('favourite', require('./components/Favourite.vue'));
import { store } from './store'

// window.id = {!!  $profile->user_id !!};


const app = new Vue({
    el: '#app',
    store,
    data: {
    },
    methods:{
    },
});
