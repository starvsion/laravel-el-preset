<template>
    <el-menu router mode="horizontal" :default-active="$route.path">
        <el-menu-item v-if="hasLogin" :route="{name:'login'}" index="/login">Login</el-menu-item>
        <el-menu-item v-else :route="{name:'home'}" index="/home">Home</el-menu-item>
        <el-menu-item :route="{name:'welcome'}" index="/welcome">Welcome Page</el-menu-item>
        <el-menu-item v-if="hasRegister && ! hasLogin" :route="{name:'register'}" index="/register">Register</el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        name: "SpaNavigation",
        props: {
            hasLogin: {
                type: Boolean,
                default: true
            },
            hasRegister: {
                type: Boolean,
                default: true
            }
        },
    };
</script>

<style scoped>

</style>