<template>
  <h4 class="text-primary">Ver Lista</h4>
  <div class="row justify-content-center">
    <div class="col-lg-6  pb-4">
        <div class="card border-primary">
          <div class="card-header">
              <strong>Lista {{ list?.consecutive }}</strong>
          </div>
          <div class="card-body card-container text-primary">
            <div class="row">
              <div class="col-12 pb-2">
                <strong>Consecutivo:</strong>
                <span class="text-dark ms-2">{{ list?.consecutive}}</span>
              </div>
              <div class="col-12 pb-2">
                <strong>Nombre:</strong>
                <span class="text-dark ms-2">{{ list?.activity_name }}</span>
              </div>
              <div class="col-12 pb-2">
                <strong>Derecho Cultural:</strong>
                <span class="text-dark ms-2" >{{ list?.cultural?.cultural }}</span>
              </div>
              <div class="col-12 pb-2">
                <strong>Nac:</strong>
                <span class="text-dark ms-2" >{{ list?.nac?.nac }}</span>
              
              </div>
              <div class="col-12 pb-2">
                <strong>Expertise:</strong>
                <span class="text-dark ms-2">{{ list?.expertise?.expertise }}</span>
              </div>
              <div class="col-12 pb-2">
                <strong>Hora Inicio:</strong>
                <span class="text-dark ms-2">{{ list?.start_time }}</span>
                <i class="bi bi-stopwatch ms-1"></i>
              </div>
              <div class="col-12 pb-2">
                <strong>Hora Final:</strong>
                <span class="text-dark ms-2">{{ list?.final_hour }}</span>
                <i class="bi bi-stopwatch-fill ms-1"></i>
              </div>
              <div class="col-12 pb-2">
                <strong>Fecha:</strong>
                <span class="text-dark ms-2">{{ list?.activity_date }}</span>
                <i class="bi bi-calendar3 ms-1"></i>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 text-center">
      <button @click="$router.go(-1)" type="button" class="btn btn-info float-center">Regresar</button>
  
    </div>
  </div>
  

</template>

<script>
import useList from '@/composables/useList';
import { useRoute } from 'vue-router';

export default {

  setup(){
    const { getListToShow, list } = useList()
    const route = useRoute()

    getListToShow(route.params.id)

    return {
      list
    }
  }
}
</script>

<style>

</style>