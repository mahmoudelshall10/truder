import VueRouter from "vue-router";
import Login from "./views/auth/Login";
import Register from "./views/auth/Register";
import Home from "./views/Home";

const routes = [
    {
        path: "/",
        component: Home,
        name: "home"
    },
    {
        path: "/auth/login",
        component: Login,
        name: "login"
    },
    {
        path: "/auth/register",
        component: Register,
        name: "register"
    },
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
