import Vuex from "vuex";
import auth from '@/store/auth.module';
import users from '@/store/users.module';

const store = new Vuex.Store({
    modules: {
        auth,
        users
    }
})

export default store;