<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Website Info List</h3>

                            <div class="card-tools">
                                <!-- <button class="btn btn-primary" v-if="count==0">
                                    <router-link to="/add-website-info" style="color:#fff"> Add Website Info</router-link>
                                </button> -->
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>About Us</th>
                                        <th>Privacy Policy</th>
                                        <th>Term and condition</th>
                                        <th>Advertise With us</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(web,index) in web_info" :key="web.id" >
                                        <td>{{index +1}}</td>
                                        <td v-html="web.about_us"></td>
                                        <td v-html="web.privacy_policy"></td>
                                        <td v-html="web.terms_and_condition"></td>
                                        <td v-html="web.advertise_with_us"></td>
                                        <td>
                                        <router-link :to="`/edit-website-info/${web.id}`"><i class="far fa-edit"></i></router-link>
                                        
                                        </td>
                                        </tr>
                                        </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        data() {
    return {
      count:'',
      web_info:'',
      
    };
  },
        mounted(){
            this.getWebsiteInfo();
            this.countRow();
    //       
        },
        computed:{
        
        },
        methods:{ 
                getWebsiteInfo(){
                axios
            .get("get-web-info")
            .then((response) => {
                console.log(response)
                this.web_info = response.data.data;
            })
            .catch((error) => {
                console.log("error");
            });
            },
             countRow(){
                        axios.get("/count-row").then((response) => {
                this.count = response.data;
            });
            },
           
     
            },
            
           
        }
    
</script>

<style scoped>
</style>