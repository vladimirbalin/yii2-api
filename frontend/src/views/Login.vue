<template>
    <div class="form-wrapper">
        <h3>Login to see all users</h3>
        <form @submit.prevent="login" action="">
            <div v-if="errors" class="errors">
                <p v-for="(error, field) in errors" :key="field">
                    {{error[0]}}
                </p>
            </div>
            <input type="text" v-model="form.username" placeholder="Your username"><br>
            <input type="password" v-model="form.password" placeholder="Your password"><br>
            <button>Login</button>
            <Button label="Secondary" class="p-button-secondary"></Button>
            <Button label="Primary" class="p-button-raised p-button-rounded" />

            <router-link to="/register" class="link">Click here to register</router-link>
        </form>
    </div>
</template>
<script>
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
            // const {success, errors} = await authService.login(this.form);
            // if (success) {
            //     this.$router.push({name: 'home'});
            // } else {
            //     this.errors = errors;
            // }
        }
    }
}
</script>
<style scoped>
h1 {
    font-weight: 500;
    font-size: 2.6rem;
    top: -10px;
}

h3 {
    font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
    text-align: center;
}

@media (min-width: 1024px) {
    .greetings h1,
    .greetings h3 {
        text-align: left;
    }
}
</style>
