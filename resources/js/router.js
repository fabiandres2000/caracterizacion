import { createRouter, createWebHistory } from 'vue-router'
import principal from './components/caracterizacion/principal';
import editarCaracterizacion from './components/caracterizacion/editarCaracterizacion';
import listaCaracterizados from './components/caracterizacion/listaCaracterizados';
import dashboard from './components/admin/dashboard';
import miPerfil from './components/miPerfil';

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
  },
  {
    path: '/lista-caracterizados',
    name: 'listaCaracterizados',
    component: listaCaracterizados
  },
  {
    path: '/editar-caracterizacion/:identificacion_editar',
    name: 'editarCaracterizacion',
    component: editarCaracterizacion,
    props: true
  },
  {
    path: '/mi-perfil',
    name: 'miPerfil',
    component: miPerfil
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router