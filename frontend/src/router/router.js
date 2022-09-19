import {createRouter, createWebHistory} from 'vue-router'
import DefaultLayout from '../layouts/DefaultLayout.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Home from '../views/Home.vue'
import store from "@/store/store";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'default',
            redirect: 'home',
            component: DefaultLayout,
            children: [
                {
                    path: '/home',
                    name: 'home',
                    component: Home
                },
                {
                    path: '/login',
                    name: 'login',
                    component: Login
                },
                {
                    path: '/register',
                    name: 'register',
                    component: Register
                },
            ]
        },

    ]
})

router.beforeEach((to, from, next) => {
    if (!store.getters.isLoggedIn && (to.name !== 'login' && to.name !== 'register')) {
        next({name: 'login'})
    } else if (store.getters.isLoggedIn && (to.name === 'login' || to.name === 'register')) {
        next({name: 'home'})
    } else {
        next()
    }
})
export default router
