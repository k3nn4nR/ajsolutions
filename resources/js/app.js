/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.moment = require('moment');
window.Vue = require('vue');
import Vuetify from '../plugins/vuetify';

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


//proyecto
Vue.component('proyectos-list', require('./components/Proyectos/Listado.vue').default);
Vue.component('proyectos-create', require('./components/Proyectos/Crear.vue').default);


//roles
Vue.component('role-list', require('./components/Roles/Listado.vue').default);
Vue.component('role-create', require('./components/Roles/Crear.vue').default);
Vue.component('permiso-asign', require('./components/Roles/AisgnarPermisos.vue').default);

//permisos
Vue.component('permiso-list', require('./components/Permisos/Listado.vue').default);
Vue.component('permiso-create', require('./components/Permisos/Crear.vue').default);
Vue.component('role-asign', require('./components/Permisos/AsignarRoles.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
});
