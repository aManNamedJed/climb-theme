<template>
  <ul class="climb-list list-unstyled">
    <climb-card v-for="climb in climbs" :key="climb.id" :climb="climb"></climb-card>
  </ul>
</template>

<script>
import ClimbCard from './ClimbCard.vue';

export default {
  name: 'climb-list',
  mounted() {

  },
  components: { ClimbCard },
  data() {
    return {
      climbs: [
        {
          name: 'Deck Chairs on the Titanic'
        }
      ]
    }
  },
  methods: {

  }
}
</script>