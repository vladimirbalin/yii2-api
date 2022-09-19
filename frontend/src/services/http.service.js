import axios from "axios";

const config = {
    baseURL: import.meta.env.VITE_API_ENDPOINT
}
const service = axios.create(config);
// service.interceptors.request.use(function (config) {
//     config.headers = {
//         ...config.headers,
//         // Authorization: `Bearer ${authService.getToken()}`
//     }
//     return config;
// }, function (error) {
//     return Promise.reject(error);
// });
//
// // Add a response interceptor
// service.interceptors.response.use(function (response) {
//     // Any status code that lie within the range of 2xx cause this function to trigger
//     // Do something with response data
//     return response;
// }, function (error) {
//     // Any status codes that falls outside the range of 2xx cause this function to trigger
//     // Do something with response error
//     return Promise.reject(error);
// });
export default service;