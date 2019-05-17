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
    import Vue               from "vue/types";
    import VueRouter         from "vue-router/types";
    import DefaultNavigation from "./SpaNavigation";
    import Welcome           from "../components/Welcome";
    import Login             from "../components/Login";
    import Register          from "../components/Register";
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
        name: "AppSpa",
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