import VueRouter from 'vue-router';
import Posts from './components/Posts';
import Post from './components/Post';

const routes = [
    {
        path: '/posts/view/:tag?', 
        component: Posts,
        props: true
    },
    {
        path: '/post/view/:id', 
        component: Post,
        props: true
    }
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

export default router;