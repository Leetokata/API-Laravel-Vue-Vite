
import { ref } from 'vue'
import listApi from '../api/ListApi'
import { useRouter } from 'vue-router';



const useList = () => {
    const lists = ref([])
    const list = ref([])
    const isLoading = ref(false)
    const errorMessage  = ref(null)
    const currentPage  = ref(1)
    const router = useRouter();
    const totalList = ref(0);
    const listToEdit = ref([]);

    const getLists = async ( page = 1)=> {
        if( page <= 0 ) page = 1

        isLoading.value = true


        const  { data } = await listApi.get('/lista', { params: { page }})
        
        if(data.data.length > 0 ){
            lists.value = data.data
            totalList.value = data.total

            currentPage.value = page
            errorMessage.value =  null

        }else if( currentPage.value > 0){
              errorMessage.value =  'No hay mas listas'
        }

        isLoading.value = false
    }

   

    const getListToEdit = async (id) => {
       
        const  { data } = await listApi.get(`/lista/getlist/${id}`)
    
        return data;

    }

    const getListToShow = async (id)=>{
        const  { data } = await listApi.get(`/lista/${id}`)
        list.value =  data
    }
    
    const deleteList = async (id) => {
        
        
        if(confirm('¿Estas seguro que deseas eliminar la lista?'))
        {
            const { data } = await listApi.delete(`/lista/${id}`)
            
            if(data.error){
                router.push({name: 'home'})
            }
            
            lists.value = lists.value.filter( list => list.id !== id)
        }
    }

    return {
        isLoading,
        lists,
        nextPage: ()   =>  getLists( currentPage.value + 1),
        prevPage: ()   =>  getLists( currentPage.value - 1),
        showList: (id) => router.push({name: 'show-id', params: { id }}),
        editList: (id) => router.push({name: 'edit-id', params: { id }}),
        deleteList,
        currentPage,
        errorMessage,
        totalList,
        listToEdit,
        getListToEdit,
        getListToShow,
        getLists, 
        list
    }
}

export default useList