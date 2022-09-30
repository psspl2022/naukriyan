<template>
    <div id="package">
        <consultant-header></consultant-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Pricing</li>
                                </ol>
                            </div>

                            <div class="col-xs-12 col-sm-4 hidden-xs">
                                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:919711999999">Hot Line: +91 9711 99 99
                                        99</a> </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <section class="top-adjust section pb-5 mt-0 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cms-pg-header">
                            <h2 class="hk-pg-title">Pricing</h2>   

                        </div>

                    </div>
                </div>



                <div id="pricing-table" class="clear">  
                    <div class="row">
                        <div class="col-sm-3" v-for="packjs in packageDetails" :key="packjs.id" >
                            <div class="plan">
                            <h3>{{packjs.package_name}}<span>₹{{packjs.package_price}}</span></h3>
                              
                              <router-link :to="``" > <a class="signup" href="">Purchase</a></router-link>
                                <ul>
                                    <li><b>{{packjs.package_total_jobs}}</b> Total Jobs</li>
                                    <li><b>{{packjs.basic_job}}</b> Basic Jobs</li>
                                    <li><b>{{packjs.hot_job}}</b> Hot Jobs</li>
                                    <li><b>{{packjs.premium_job}}</b> Premium Jobs</li>
                                    <li><b>{{packjs.validity}} </b> Validity(in days)</li>
                                     <li><b>{{packjs.package_total_resume_views}}</b> Resume View</li>
                                    <li><b>{{packjs.package_total_resume_downloads}} </b> Resume Download</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->
        </section>
        
        <consultant-footer></consultant-footer>
    </div>
</template>

<script>
    
       export default {
        name: "PackageConsultant",
        data() {
            return {
               packageDetails: null, 
            }
        },
        mounted() {
            this.getPackagesUser();
        },
        methods:{
            getPackagesUser() {
                axios.get("/consultant-packages").then((response) => {
                    if (response.data) {
                      console.log(response.data);
                        this.packageDetails = response.data.data;
                    }
                });
            },
        
    }
 };
   
</script>

<style scoped>

</style>
