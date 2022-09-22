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
      component: DashboardView,
      meta: { authOnly: true }
    },
    {
      path: '/',
      name: 'surveyView',
      component: SurveyView
    },
    {
      path: '/response/:url',
      name: 'response',
      component: ResponseView,
      props: true
    },
  ]
})

function isLoggedIn() {
  return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.authOnly)) {
    if (!isLoggedIn()) {
      next({
        path: "/login",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.guestOnly)) {
    if (isLoggedIn()) {
      next({
        path: "/administration",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router
