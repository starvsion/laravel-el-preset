<template>
    <div id="app">
        <el-container>
            <el-header>
                <default-navigation :current-route="currentRoute" :has-login="hasLogin" :has-register="hasRegister"/>
            </el-header>
            <el-main>
                <router-view/>
            </el-main>
        </el-container>
    </div>
</template>

<script>
    import Vue               from "vue";
    import VueRouter         from "vue-router";
    import DefaultNavigation from "./DefaultNavigation";
    import Welcome           from "./Welcome";
    import Login from "./Login";
    import Register from "./Register";
    Vue.use(VueRouter);

    const routes = [
        {
            path: "/",
            redirect: "/welcome",
        },
        {
            path: "/welcome",
            name: "welcome",
            component: Welcome
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/register",
            name: "register",
            component: Register
        }
    ];

    let router = new VueRouter({
        routes,
        mode: "history"
    });

    export default {
        name: "App",
        props: {
            hasLogin: {
                type: Boolean,
                default: true
            },
            hasRegister: {
                type: Boolean,
                default: true
            },
            currentRoute: {
                type: String,
                default: "welcome"
            }
        },
        router,
        components: {
            DefaultNavigation
        },
        mounted () {
            this.$router.push({name: this.currentRoute});
        }
    };
</script>

<style scoped>

</style>