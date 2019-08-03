import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Axios from 'axios'

Vue.prototype.$http = Axios;

const token = localStorage.getItem('user-token')
if (token) {
	Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}



Vue.config.productionTip = false

router.afterEach((to, from) => {
	Vue.nextTick(() => {
		document.title = to.meta.title ? to.meta.title : 'App Name';
		//document.csrf = localStorage.getItem('csrf') ? localStorage.getItem('csrf') : document.querySelector('meta[name="csrf-token"]').getAttribute('content');
	});
})

new Vue({
	router,
	store,
	render: h => h(App)
}).$mount('#app')
