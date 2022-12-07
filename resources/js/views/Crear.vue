<template>
  <h3>Crear Lista</h3>
  <Form action="crear" />
</template>

<script>
import {  defineAsyncComponent } from 'vue'

export default {
    components: {
        Form: defineAsyncComponent( ()=> import('@/components/Form.vue'))
    },
    
}
</script>

<style>

</style>