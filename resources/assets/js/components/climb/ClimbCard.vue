<template>
    <li class="card-climb card">
        <div class="card-body">
            <h3 class="text-muted h5 mb-2">{{ climb.title.rendered }}</h3>
            <h4 class="mb-1 grade h6">{{ convertRating( climb.acf.climb_rating )}}</h4>            
            <h4 class="mb-1 grade h6 text-capitalize">{{ climb.acf.climb_indoor_outdoor }}</h4>                      
        </div>
    </li>
</template>

<script>
export default {
  name: 'climb-card',
  props: ['climb'],
  mounted() {

  },
  methods: {
      convertRating(rating) {
          var ratings = {
              '5.4': '5.4',
              '5.5': '5.5',
              '5.6': '5.6',
              '5.7': '5.7',
              '5.8': '5.8',
              '5.9': '5.9',
              '5.10': '5.10a',
              '5.11': '5.10b',
          }

          return ratings[rating];
      }
  }
}
</script>