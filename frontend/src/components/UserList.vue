<template>
    <div class="user-list">
        <table class="user-list">
            <tr class="user-list__header">
                <th>id</th>
                <th>email</th>
                <th>username</th>
                <th>phone</th>
                <th>password_hash</th>
            </tr>
            <user v-for="(user, index) in users" :key="index" :user="user"/>
        </table>
        <div class="loading" v-if="loading"><h1>LOADING</h1></div>
    </div>
</template>

<script>
import User from "./User.vue";
import {FETCH_USERS} from "@/store/actions.type";

export default {
    name: "UserList",
    components: {User},
    data() {
        return {
            users: [],
            loading: false
        }
    },
    async beforeMount() {
        this.loading = true;
        await this.$store.dispatch(FETCH_USERS)
        this.loading = false;

        this.users = this.$store.getters.getUsers;
    }
}
</script>
<style>
@media (min-width: 1024px) {
    .user-list {
        min-width: 80vw;
        text-align: center;
    }

    .user-list__header {
        font-size: 25px;
    }

    .loading {
    }
}
</style>
