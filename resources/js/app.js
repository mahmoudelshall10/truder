require('./bootstrap');
import Index from "./Index";
import VueRouter from 'vue-router';
import router from "./router";
import Vuex from "vuex";
import storeDefinition from "./store";
import Vue from 'vue';
import HeaderComponent from "./views/layouts/Header";
import FooterComponent from "./views/layouts/Footer";
import ValidationErrors from "./shared/components/ValidationErrors";

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(storeDefinition);

Vue.component("v-errors", ValidationErrors);
Vue.component('FooterComponent',FooterComponent);
Vue.component('HeaderComponent',HeaderComponent);


window.axios.interceptors.response.use(
    response => {
        return response;
    },
    error => {
        if (401 === error.response.status) {
            store.dispatch("logout");
        }

        return Promise.reject(error);
    }
);

const app = new Vue({
    el: '#app',
    store,
    router,
    components:{
        index:Index,
        FooterComponent:FooterComponent,
        HeaderComponent:HeaderComponent
    },
    async beforeCreate() {
        this.$store.dispatch("logInUser");
    }
});
