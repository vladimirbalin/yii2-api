<template>
    <div class="form-wrapper">
        <h3>Register</h3>
        <form @submit.prevent="register" action="">
            <div v-if="errors" class="errors">
                <p v-for="(error, field) in errors" :key="field">
                    {{ error[0] }}
                </p>
            </div>
            <InputText type="text" v-model="form.username" placeholder="Your name"/>
            <InputText type="text" v-model="form.email" placeholder="Your email"/>
            <InputText type="password" v-model="form.password" placeholder="Your password"/>
            <InputText type="password" v-model="form.password_confirm" placeholder="Repeat password"/>
            <Button type="submit">Register</Button>
            <router-link to="/login" class="link">Click here to login</router-link>
        </form>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            form: {
                username: '',
                email: '',
                password: '',
                password_confirm: ''
            },
            errors: null
        }
    },
    methods: {
        async register(e) {
            e.preventDefault();
            try {
                await this.$store.dispatch('register', this.form);
                this.$router.push('home');
            } catch (err) {
                this.errors = err.response.data.errors;
            }
        }
    }
}
</script>

<style>
.form-wrapper {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}

.form-wrapper form {
    width: 300px;
}

.p-inputtext {
    width: 100%;
}

input {
    margin: 5px;
}

.errors {
    color: red;
}
</style>