import { createRouter, createWebHistory } from 'vue-router'
import Homeview from '@/views/Homeview.vue'
import Contactview from '@/views/Contactview.vue'
import Aboutview from '@/views/Aboutview.vue'
import Galleryview from '@/views/Galleryview.vue'
import SignInview from '@/views/SignInview.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Homeview
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contactview
    },
    {
      path: '/about',
      name: 'about',
      component: Aboutview
    },
    {
      path: '/gallery',
      name: 'gallery',
      component: Galleryview
    },
    {
      path: '/sign-in',
      name: 'signin',
      component: SignInview,
      meta:{
        requiresAuth:false
      }
    },
   
  ]
})

router.beforeEach((to, from) => {
  if (to.meta.requiresAuth && !localStorage.getItem('token')) {
    return { name : 'signin'}
  }
  if (to.meta.requiresAuth == false && localStorage.getItem('token')) {
    return { name : 'home'}
  }
  if (to.meta.requiresAuth && localStorage.getItem('token')) {
    setAuthHeader(localStorage.getItem('token'))
  }
})


export default router
