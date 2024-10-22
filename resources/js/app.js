import './bootstrap';
import { createApp } from 'vue';
import Example from './components/Example.vue';

console.log('Vite is working!');

const app = createApp({
    components: {
        Example,
    }
})

app.mount('#app');

