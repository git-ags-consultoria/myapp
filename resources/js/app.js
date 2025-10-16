import './bootstrap'
import { createApp } from 'vue'
import TestComponent from '../components/TestComponent.vue'

const app = createApp({
    data() {
        return {
            sidebarOpen: false,
        }
    },
    methods: {
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen
        },
        closeSidebar() {
            this.sidebarOpen = false
        }
    }
})

app.component('test-component', TestComponent)
app.mount('#app')


import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();