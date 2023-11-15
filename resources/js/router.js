import { createRouter, createWebHistory } from 'vue-router'
import principal from './components/principal';
import dashboard from './components/admin/dashboard';

const routes = [
  {
    path: '/caracterizacion',
    name: 'caracterizacion',
    component: principal
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: dashboard
  },
  {
    path: '/:catchAll(.*)',
    redirect: '/'
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router