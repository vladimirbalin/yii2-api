<template>
    <tr>
        <td>{{ user.id }}</td>
        <td>{{ user.email }}</td>
        <td>{{ user.username }}</td>
        <td>{{ user.phone }}</td>
        <td>{{ user.password_hash }}</td>
    </tr>
</template>

<script>
export default {
    name: "User",
    props: {
        user: {
            type: Object,
            required: true
        }
    },
}
</script>