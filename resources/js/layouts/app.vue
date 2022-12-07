<template>

    <div class="container-fluix margin-container pt-4">

        <div class="row">
            <router-view/>
                
            
        </div>

    </div>
  
</template>
  
<script>

import { ref, defineAsyncComponent } from 'vue'
import useList from '../composables/useList'

export default {
    components: {
        Table: defineAsyncComponent( ()=> import('../components/Table.vue'))
    },
    setup(){

      
    }
 }
</script>
  
<style>
  
</style>