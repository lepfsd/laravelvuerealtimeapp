import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import AppLogin  from '../components/AppLogin.vue'
import AppSignup  from '../components/AppSignup.vue'
import AppForum  from '../components/AppForum.vue'

const routes = [
    { path: '/login', component: AppLogin },
    { path: '/signup', component: AppSignup },
    { path: '/forum', component: AppForum, name: 'forum' }
]


const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
})

export default router

