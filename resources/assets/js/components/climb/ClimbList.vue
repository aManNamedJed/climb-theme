<template>
  <div class="climb-list">
    <ul class="list-unstyled">
      <climb-card v-for="climb in climbs" :key="climb.id" :climb="climb"></climb-card>
    </ul>
  </div>
</template>

<script>
import ClimbCard from './ClimbCard.vue';

export default {
  name: 'climb-list',
  mounted() {
    this.getClimbs();
  },
  components: { ClimbCard },
  data() {
    return {
      climbs: []
    }
  },
  methods: {
    getClimbs: function() {
      this.$http.get('/wp-json/wp/v2/climbs?filter[meta_query][0][key]=climb_user&filter[meta_query][0][value]='+currentUser).then(response => {
        this.climbs = response.body;
        console.log({
          climbs: response.body
        });
      }, response => {
        // error callback
      });
    }
  }
}
</script>