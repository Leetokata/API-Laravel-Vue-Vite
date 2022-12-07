
import { createRouter, createWebHashHistory } from 'vue-router'


const routes = [
    {
        path: '/',
        name: 'home',
        component: () => import(/* webpackChunkName: "Home" */ '../components/Home.vue')
    },
    {
      path: '/crear',
      name: 'crearList',
      component: () => import(/* webpackChunkName: "Crear" */ '@/views/Crear.vue')
    },
    {
      path: '/edit/:id',
      name: 'edit-id',
      component: () => import(/* webpackChunkName: "Edit" */ '@/views/Edit.vue')
    },
    {
      path: '/show/:id',
      name: 'show-id',
      component: () => import(/* webpackChunkName: "Show" */ '@/views/Show.vue')
    },
   
    
    
  ]


  const router = createRouter({
    history: createWebHashHistory(),
    routes
  })
  
  export default router