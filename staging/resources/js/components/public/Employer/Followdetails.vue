<template>
    <div id="followdetails">
      <Emp-header></Emp-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Follower Detail</li>
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
                    <h2 class="hk-pg-title">Follower Details</h2>
                    <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addEnquiry"><i class="fas fa-plus mr-2"></i>Add Enquiry</a> -->
                </div>
              
             <div class="card mt-3">
               
                 <div class="card-body">
                     
                      <div class="table-responsive custom-height">
              <table class="table table-head-fixed custom-table mt-2" id="example1">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Designation</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(ven,index) in allIndustry" :key="ven.id">
                      <td>{{ index+1 }}</td>
                      <td>{{ ven.fname }} {{ ven.lname }}</td>
                      <td>{{ ven.email }}</td>
                      <td>{{ ven.contact }}</td>
                      <td>{{ (ven.designation) ? ven.designation : 'N/A' }}</td>
                      <td>{{ ven.created_at | timeformat }}</td>
                    </tr>
                  </tbody>
                </table>
                
     
              </div>

      
                 </div>
             </div>
             
              <!-- /.card-body -->
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
        name: "Followdetails",
        data() {
            return {}
        },
        mounted(){
            this.$store.dispatch('getAllOrganisations','/follower-list')
        },
        computed: {
            allIndustry() {
                return this.$store.getters.getAllOrganisations
            },
        }
    }


</script>

<style scoped>

</style>