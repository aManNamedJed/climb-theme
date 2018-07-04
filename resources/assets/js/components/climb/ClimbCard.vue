<template>
    <li class="card-climb card">
        <div class="card-body">
            {{ climb.name }}
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

  }
}
</script>