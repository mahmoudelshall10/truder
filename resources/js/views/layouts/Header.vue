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
                                <li class="current-menu-item"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="service.html">service</a></li>
                                <li class="dropdown"><a href="#">pages</a>
                                    <ul>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">contact</a></li>
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
export default {
    props:['logo','phone','site_name']
}
</script>