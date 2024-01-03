<script>


export default{
    name:'Login'
}
</script>

<template>
    <h1>Login Page</h1>
    <img src="" alt="">
    <input type="text" v-model="email" placeholder="admin@ps.com">
    <input type="password" v-model="password" placeholder=".....">
    <button v-on:click="singin">Sing in</button>
</template>
