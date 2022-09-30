<template>
    <div id="supportlist">
        <Emp-header></Emp-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Support</li>
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
                            <h2 class="hk-pg-title">Support</h2>
                            <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addQuery"><i
                                    class="fas fa-plus mr-2"></i>Add Support</a>
                        </div>


                        <div class="card mt-3">

                            <div class="card-body">

                                <div class="table-responsive custom-height">
                                    <table class="table table-head-fixed custom-table mt-2" id="example1">
                                        <thead>
                                        <tr>
                                            <th>Support ID.</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Open Date</th>
                                            <th>Close Date</th>
                                            <th>Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="sup in supportLists" :key="sup.id">
                                            <td>{{sup.support_id}}</td>
                                            <td v-if="sup.support_subject==='1'">Technical Enquiry</td>
                                            <td v-if="sup.support_subject==='2'">General Enquiry</td>
                                            <td v-if="sup.support_subject==='3'">Report An Issue</td>
                                            <td v-if="sup.support_subject==='4'">Feedback</td>
                                            <td v-if="sup.support_subject==='5'">Others</td>
                                            <td>{{sup.support_comment}}</td>
                                            <td>{{sup.support_open_date}}</td>
                                            <td>{{ (sup.support_close_date === null) ? 'not resolved' :
                                                sup.support_close_date }}
                                            </td>
                                            <td>{{sup.support_status}}</td>
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

        <!-- The add Enquiry user start -->
        <div class="modal fade popupForm custom-model-width" id="addQuery">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="popupForm" role="form" method="post" @submit.prevent="addsupport()">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Support</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">


                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <label class="col-form-label" for="">Subject</label>
                                    <select name="support_subject" v-model="form.support_subject"
                                            :class="{ 'is-invalid': form.errors.has('support_subject') }"
                                            class="form-control">
                                        <option disabled value="">Select Subject</option>
                                        <option value="1">Technical Enquiry</option>
                                        <option value="2">General Enquiry</option>
                                        <option value="3">Report an issue</option>
                                        <option value="4">Feedback</option>
                                        <option value="5">Others</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-form-label" for=""> Description</label>
                                    <textarea type="text" class="form-control" name="support_comment"
                                              v-model="form.support_comment"
                                              :class="{ 'is-invalid': form.errors.has('support_comment') }"
                                              placeholder="Enter Your Description Here ....." id=""></textarea>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-primary text-white">{{ addSupportStatus ? 'Sending...'
                                : 'Send' }}
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- The add Enquiry user end -->
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "Supportlist",

        data() {
            return {
                addSupportStatus: false,
                supportLists: [],
                support_subject: [],
                form: new Form({
                    support_subject: '',
                    support_comment: ''
                })
            }
        },
        mounted() {
            this.$store.dispatch('getAllProfile', '/userprofile')
            this.getSupportLists();
        },
        computed: {
            allProfile() {
                return this.$store.getters.getAllProfile
            }
        },
        methods: {
            getSupportLists() {
                axios.get('/supportlist').then(response => {
                    this.supportLists = response.data.data;
                })
            },
            addsupport() {
                this.addSupportStatus = true;
                this.form.post('/add-support')
                    .then(() => {
                        this.addSupportStatus = false;
                        toast({
                            type: 'success',
                            title: 'Message Send successfully'
                        });
                        this.getSupportLists();
                    }).catch(error => {
                        this.addSupportStatus = false;
                        toast({
                            type: 'warning',
                            title: 'Something went wrong'
                        });
                })
            },
        }
    }
</script>

<style scoped>

</style>