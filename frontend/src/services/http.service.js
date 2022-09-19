import axios from "axios";

const config = {
    baseURL: import.meta.env.VITE_API_ENDPOINT
}
const service = axios.create(config);

export default service;