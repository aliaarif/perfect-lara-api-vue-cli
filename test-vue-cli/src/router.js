import Vue from 'vue'
import Router from 'vue-router'
import store from './store.js'
import Home from './views/Home.vue'
import About from './views/About.vue'
import Login from './components/Login.vue'
import Dashboard from './components/Dashboard.vue'
import Secure from './components/Secure.vue'
import Register from './components/Register.vue'

Vue.use(Router)

let router = new Router({
  mode: 'history',
  routes: [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      title: 'Home Page - Example App',

      metaTags: [
      {
        name: 'description',
        content: 'The home page of our example app.'
      },
      {
        property: 'og:description',
        content: 'The home page of our example app.'
      }
      ]
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      title: 'Login Page - Example App',

      metaTags: [
      {
        name: 'description',
        content: 'The login page of our example app.'
      },
      {
        property: 'og:description',
        content: 'The login page of our example app.'
      }
      ]
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      title: 'Register Page - Example App',

      metaTags: [
      {
        name: 'description',
        content: 'The register page of our example app.'
      },
      {
        property: 'og:description',
        content: 'The register page of our example app.'
      }
      ]
    }
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: { 
      requiresAuth: true,
      title: 'Dashboard - Example App',
      metaTags: [
      {
        name: 'description',
        content: 'The dashboard of our example app.'
      },
      {
        property: 'og:description',
        content: 'The dashboard of our example app.'
      }
      ]
    }
  },
  {
    path: '/secure',
    name: 'secure',
    component: Secure,
    meta: { 
      requiresAuth: true,
      title: 'Secure Page - Example App',
      metaTags: [
      {
        name: 'description',
        content: 'The secure page of our example app.'
      },
      {
        property: 'og:description',
        content: 'The secure page of our example app.'
      }
      ]

    }
  },
  {
    path: '/about',
    name: 'about',
    component: About,
    meta: {
      title: 'About Page - Example App',

      metaTags: [
      {
        name: 'description',
        content: 'The about page of our example app.'
      },
      {
        property: 'og:description',
        content: 'The about page of our example app.'
      }
      ]
    }
  }
  ]
})

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)) {
    if (store.getters.isLoggedIn) {
      next()
      return
    }
    next('/login') 
  } else {
    next() 
  }
})

export default router