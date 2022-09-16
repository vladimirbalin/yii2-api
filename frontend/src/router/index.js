import { createRouter, createWebHistory } from 'vue-router'
import Default from '../layouts/Default.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import UserList from '../views/UserList.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Default,
      children: [
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
        {
          path: '/user-list',
          name: 'userList',
          component: UserList
        },
      ]
    },
  ]
})

export default router
