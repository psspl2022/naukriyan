<template>
    <div id="reports">
        <Emp-header></Emp-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Reports</li>
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
                            <h2 class="hk-pg-title">Reports</h2>
                            <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addEnquiry"><i class="fas fa-plus mr-2"></i>Add Enquiry</a> -->
                        </div>


                        <div class="card mt-3">

                            <div class="card-body">
                                <div class="search-bar">
                                    <div class="form-group row">
                                        <div class="col-sm-4">

                                            <input type="date" class="form-control" name="created_at"
                                                   v-model="startDate" placeholder="Enter From Date" id="startDate"/>
                                        </div>
                                        <div class="col-sm-4">

                                            <input type="date" class="form-control" name="created_at" v-model="endDate"
                                                   placeholder="Enter To Date" id="endDate"/>
                                        </div>
                                        <div class="col-sm-4">

                                            <!--  <select class="form-control custom-select" id="sel1">
                                <option>Select Type</option>
                                <option>Part Time</option>
                                <option>Full Time</option>
                              </select> -->
                                            <button type="submit" @click.prevent="ReportByDate()"
                                                    class="btn btn-secondary text-white mr-2">submit
                                            </button>
                                            <button type="submit" @click.prevent="Reset()"
                                                    class="btn btn-secondary text-white mr-2">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive custom-height">
                                    <table class="table table-head-fixed custom-table mt-2" id="">
                                        <thead>
                                        <tr>

                                            <th>Package Name</th>
                                            <th>Validity</th>

                                            <th>Details</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="ven in allIndustry" :key="ven.id">
                                            <td>{{ven.package_name}}</td>
                                            <td>{{ven.validity}}</td>

                                            <td><a :href="'/#/package-info/package/' + ven.id">Get Info</a></td>
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
        name: "Reports",
        data() {
            return {
                allIndustry: [],
                startDate: null,
                endDate: null,
            }
        },
        mounted() {

            //this.$store.dispatch('getAllData','/getreport')

        },
        computed: {
            /*allIndustry(){
               return this.$store.getters.getAllData
            },*/

        },
        methods: {
            getAllReport() {
                this.loading = true;
                axios.get('getreport').then(response => {
                    this.loading = false;
                    this.allIndustry = response.data.data;
                    console.log(response.data.data);
                })

            },

            ReportByDate() {
                let from = this.startDate;
                let to = this.endDate;
                //alert(from+"  "+to);
                if (from == "" && to == "") {
                    this.error = 'Please enter Date';
                } else {
                    this.error = '';
                    this.loading = true;
                    axios.get('getreport/' + this.startDate + '/' + this.endDate).then(response => {
                        this.loading = false;
                        this.allIndustry = response.data.data;
                        console.log(response.data.data);
                    })

                }

            },
            Reset() {
                window.location.reload();
            }
        },
        created: function () {
            this.getAllReport();
        },

    }


</script>

<style scoped>

</style>
