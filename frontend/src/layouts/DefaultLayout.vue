<script setup>
import Navbar from "../components/Navbar.vue";
</script>

<template>
    <header>
        <Navbar/>
    </header>

    <RouterView/>
</template>

<style scoped>

header {
    line-height: 1.5;
    max-width: 100vw;
}

</style>