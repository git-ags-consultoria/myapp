import './bootstrap';
import {createApp} from "vue";
import TestComponent from '../components/TestComponent.vue'

import App from './App.vue';
createApp(App).mount('#app');

const app = createApp({})

// registra o componente globalmente
app.component('test-component', TestComponent)

// monta o app Vue dentro da div com id "app"
app.mount('#app')