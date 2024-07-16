import { createRouter, createWebHistory } from 'vue-router'
import EmployeeApp from '@/views/employeeViews/EmployeeApp.vue'
import DashBoard from '@/views/employeeViews/DashBoard.vue'
import Attendances from '@/views/employeeViews/Attendances.vue'
import LeaveReq from '@/views/employeeViews/LeaveReq.vue'
import Profile from '@/views/Profile.vue'
import HrPolicy from '@/views/employeeViews/HrPolicy.vue'
import LoginPage from '@/views/LoginPage.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginPage
    },
    {
      path: '/employee-app',
      name: 'employee-app',
      component: EmployeeApp,
      children: [
        {
          path: '/dashboard',
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
          path: '/policy',
          name: 'policy',
          component: HrPolicy
        },
        {
          path: '/profile',
          name: 'profile',
          component: Profile
        },
        
      ]
    },
    
  ]
});

export default router
