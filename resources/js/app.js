



import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';


import * as VueRouter from 'vue-router'
import Create from './components/employee/Create.vue';
import Edit from './components/employee/Edit.vue';
const routes = [
    {path: '/create_employee', component: Create , name: 'CreateEmployee'},
    {path: '/edit_employee', component: Edit , name: 'EditEmployee'},
]; 


const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes
});

const app = createApp({
    components: {
        App,
    }
});

app.use(router);
router.isReady().then(()=>app.mount("#app"));





