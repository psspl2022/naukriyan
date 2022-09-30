<template>
    <div id="postjob">
        <Emp-header></Emp-header>
          <section>
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
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
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
                        <div class="col-sm-3" v-for="packjs in alldata" :key="packjs.id" >
                            <div class="plan">
                            <h3>{{packjs.package_name}}<span>₹{{packjs.package_price}}</span></h3>
                              <a class="signup" href="" @click.prevent="PackageAlreadyBuy()" v-if="jobsID.includes(packjs.id) == true" disabled>Purchased</a>
                              <router-link :to="`/buy-package/${packjs.id}`"v-else="" > <a class="signup" href="">Purchase</a></router-link>
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

        <main-footer></main-footer>  
    </div>
</template>

<script>
    export default {
        name: "postjob",
        data() {
            return {
                jobsID: [],
            }
        },
        mounted(){
          this.$store.dispatch('getAllData','/get-employer-package')
          this.checkUserBuyPackage()
        },
        computed:{
             alldata(){
                //setTimeout(() => $('#pricing-table'), 1000);
                return this.$store.getters.getAllData
             }
        },
         methods: {
            
            checkUserBuyPackage() {
                const self = this;
                axios.get('/check-user-buy-package').then(response => {
                    if (response.data.length >= 1) {
                        $.each(response.data, function(key, value) {
                            self.jobsID.push(value.package_id);
                        });
                    } else {
                        this.jobsID.push(0);
                    }
                })
            },
            PackageAlreadyBuy() {
                swal("You have already purchased!", "You clicked the button!", "warning")
            },
         }
    }
</script>

<style scoped>

</style>