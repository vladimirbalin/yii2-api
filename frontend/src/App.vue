<script setup>
import {RouterView} from 'vue-router'
</script>

<template>
    <div>
        <RouterView/>
    </div>
</template>

<style>
.form-wrapper {
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.form-wrapper form{
    min-width: 300px;
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
