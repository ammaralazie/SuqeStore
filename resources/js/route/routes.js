import Vue from "vue"
import VueRouter from "vue-router"

Vue.use(VueRouter)


//1-this section to import components
import homePage from '../components/HomeComponent.vue'

const routes=[
    {
        path:'/',
        component:homePage,
        name:"homePage"
    },
]

//2-this section for create object from vue-router
const router=new VueRouter({
    routes,
    hashbang:false,
    mode: 'history',
})


//3-this section to export vue-router

export default router
