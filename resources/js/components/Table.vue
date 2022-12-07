<template>
    <div class="col-8">
        <h1 class="text-primary ">Listas</h1>        
    </div>
    <div class="col-4">
        <button class="btn btn-outline-primary float-end" @click="$router.push({name: 'crearList'})">Crear Lista</button>
    </div>
    <div class="col-12">
        <div class="message-container text-center pb-2">
            <h4 v-if="isLoading" class="text-danger">Espere por favor...</h4>
            <h5 v-if="errorMessage">{{errorMessage}}</h5>
        </div>

        <table  class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th >Consecutivo</th>
                    <th>Nombre</th>
                    <th>Derecho Cultural</th>
                    <th>Nac</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Final</th>
                    <th>Experticia</th>
                    <th>Fecha</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="(lists.length > 0)">
                    <tr v-for="(list, index) in lists" :key="list.id">
                        <td scope="col">
                            {{(index + 1)}}
                        </td>
                        <td>{{ list.consecutive }}</td>
                        <td>{{ list.activity_name }}</td>
                        <td>{{ list.cultural.cultural }}</td>
                        <td>{{ list.nac.nac }}</td>
                        <td>{{ list.activity_date }}</td>
                        <td>{{ list.start_time }}</td>
                        <td>{{ list.final_hour }}</td>
                        <td>{{ list.expertise.expertise }}</td>
                        <td>{{ list.activity_date}}</td>
                        <td>
                            <button class="btn btn-warning btn-sm me-1" 
                                    @click="showList(list.id)">
                                <i class="bi bi-eye-fill"></i>
                            </button>
                            <button class="btn btn-info btn-sm me-1" 
                                    @click="editList(list.id)">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" @click="deleteList(list.id)">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>

                </template>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <button class="btn btn-outline-dark btn-sm" @click="prevPage">Atras</button> -
        <button class="btn btn-outline-dark btn-sm" @click="nextPage">Siguiente</button>&nbsp;
        <span>Pagina {{ currentPage }}</span>

        <span class="float-end">Total: {{totalList}}</span>
    </div>
</template>

<script>
import useList from '../composables/useList'

export default {
    setup(){
       
         const { 
            lists,
            prevPage,
            nextPage,
            currentPage,
            isLoading,
            errorMessage,
            showList,
            editList,
            deleteList,
            totalList,
            getLists
        } = useList()
         
        
        getLists()
        
         return {
            lists,
            showList,
            editList,
            deleteList,
            prevPage,
            nextPage,
            currentPage,
            isLoading,
            errorMessage,
            totalList,
            getLists
         }
    }
}
</script>

<style>

</style>