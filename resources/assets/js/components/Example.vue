<template>
  <div class="example">
    {{ message }}
  </div>
</template>

<script>
export default {
  name: 'example',
  mounted() {
    alert('Mounted!');
  },
  data () {
    return {
      message: 'Vue templates are loading!'
    }
  },
  methods: {

  }
}
</script>