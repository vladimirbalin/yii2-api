<template>
    <div class="user-list">
        <div v-if="loading"><h1>LOADING</h1></div>
        <table v-if="!loading">
            <tr>
                <th>id</th>
                <th>email</th>
                <th>username</th>
                <th>phone</th>
                <th>password_hash</th>
            </tr>
            <tr v-for="(user, index) in users" key="{{index}}">
                <td>{{ user.id }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.username }}</td>
                <td>{{ user.phone }}</td>
                <td>{{ user.password_hash }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            users: [],
            loading: false
        }
    },
    async beforeMount() {
        this.loading = true;
        await fetch(import.meta.env.VITE_API_ENDPOINT + 'users')
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                this.users = data;
            });
        this.loading = false;
    }
}
</script>
<style>
@media (min-width: 1024px) {
    .user-list {
        min-height: 100vh;
    }
}
</style>
