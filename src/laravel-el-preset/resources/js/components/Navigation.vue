<template>
    <el-menu :default-active="activeIndex" mode="horizontal" @select="redirect">
        <el-menu-item index="/">Home</el-menu-item>
        <el-menu-item v-if="hasLogin" index="/login">Login</el-menu-item>
        <el-menu-item v-if="hasRegister" index="/register">Register</el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        name: "Navigation",
        props: {
            hasLogin: {
                type: [Boolean, Number],
                default: true
            },
            hasRegister: {
                type: [Boolean, Number],
                default: true
            }
        },
        computed : {
            activeIndex : () => window.location.pathname
        },
        methods : {
            redirect (url) {
                window.location.href = url;
            }
        }
    };
</script>

<style scoped>

</style>