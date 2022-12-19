<template>
    <div class="form-wrapper">
        <h3>Login to see all users</h3>
        <form @submit.prevent="login" action="">
            <div v-if="errors" class="errors">
                <p v-for="(error, field) in errors" :key="field">
                    {{ error[0] }}
                </p>
            </div>
            <InputText v-model="form.username" placeholder="Your username"/>
            <InputText type="password" v-model="form.password" placeholder="Your password"/>
            <Button type="submit">Login</Button>
            <Button v-on:click="fillTestCredentials">Click to fill the form with test credentials</Button>
            <router-link to="/register" class="link">Click here to register</router-link>
        </form>
    </div>
</template>
<script>
import {LOGIN} from "@/store/actions.type";

export default {
    name: "Login",
    data() {
        return {
            form: {
                username: '',
                password: ''
            },
            errors: null
        }
    },
    methods: {
        async login() {
            try {
                await this.$store.dispatch(LOGIN, this.form);
                this.$router.push({name: 'home'});
            } catch (e) {
                this.errors = e.response.data.errors;
            }
        },
        fillTestCredentials(){
            this.form.username = 'test';
            this.form.password = 'test';
        }
    }
}
</script>
<style scoped>

h3 {
    font-size: 1.2rem;
}
.form-wrapper {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.form-wrapper form{
    width: 300px;
}
.p-inputtext{
    width: 100%;
}

input {
    margin: 5px;
}
.errors{
    color: red;
}
</style>
