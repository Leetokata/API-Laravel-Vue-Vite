import axios from 'axios'

const listApi = axios.create({
    baseURL: 'http://localhost:8000/api'
})

export default listApi