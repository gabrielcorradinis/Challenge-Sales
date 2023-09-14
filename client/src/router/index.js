// Composables
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    component: () => import('@/layouts/default/Default.vue'),
    children: [
      {
        path: 'home',
        name: 'Home',
        component: () => import('@/views/Home.vue'),
      },
      {
        path: 'new-seller',
        name: 'New Seller',
        component: () => import('@/views/NewSeller.vue'),
      },
      {
        path: 'sellers',
        name: 'Sellers',
        component: () => import('@/views/Sellers.vue'),
      },
      {
        path: 'new-sale',
        name: 'New Sale',
        component: () => import('@/views/NewSale.vue'),
      },
      {
        path: 'sales',
        name: 'Sales',
        component: () => import('@/views/Sales.vue'),
      },
    ],
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

export default router
