import {
    FETCH_USERS,
    SET_USERS
} from "@/store/actions.type";
import httpService from "@/services/http.service";

const initialState = {
    users: []
}

const state = {
    ...initialState
}

const actions = {
    async [FETCH_USERS]({commit}, credentials) {
        const response = await httpService.get('users');
        const users = response.data;

        commit(SET_USERS, users);
    },
}
const mutations = {
    [SET_USERS](state, users) {
        state.users = users;
    },
}

const getters = {
    getUsers: state => state.users,
}

export default {
    state,
    actions,
    mutations,
    getters
};