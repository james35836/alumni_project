import Vue from 'vue'
import Router from 'vue-router'
import GLoaderComponent from './components/globals/GLoaderComponent.vue'


import Home from './views/front/Home.vue'
import About from './views/front/About.vue'
import Login from './views/front/Login.vue'

import Register from './views/front/Register.vue'
import Contact from './views/front/Contact.vue'
import Event from './views/front/Event.vue'

import Dashboard from './views/admin/Dashboard.vue'


import Announcement from './views/member/Announcement.vue'
import AlumniDirectory from './views/member/AlumniDirectory.vue'
import FacultyDirectory from './views/member/FacultyDirectory.vue'
import ChatRoom from './views/member/ChatRoom.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [

    { path: '/home', name: 'home', component: Home },
    { path: '/about', name: 'about', component: About },
    { path: '/contact', name: 'contact', component: Contact },
    { path: '/event', name: 'event', component: Event },
    { path: '/login', name: 'login', component: Login },
    { path: '/register', name: 'register', component: Register },
    { path: '/initialize', name: 'initialize', component: GLoaderComponent },


    { path: '/member/log', name: 'member/log', component: Dashboard},
    { path: '/member/alumni-directory', name: 'member/alumni-directory', component: AlumniDirectory},
    { path: '/member/faculty-directory', name: 'member/faculty-directory', component: FacultyDirectory},
    { path: '/member/messages', name: 'member/messages', component: ChatRoom},
    { path: '/member/announcement', name: 'announcement', component: Announcement},

    { path: '/admin/dashboard', name: 'dashboard', component: Dashboard},
    ]
})
