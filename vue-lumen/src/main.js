import Vue from 'vue'
import App from './App.vue'
//import Vue Router
import VueRouter from 'vue-router'

//menggunkan Vue Router di Vue JS
Vue.use(VueRouter);

//import components
import PostsIndex from './components/posts/PostIndex.vue'
import PostsCreate from './components/posts/PostCreate.vue'
import PostsEdit from './components/posts/PostEdit.vue'

Vue.config.productionTip = false

const router = new VueRouter({
  routes: [
    {
      path: '/',
      name: 'posts-index',
      component: PostsIndex
    },
    {
      path: '/create-aja',
      name: 'post-create',
      component: PostsCreate
    },
    {
      path: '/edit/:id',
      name: 'post-edit',
      component: PostsEdit
    }
  ],
  mode: 'history'
})

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')