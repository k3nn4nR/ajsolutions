/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.moment = require('moment');
window.Vue = require('vue');
import Vuetify from '../plugins/vuetify';
import ApexCharts from 'apexcharts';
import VueApexCharts from 'vue-apexcharts';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('proyecto-calendario', require('./components/Proyectos/Calendario.vue').default);
Vue.component('sidebar-list', require('./components/SidebarList.vue').default);

//trabajadores
Vue.component('trabajadores-list', require('./components/Trabajadores/Listado.vue').default);
Vue.component('trabajador-create', require('./components/Trabajadores/Crear.vue').default);


//proyecto
Vue.component('proyectos-list', require('./components/Proyectos/Listado.vue').default);
Vue.component('proyectos-create', require('./components/Proyectos/Crear.vue').default);
Vue.component('proyectos-trabajador-agregar', require('./components/GruposTrabajo/Agregar.vue').default);
Vue.component('proyectos-trabajador-eliminar', require('./components/GruposTrabajo/EliminarTrabajador.vue').default);
Vue.component('proyectos-trabajador-reemplazar', require('./components/GruposTrabajo/ReemplazarTrabajador.vue').default);

//roles
Vue.component('role-list', require('./components/Roles/Listado.vue').default);
Vue.component('role-create', require('./components/Roles/Crear.vue').default);
Vue.component('permiso-asign', require('./components/Roles/AisgnarPermisos.vue').default);

//permisos
Vue.component('permiso-list', require('./components/Permisos/Listado.vue').default);
Vue.component('permiso-create', require('./components/Permisos/Crear.vue').default);
Vue.component('role-asign', require('./components/Permisos/AsignarRoles.vue').default);

//evaluaciones
Vue.component('evaluacion-list', require('./components/Evaluaciones/Listado.vue').default);
Vue.component('evaluacion-create', require('./components/Evaluaciones/Crear.vue').default);
Vue.component('factor-list', require('./components/Evaluaciones/Factores/Listado.vue').default);
Vue.component('factor-create', require('./components/Evaluaciones/Factores/Crear.vue').default);
Vue.component('pregunta-list', require('./components/Evaluaciones/Preguntas/Listado.vue').default);
Vue.component('pregunta-create', require('./components/Evaluaciones/Preguntas/Crear.vue').default);

//graficas
Vue.component('trabajadores-anuales', require('./components/Trabajadores/Graficas/IngresoPorAnio.vue').default);
Vue.component('trabajadores-estados', require('./components/Trabajadores/Graficas/Estado.vue').default);
Vue.component('proyectos-estados', require('./components/Proyectos/Graficas/Estado.vue').default);


//grupos de trabajo
Vue.component('grupos-trabajo-crear', require('./components/GruposTrabajo/Crear.vue').default);
Vue.component('grupos-trabajo-list', require('./components/GruposTrabajo/Listar.vue').default);
/**
 * 
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.use(VueApexCharts)

 Vue.component('apexchart', VueApexCharts)

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
});
