<template>
    <!-- ============ -->
    <!-- header start -->
    <header class="main-header">
        <!--Header-Upper-->
        <div class="header-upper">
            <div class="container clearfix">

                <div class="header-inner clearfix">
                    <div class="logo-outer">
                        <div class="logo"><a href="/"><img :src="logo" :alt="site_name" :title="site_name" style="height:50px;width:150px"></a></div>
                    </div>

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-lg ml-lg-auto mr-xl-auto">
                        <div class="navbar-header clearfix">
                            <div class="logo"><a href="/"><img :src="logo" :alt="site_name" :title="site_name" style="height:50px;width:150px"></a></div>
                            <!-- Toggle Button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-one">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse navbar-collapse-one collapse clearfix">
                            <ul class="navigation clearfix">
                                <li v-for="(block,index) in blocks" :key="'block'+index" exc>
                                    <router-link :to="block.url" active="current-menu-item">{{block.name}}</router-link>
                                </li>
                                <li v-if="!isLoggedIn">
                                    <router-link :to="{ name: 'register' }" >Register</router-link>
                                </li>
                                <li v-if="!isLoggedIn">
                                    <router-link :to="{ name: 'login' }">Login</router-link>
                                </li>
                                <li v-if="isLoggedIn">
                                    <a href="#" @click.prevent="logout" >Logout</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!-- Menu buttons-->
                    <div class="menu-button ml-55">
                        <a :href="`callto:0${phone}`" class="theme-btn"><i class="icofont-ui-call"></i><span>0{{phone}}</span></a>
                    </div>
                </div>

            </div>
        </div>
        <!--End Header Upper-->
    </header>
    <!-- header end -->
    <!-- ========== -->
</template>

<script>
import { mapState } from "vuex";
import { getStateToken, removeStateToken } from "./../../auth";
export default {
    props:['logo','phone','site_name'],
    data(){
        return {
            loading:false,
            blocks:null
        }
    },
    computed: {
        ...mapState({
            isLoggedIn: "isLoggedIn",
        })
    },
    created(){
        this.loading = true;
        axios.get("/api/pages").then(res => {
            this.loading = false;
            this.blocks = res.data.data;
        })
        
    },
    methods:{
        async logout() {
            try {
                axios.post(
                    "/api/auth/logout",
                    {},
                    {
                        headers: {
                            Authorization: `Bearer ${getStateToken()}`
                        }
                    }
                );

                this.$store.dispatch("logout");
                removeStateToken();
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>

<style scoped>
a{
    text-decoration: none;
}
</style>