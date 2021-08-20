import VueRouter from "vue-router";
import Login from "./views/auth/Login";
import Register from "./views/auth/Register";
import Home from "./views/Home";
import About from "./views/About";
import NotFound from "./views/layouts/NotFound";

const routes = [
    {
        path: "/",
        component: Home,
        name: "home"
    },
    {
        path: "/404",
        component: NotFound,
        name: "404"
    },
    {
        path: "/about",
        component: About,
        name: "about"
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
