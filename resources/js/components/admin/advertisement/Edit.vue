<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Advertisement</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Advertisement</h3>
                        </div>
                        {{editData}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateAdvertisement()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ads_title"> Advertisement Title</label>
                                    <input type="text" class="form-control" id="ads_title"
                                           placeholder="Add Advertisement Title" v-model="form.ads_title"
                                           name="ads_title" :class="{ 'is-invalid': form.errors.has('ads_title') }">
                                    <has-error :form="form" field="ads_title"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="ads_link"> Advertisement Link</label>
                                    <input type="text" class="form-control" id="ads_link"
                                           placeholder="Add Advertisement Link" v-model="form.ads_link" name="ads_link"
                                           :class="{ 'is-invalid': form.errors.has('ads_link') }">
                                    <has-error :form="form" field="ads_link"></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Advertisement For</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('ads_for') }"
                                            v-model="form.ads_for">
                                        <option disabled value="">Select One</option>
                                        <option value="All">All</option>
                                        <option value="Employer">Employer</option>
                                        <option value="Jobseeker">Jobseeker</option>
                                        <option value="Consultant">Consultant</option>

                                    </select>
                                    <has-error :form="form" field="ads_for"></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Select Industry</label>
                                    <select class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('ads_category') }"
                                            v-model="form.ads_category">
                                        <option disabled value="">Select One</option>
                                        <option :value="industry.category_name" v-for="industry in allIndustry">
                                            {{industry.category_name}}
                                        </option>

                                    </select>
                                    <has-error :form="form" field="ads_category"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="startdateid">Start Date</label>
                                    <input type="date" class="form-control" id="startdateid" placeholder=" Start Date"
                                           v-model="form.ads_startdate" name="ads_startdate"
                                           :class="{ 'is-invalid': form.errors.has('ads_startdate') }"
                                           autocomplete="off">
                                    <has-error :form="form" field="ads_startdate"></has-error>
                                </div>


                                <div class="form-group">
                                    <label for="enddateId">End Date</label>
                                    <input type="date" class="form-control" id="enddateId" placeholder=" End Date"
                                           v-model="form.ads_enddate" name="ads_enddate"
                                           :class="{ 'is-invalid': form.errors.has('ads_enddate') }" autocomplete="off">
                                    <has-error :form="form" field="ads_enddate"></has-error>
                                </div>

                                <!-- <div class="form-group" >
                                   <label for="image">Advertisement Image</label>
                                  <div class="input-group">
                                   <div class="custom-file">
                                   <input name="image" type="file" :class="{ 'is-invalid': form.errors.has('image') }" class="custom-file-input" id="exampleInputFile">
                                   <label class="custom-file-label" for="exampleInputFile">Chooose Image file</label>
                                   <img :src="form.image" alt="" width="80" height="40">
                                   <has-error :form="form" field="image"></has-error>
                                   </div>
                                 </div>
                               </div>  -->

                                <div class="form-group">
                                    <label for="titleId">Upload Image</label>


                                    <input @change="changePhoto($event)" name="image" type="file"
                                           :class="{ 'is-invalid': form.errors.has('image') }">
                                    <img :src="updateImage()" alt="" width="80" height="80">
                                    <has-error :form="form" field="title"></has-error>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "Edit",
        data() {
            return {
                ads_category: [],
                form: new Form({
                    ads_title: '',
                    ads_link: '',
                    ads_for: '',
                    ads_category: '',
                    ads_startdate: '',
                    ads_enddate: '',
                    ads_image: '',
                })
            }
        },
        mounted() {
            this.$store.dispatch('getAllData', '/industry')
            this.$store.dispatch('getEditData', `/edit-advertisement/${this.$route.params.advertisementid}`)

        },
        computed: {
            allIndustry() {
                return this.$store.getters.getAllData
            },
            editData() {
                this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
            }
        },
        methods: {
            changePhoto(event) {
                let file = event.target.files[0];

                if (file.size > 1048576) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.image = event.target.result
                    };
                    reader.readAsDataURL(file);
                }

            },

            updateAdvertisement() {
                this.form.post(`/update-advertisement/${this.$route.params.advertisementid}`)
                    .then((response) => {
                        this.$router.push('/advertisement-list')
                        toast({
                            type: 'success',
                            title: 'Advertisement Updated successfully'
                        })
                    })
                    .catch(() => {

                    })

            },
            updateImage() {
                let img = this.form.ads_image;
                if (img.length > 100) {
                    return this.form.ads_image
                } else {
                    return `adsimage/${this.form.ads_image}`
                }

            }

        }
    }
</script>

<style scoped>
    textarea, input {

        -webkit-appearance: textfield;
    }
</style>