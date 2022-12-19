<template>
    <nav>
        <router-link to="/">Home</router-link>
        <div v-if="!isLoggedIn" class="move-right">
            <router-link to="/login">Login</router-link>
            <router-link to="/register">Register</router-link>
        </div>
        <div v-if="isLoggedIn" class="move-right">
            <a href="/logout" @click="logout">Logout</a>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    computed: {
        isLoggedIn: function () {
            return this.$store.getters.isLoggedIn;
        }
    },
    methods: {
        logout: function (e) {
            e.preventDefault();
            this.$store.dispatch('logout')
            this.$router.push('login')
        }
    }
}
</script>

<style scoped>

nav {
    width: 100%;
    font-size: 12px;
    text-align: center;
    margin-top: 2rem;
}

nav a.router-link-exact-active {
    color: var(--color-text);
}

nav a.router-link-exact-active:hover {
    background-color: transparent;
}

nav a {
    display: inline-block;
    padding: 0 1rem;
    border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
    border: 0;
}

.move-right {
    float: right;
}

@media (min-width: 1024px) {
    header {
        display: flex;
        place-items: center;
        padding-right: calc(var(--section-gap) / 2);
    }

    header .wrapper {
        display: flex;
        place-items: flex-start;
        flex-wrap: wrap;
    }

    nav {
        text-align: left;
        font-size: 1rem;

        padding: 1rem 0;
        margin-top: 1rem;
    }
}
</style>