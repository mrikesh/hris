import { createRouter, createWebHistory } from 'vue-router'
import EmployeeApp from '@/views/employeeViews/EmployeeApp.vue'
import DashBoard from '@/views/employeeViews/DashBoard.vue'
import Attendances from '@/views/employeeViews/Attendances.vue'
import LeaveReq from '@/views/employeeViews/LeaveReq.vue'
import Profile from '@/views/Profile.vue'
import HrPolicy from '@/views/employeeViews/HrPolicy.vue'
import LoginPage from '@/views/LoginPage.vue'

import AdminApp from '@/views/adminViews/AdminApp.vue'
import AdminDashboard from '@/views/adminViews/AdminDashboard.vue'
import AdminAttendance from '@/views/adminViews/AdminAttendance.vue'
import AdminEmployee from '@/views/adminViews/AdminEmployee.vue'
import AdminDepartment from '@/views/adminViews/AdminDepartment.vue'
import AdminPosition from '@/views/adminViews/AdminPosition.vue'
import AdminLeave from '@/views/adminViews/AdminLeave.vue'

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

    {
      path: '/admin-app',
      name: 'admin-app',
      component: AdminApp,
      children: [
        {
          path: '/ad-dashboard',
          name: 'ad-dashboard',
          component: AdminDashboard
        },
        {
          path: '/ad-employee',
          name: 'ad-employee',
          component: AdminEmployee
        },
        {
          path: '/ad-department',
          name: 'ad-department',
          component: AdminDepartment
        },
        {
          path: '/ad-position',
          name: 'ad-position',
          component: AdminPosition
        },
        {
          path: '/ad-attendance',
          name: 'ad-attendances',
          component: AdminAttendance
        },
        {
          path: '/ad-leave',
          name: 'ad-leave',
          component: AdminLeave
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
