<template>
    <div id="vieworganization">
        <Emp-header></Emp-header>
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-5 pb-4">Package Details</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>

        </header>
        
        <section class="top-adjust section pb-5 mt-0 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">


                        <div class="card mt-3">

                            <div class="card-body">
                                <h2 class="hk-pg-title pb-3 fs-25">Package Name </h2>

                                <p class="fs-13"></p>
                                <tr>
                                	<th>Pacakge Name</th>  :  <td>{{alldata.package_name}}</td>
                                </tr>

                                 <tr>
                                	<th>Pacakge Price</th> :  <td>{{alldata.package_price}}</td>
                                </tr>
                                 <tr>
                                	<th>Validity</th>      :  <td>{{alldata.validity}} Days</td>
                                </tr>	
                                
                            </div>
                        </div>

                        

                        <div class="card mt-3">

                            <div class="card-body">
                                <h2 class="hk-pg-title pb-3 fs-25">Package Description</h2>

                                <p class="fs-13">{{alldata.package_description}}.</p>

                            </div>
                        </div>
                        <div class="card mt-3">

                            <div class="card-body">
                                <h2 class="hk-pg-title pb-3 fs-25">Service Description</h2>

                                <p class="fs-13">{{alldata.package_service}}.</p>

                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="button" @click.prevent="buy(alldata.id)" class="btn btn-primary btn-block">{{ isLoading ? 'Buying...' : 'Buy' }}</button>
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
        name: "Vieworganization",
        data(){
            return {
                isLoading: false,
            }
        },
        mounted(){
            this.$store.dispatch('getAllData',`/view-package/${this.$route.params.buypackagesid}`)
        },
        computed:{
            alldata(){
                return this.$store.getters.getAllData
            },
        },
        methods: {
        	buy(id){
                var uri = '/buy-package/'+id;
                this.isLoading = true;
                axios.get(uri).then(response => {
                    swal("Package Buying Successfully!");
                    this.$router.push('/pricing')
                    this.isLoading = false;
                });
            },
        }
    }
</script>

<style scoped>

</style>