<template>

<button v-if="!btnLoading"  
        type="button" 
        :class="btnClass"
        class="btn float-end" 
        @click="$emit('press')">
    <template v-if="action === 'editar'">Actualizar</template>
    <template v-else>Guardar</template>
</button>

<button v-else 
        class="btn float-end" 
        :class="btnClass"
        type="button" 
        disabled>
    <span class="spinner-border spinner-border-sm" 
          role="status" 
          aria-hidden="true">
    </span>
    <span class="ms-2">
        <template v-if="action === 'editar'">Actualizando...</template>
        <template v-else>Guardando...</template>
        
    </span>
</button>



</template>

<script>

import { ref } from 'vue';
export default {

    props:{
        btnLoading:{
            type: Boolean,
            required: true
        },
        action:{
            type: String    
        }
    },
    setup(props){
        
        const btnClass = ref('btn-primary')
        //btn-success

        const getBtnClass = ()=> {
            if(props.action === 'crear'){
                btnClass.value = 'btn-success'
                return
            }
            btnClass.value = 'btn-primary'
        }

        getBtnClass()

        return {
            props,
            btnClass
        }
    }

}
</script>

