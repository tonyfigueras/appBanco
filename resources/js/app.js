/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)
import swal from 'sweetalert2'
window.swal=swal

import Banco from'./components/Banco'
import Cliente from'./components/Cliente'
import CuentasCliente from'./components/CuentasCliente'
import Dashboard from'./components/Dashboard'



const routes = [
  { path: '/cliente', component: Cliente },
  { path: '/cuentascliente', component: CuentasCliente },
  { path: '/banco', component: Banco }
]

const router = new VueRouter({
	mode: 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{
    	Banco,
    	Cliente,
    	CuentasCliente,
    	Dashboard
    }
});
