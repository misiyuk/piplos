import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Contacts from './views/Contacts.vue'
import Category from './views/Catalog/Category.vue'
import Product from './views/Catalog/Product.vue'
import Thank from './views/Thank.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/contacts',
      name: 'contacts',
      component: Contacts
    },
    {
      path: '/thank',
      name: 'contacts_thank',
      component: Thank
    },
    {
      path: '/:slug.html',
      name: 'product',
      component: Product
    },
    {
      path: '/:slug',
      name: 'category',
      component: Category
    },
  ]
})
