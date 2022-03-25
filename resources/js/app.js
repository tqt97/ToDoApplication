require('./bootstrap');

import Vue from 'vue';
import App from './vue/app';

import Notifications from 'vue-notification';
import velocity      from 'velocity-animate'

import {library} from '@fortawesome/fontawesome-svg-core';
import {faPlusSquare, faTrash} from '@fortawesome/free-solid-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

Vue.use(Notifications, { velocity })

library.add(faPlusSquare, faTrash);
Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    components: {App},
});
