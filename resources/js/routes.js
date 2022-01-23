const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const fofocasList = () => import('./components/fofocas/List.vue' /* webpackChunkName: "resource/js/components/fofocas/list" */)
const fofocasCreate = () => import('./components/fofocas/Add.vue' /* webpackChunkName: "resource/js/components/fofocas/add" */)
const fofocasEdit = () => import('./components/fofocas/Edit.vue' /* webpackChunkName: "resource/js/components/fofocas/edit" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'fofocasList',
        path: '/fofocas',
        component: fofocasList
    },
    {
        name: 'fofocasEdit',
        path: '/fofocas/:id/edit',
        component: fofocasEdit
    },
    {
        name: 'fofocaAdd',
        path: '/fofocas/add',
        component: fofocasCreate
    }
]
