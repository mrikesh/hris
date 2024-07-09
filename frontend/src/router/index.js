import { createRouter, createWebHistory } from 'vue-router'
import DashBoard from '../views/DashBoard.vue'
import Attendances from '../views/Attendances.vue'
import LeaveReq from '../views/LeaveReq.vue'
import Profile from '../views/Profile.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'dashboard',
      component: DashBoard
    },
    {
      path: '/attendances',
      name: 'attendances',
      component: Attendances
    },
    {
      path: '/leave',
      name: 'leave',
      component: LeaveReq
    },
    {
      path: '/profile',
      name: 'profile',
      component: Profile
    },
  ]
})

export default router
