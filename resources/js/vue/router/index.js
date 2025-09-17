import { createRouter, createWebHistory } from 'vue-router';
import chatPage from '../components/chat.vue';
import messagePage from '../components/message.vue';
import {defineAsyncComponent} from "vue";

const routes = [


    {
        path: '/',
        name: 'chat',
        component: chatPage,
        props: true,
    },
    {
        path:'/message/:sender_id/:receiver_id',
        name:'message',
        component:messagePage,
        props:true,
    }
];

const router = createRouter({
    history: createWebHistory('/admin/message-system'),
    routes,
});

export default router;
