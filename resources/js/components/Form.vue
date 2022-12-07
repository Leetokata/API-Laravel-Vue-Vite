<template>
  
  <div class="col-6 offset-3  form-container pt-3">
    <div class="message-container">
      
      <h4 class="text-danger text-center" v-if="errorMessage">
        {{ errorMessage }}
      </h4>
    </div>
      
    <form action="">
        <div class="row ">
          <div class="col-5 offset-1">
            <label for="">Nombre Actividad</label>
            <input type="text" class="form-control" v-model="formData.nombre">
          </div>
          <div class="col-4 offset-1 ">
            <label for="">Fecha</label>
            <input type="date" class="form-control" v-model="formData.fecha">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-5 offset-1">
            <label for="">Hora de inicio</label>
            <input type="time" class="form-control" v-model="formData.start">
          </div>
          <div class="col-4 offset-1 ">
              <label for="">Hora Final</label>
              <input type="time" class="form-control" v-model="formData.final"> 
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-5 offset-1">
              <label for="">Derechos Culturales</label>
              <select v-model="formData.cultural" v-if="(culturals.length > 0)" required class="form-control">
              
                <option :value="cult.id" v-for="cult in culturals" :key="cult.id">{{ cult.cultural }}</option>
                  
              </select>
          </div>
          <div class="col-4 offset-1 ">
              <label for="">Nac</label>
              <select v-model="formData.nac" required class="form-control" v-if="(nacs.length > 0)"> 
                <!-- <option value="" hidden>-- Seleccionar -- </option> -->
                <option :value="nac.id" v-for="nac in nacs" :key="nac.id">{{ nac.nac }}</option>
              </select>
              
          </div>
        </div>

        <div class="row mt-3 pb-5">
          <div class="col-5 offset-1">
            <label for="">Experticias</label>
            <select v-model="formData.expertise" v-if="(expertises.length > 0)" class="form-control">
              <!-- <option value="" hidden>-- Seleccionar -- </option> -->
              <option :value="exp.id" v-for="exp in expertises" :key="exp.id">{{ exp.expertise }}</option>
              
            </select>
          </div>
        </div>

        <div class="row pb-5">
          <div class="col-10 offset-1">
            
            <button @click="$router.go(-1)" type="button" class="btn btn-info float-start">Regresar</button>
  
            <Buttom :btnLoading="isLoading" :action="action" v-on:press="pressed(action)" />

          </div>

        </div>
        
    </form>
  </div>
</template>

<script>
import useForm from '../composables/useForm'
import { ref } from 'vue'
import Buttom from '@/components/Buttom.vue'
import useList from '@/composables/useList';
import { useRoute } from 'vue-router'

export default {
  props:{
    action: {
      type: String,
      required: true
    },
    list: {
      type: Object,
      default: {}
    }
  },
  components: {
    Buttom
  },
  setup(props){
   
    const route = useRoute()

    const { 
            nacs,
            expertises,
            culturals,
            formData,
            pressed,
            errorMessage,
            isLoading,
            formMode
        } = useForm()
    
    formMode( route.params.id, props.action )  


     return {
            nacs,
            expertises,
            pressed,
            culturals,
            formData,
            errorMessage,
            isLoading,
     }
  }
}
</script>

<style>

</style>