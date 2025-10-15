import './bootstrap'
import { createApp } from 'vue'
import TestComponent from '../components/TestComponent.vue'

// cria a instância principal do Vue
const app = createApp({})

// registra o componente globalmente
app.component('test-component', TestComponent)

// monta o Vue dentro da div com id="app"
app.mount('#app')


import './bootstrap';
import { createApp } from 'vue';

const app = createApp({
    data() {
        return {
            sidebarOpen: false,
        };
    },
    methods: {
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        },
        closeSidebar() {
            this.sidebarOpen = false;
        }
    }
});

app.mount('#admin-app');
