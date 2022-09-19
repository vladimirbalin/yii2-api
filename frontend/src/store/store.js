import Vuex from "vuex";
import auth from '@/store/auth.module';

const store = new Vuex.Store({
    modules: {
        auth,
    }
})

export default store;