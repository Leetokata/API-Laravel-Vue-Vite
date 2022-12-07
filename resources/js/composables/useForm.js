
import { ref } from 'vue'
import listApi from '../api/ListApi'
import { useRouter, useRoute } from 'vue-router';

import useList from '@/composables/useList';


const useForm = () => {
    const isLoading = ref(false)
    const nacs = ref([])
    const expertises = ref([])
    const culturals = ref([])
    const formData = ref({
         "nac": null,
         "expertise": null,
         "cultural" : null,
         "nombre" : null,
         "fecha" : null,
         "start" : null,
         "final" : null
    })

  
    const { getListToEdit } = useList()
    
    const errorMessage = ref(null)
    const router = useRouter();
    const route = useRoute();


    const getNac = async ()=> {
        const  { data } = await listApi.get('/nac')
        nacs.value = data
    }

    const getExpertises = async ()=> {
        const { data } = await listApi.get('/expertise')
        expertises.value = data
    }

    const getCulturals = async ()=> {
        const  { data } = await listApi.get('/cultural')
        culturals.value = data
    }

    const saveList = async () => {
        
        const validate = validationData()
        
        if(!validate){  
            errorMessageTime('Debe llenar todos los campos') 
            return false
        }
        isLoading.value = true

        try {
             const  { data }= await listApi.post('/lista',  { 
                 activity_name      : formData.value.nombre,
                 cultural_right_id  : formData.value.cultural,
                 nac_id             : formData.value.nac,
                 activity_date      : formData.value.fecha,
                 start_time         : formData.value.start,
                 final_hour         : formData.value.final,
                 expertise_id       : formData.value.expertise,
              } )
            
              if( data.error ){
                  errorMessageTime(data.error)
                  isLoading.value = false

                  return false
              }

         } catch (error) {
            errorMessageTime('Ocurrio un error, vuelva a intentar.')
         }  
        
         isLoading.value = false
         router.push({name: 'home'})
        
    }

    const validationData = ()=> {
        const values = Object.values(formData.value)
        const result = values.filter(row => !row)

        if(result.length > 0 ) { return false }

        return true
    }

    const errorMessageTime = async (error) => {
        
        errorMessage.value = error

        setTimeout(() => { errorMessage.value = null }, 2000);

    }

    const pressed = (action )=>{
       
      if(action === 'crear'){
        saveList()
        return 
      }
      updateList()
   
    }

    const formMode = async ( id , action ) => {
        if(action === 'editar'){
          const data = await getListToEdit(id)
          
          formData.value.nombre     = data.activity_name
          formData.value.cultural   = data.cultural_right_id
          formData.value.nac        = data.nac_id
          formData.value.start      = data.start_time
          formData.value.fecha      = data.activity_date
          formData.value.expertise  = data.expertise_id
          formData.value.final      = data.final_hour
        }
      }

  
    const updateList = async ()=>{

        const validate = validationData()
        
        if(!validate){  
            errorMessageTime('Debe llenar todos los campos') 
            return false
        }

        isLoading.value = true

        try {
            const { data } = await listApi.put(`/lista/${route.params.id}`, formData.value )

            if( data.error ){
                errorMessageTime(data.error)
                isLoading.value = false
                return false
            }

        } catch (error) {
           errorMessageTime('Ocurrio un error, vuelva a intentar.')
        }  
       
        isLoading.value = false
        router.push({name: 'home'})
    }
  
    getNac()
    getExpertises()
    getCulturals()
    
    return {
        nacs,
        expertises,
        culturals,
        formData,
        pressed,
        errorMessage,
        isLoading,
        formMode
  
    }
}

export default useForm