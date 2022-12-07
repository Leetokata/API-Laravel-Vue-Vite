<template>
  <Table />
</template>

<script>
import { ref, defineAsyncComponent } from 'vue'

export default {
  components: {
        Table: defineAsyncComponent( ()=> import('../components/Table.vue'))
    },
}
</script>

<style>

</style>