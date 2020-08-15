import Vue from 'vue';
import App from './components/product.vue';
import Feedback from './components/Feedback';
const VueInputMask = require('vue-inputmask').default;

Vue.use(VueInputMask)

new Vue({
    render: h => h(App)
}).$mount('#products');

new Vue({
    render: h => h(Feedback)
}).$mount('#feedback-header');

new Vue({
    render: h => h(Feedback)
}).$mount('#feedback-body');

new Vue({
    render: h => h(Feedback)
}).$mount('#feedback-footer');

