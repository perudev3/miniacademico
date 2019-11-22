
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);


import viewdocente from './components/docente.vue';



const routes = [
	{
            path: '/',
            components: {
                docente: viewdocente,
            	
            }
    }
]


const router = new VueRouter({ routes })

const app = new Vue({ 
	router
}).$mount('#app')
