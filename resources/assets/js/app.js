import Vue from 'vue';
import VueResource from 'vue-resource';
import ClimbList from './components/climb/ClimbList.vue';
import ClimbCard from './components/climb/ClimbCard.vue';

Vue.use(VueResource);

new Vue({
    el: '#content',
    components: { 
        ClimbList,
        ClimbCard
     }
});