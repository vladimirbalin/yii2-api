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
import httpService from "../services/http.service";

export default {
    name: "UserList",
    components: {User},
    data() {
        return {
            users: [],
            loading: false
        }
    },
    beforeMount() {
        this.loading = true;

        httpService.get('users')
            .then(({data}) => {
                this.users = data;
            })
            .catch((err) => {
                console.log(err)
            })
            .finally(() => {
                this.loading = false;
            });
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
