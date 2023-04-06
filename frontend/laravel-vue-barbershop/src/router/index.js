import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Main',
      component: () => import('../views/main/Index.vue')
    },
    {
      path: '/services',
      name: 'Services',
      component: () => import('../views/services/Index.vue')
    },
    {
      path: '/reservation',
      name: 'Reservation',
      component: () => import('../views/reservation/Index.vue')
    },
    {
      path: '/reservation/details/:id',
      name: 'Details',
      component: () => import('../views/reservation/Details.vue'),
    },
    {
      path: '/masters',
      name: 'Masters',
      component: () => import('../views/masters/Index.vue')
    },
    {
      path: '/gallery',
      name: 'Gallery',
      component: () => import('../views/gallery/Index.vue')
    },
  ]
})

export default router
