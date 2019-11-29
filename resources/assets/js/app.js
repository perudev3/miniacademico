
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);


import viewdocente from './components/docente.vue';
import viewcurso from './components/curso.vue';
import viewalumno from './components/alumno.vue';
import viewinscripcion from './components/inscripcion.vue';
import viewpagos from './components/pagos.vue';


const routes = [
	{
            path: '/',
            components: {
                docente: viewdocente,
                curso: viewcurso,
                alumno: viewalumno,
                inscripcion: viewinscripcion, 
                pagos: viewpagos,            	
            }
    }
]


const router = new VueRouter({ routes })

const app = new Vue({ 
	router
}).$mount('#app')
