import {
    LOGIN,
    LOGOUT,
    PURGE_AUTH,
    REGISTER,
    SET_AUTH
} from "@/store/actions.type";
import httpService from "@/services/http.service";

const initialState = {
    user: JSON.parse(localStorage.getItem('user')) || {},
    isLoggedIn: !!localStorage.getItem('user'),
}

const state = {
    ...initialState
}

const actions = {
    async [LOGIN]({commit}, credentials) {
        const response = await httpService.post('auth/login', credentials);
        const user = response.data;

        commit(SET_AUTH, user);
    },
    [LOGOUT]({commit}) {
        localStorage.removeItem('user');
        commit(PURGE_AUTH);
    },
    async [REGISTER]({commit}, credentials) {
        const response = await httpService.post('auth/register', credentials);
        const user = response.data;

        commit(SET_AUTH, user);
    },
}
const mutations = {
    [SET_AUTH](state, user) {
        state.user = user;
        localStorage.setItem('user', JSON.stringify(user));
        state.isLoggedIn = true
    },
    [PURGE_AUTH](state) {
        state.user = {};
        state.isLoggedIn = false
    },
}

const getters = {
    isLoggedIn: state => state.isLoggedIn,
    getUser: state => state.user,
}

export default {
    state,
    actions,
    mutations,
    getters
};