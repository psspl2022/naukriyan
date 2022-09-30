<template>
    <div id="recruitermessage">
        <jobseeker-header></jobseeker-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li><a href="#">Jobseeker Dashboard</a></li>
                                    <li class="active">Recruiter Message</li>
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
        <section class="top-adjust section pb-5 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                       <div class="card">
                         <div class="card-body">
                            <div class="interview ">
                            <h2 class="interview">Recruiter Message</h2>
                        </div>
                        <div class="table-responsive custom-height">
                            <table class="table table-hover custom-table" id="example1">
                                <thead>
                                    <tr> 
                                        <th>S.No</th>
                                        <th>Recruiter Name</th>
                                        <th>Job Title</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                       

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> 
                                        </td>
                                       
                                        
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
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
        name: "RecruiterMessage",
        data() {
            return {
                
              
            }
        },

        mounted(){
          this.$store.dispatch('getAllData','/get-saved-job')
          
        },
        computed:{
            alldata(){
                return this.$store.getters.getAllData;
            }
        },
        methods: {
            
        },
        

    }
</script>

<style scoped>

</style>