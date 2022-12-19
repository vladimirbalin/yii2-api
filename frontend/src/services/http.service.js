import axios from "axios";
import authService from "@/services/auth.service";

const config = {
    baseURL: import.meta.env.VITE_API_ENDPOINT
}
const service = axios.create(config);

service.interceptors.request.use(function (config) {
    const token = authService.getToken();
    if (token) {
        config.headers = {
            Authorization: `Bearer ${authService.getToken()}`
        }
    }
    return config;
}, function (error) {
    return Promise.reject(error);
});

export default service;