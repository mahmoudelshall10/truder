<template>
    <!-- ============ -->
    <!-- footer start -->
    <footer>
        <div class="footer-top">
            <div class="container overflow-hidden">
                <div class="call-to-action wow animate__animated animate__slow animate__slideInUp">
                    <h2>Get Leading Advice's Security System.</h2>
                    <a href="contact.html" class="theme-btn">Contact Now <i class="icofont-double-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.footer-top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-gallery footer-col d-flex flex-wrap">
                            <figure>
                                <a href="assets/img/footer/zoom1.jpg">
                                    <img src="assets/img/footer/01.jpg" alt="Footer Gallery Image" />
                                </a>
                            </figure>
                            <figure>
                                <a href="assets/img/footer/zoom2.jpg">
                                    <img src="assets/img/footer/02.jpg" alt="Footer Gallery Image" />
                                </a>
                            </figure>
                            <figure>
                                <a href="assets/img/footer/zoom3.jpg">
                                    <img src="assets/img/footer/03.jpg" alt="Footer Gallery Image" />
                                </a>
                            </figure>
                            <figure>
                                <a href="assets/img/footer/zoom4.jpg">
                                    <img src="assets/img/footer/04.jpg" alt="Footer Gallery Image" />
                                </a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 pr-xl-0">
                        <div class="footer-col">
                            <h2>Contact Us</h2>
                            <div class="footer-contact">
                                <p>
                                    <i class="icofont-location-pin"></i>
                                    <span>{{ address }}</span>
                                </p>
                                <p>
                                    <i class="icofont-ui-call"></i>
                                    <span>0{{ phone }}</span>
                                </p>
                                <p>
                                    <i class="icofont-email"></i>
                                    <span>{{ email }}</span>
                                </p>
                            </div>
                            <div class="footer-social">
                                <a :href="facebook" target="_blank">
                                    <i class="icofont-facebook"></i>
                                </a>
                                <a :href="twitter" target="_blank">
                                    <i class="icofont-twitter"></i>
                                </a>
                                <a :href="skype">
                                    <i class="icofont-skype"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 pr-xl-0">
                        <div class="footer-col">
                            <h2>Recent Causes</h2>
                            <ul>
                                <li><a href="service.html">Survillance</a></li>
                                <li><a href="service.html">Door System</a></li>
                                <li><a href="service.html">Maintenance</a></li>
                                <li><a href="service.html">Integration</a></li>
                                <li><a href="service.html">Device Access</a></li>
                                <li><a href="service.html">Trading</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-6 pr-xl-0">
                        <div class="footer-col">
                            <h2>Quick Link</h2>
                            <ul>
                                <li v-for="(page,index) in pages" :key="'page'+index">
                                    <router-link :to="page.url">{{page.name}}</router-link>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- /.footer-middle -->
        <div class="footer-bottom">
            <div class="container">
                <p>Copyright © <span>{{ date }}</span> | All Rights Reserved.</p>
            </div>
        </div>
        <!-- /.footer-bottom -->
    </footer>
    <!-- footer end -->
    <!-- ========== -->
</template>

<script>
import { mapState } from "vuex";
import { getStateToken, removeStateToken } from "./../../auth";
export default {
    props:{
        address:String,
        phone:Number,
        date:Number,
        twitter:String,
        facebook:String,
        skype:String,
        email:String,
    },
    data(){
        return {
            loading:false,
            pages:null,
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
            this.pages = res.data.data;
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

