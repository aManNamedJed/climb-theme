import Vue from 'vue';
import ClimbList from './components/climb/ClimbList.vue';
import ClimbCard from './components/climb/ClimbCard.vue';

new Vue({
    el: '#content',
    components: { 
        ClimbList,
        ClimbCard
     }
});