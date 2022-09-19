import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/LoginView.vue';
import DashboardView from '../views/admin/DashboardView.vue'
import SurveyView from '../views/SurveyView.vue'
import ResponseView from '../views/ResponseView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/administration',
      name: 'administration',
      component: DashboardView
    },
    {
      path: '/',
      name: 'surveyView',
      component: SurveyView
    },
    {
      path: '/response',
      name: 'response',
      component: ResponseView
    },
  ]
})

export default router
