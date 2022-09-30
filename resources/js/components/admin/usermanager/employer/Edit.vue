<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Employer</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Employer</h3>
                        </div>
                        {{editData}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateEmployer()" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="fname"> First name</label>
                                        <input type="text" class="form-control" id="fname" placeholder="First Name"
                                               v-model="form.fname" name="fname"
                                               :class="{ 'is-invalid': form.errors.has('fname') }">
                                        <has-error :form="form" field="fname"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="lname">Last name</label>
                                        <input type="text" class="form-control" id="lname" placeholder="Last Name"
                                               v-model="form.lname" name="lname"
                                               :class="{ 'is-invalid': form.errors.has('lname') }">
                                        <has-error :form="form" field="lname"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email"
                                               v-model="form.email" name="email"
                                               :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="user_password">Password</label>
                                        <div class="input-group">
                                            <input :type="passwordFieldType" name="password" id="password"
                                                   class="form-control" data-toggle="password" v-model="password"
                                                   :class="{ 'is-invalid': form.errors.has('password') }">
                                            <div class="input-group-append">
                                                <!-- <button type="password" >Show/Hide</button> -->
                                                <!-- <span class="input-group-text"><i class="fa fa-eye"></i></span> -->
                                            </div>
                                            <has-error :form="form" field="password"></has-error>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-4 mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username"
                                               v-model="form.username" name="username"
                                               :class="{ 'is-invalid': form.errors.has('username') }">
                                        <has-error :form="form" field="username"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="contact">Contact</label>
                                        <input type="text" class="form-control" id="contact"
                                               placeholder="Add Contact number" v-model="form.contact" name="contact"
                                               :class="{ 'is-invalid': form.errors.has('contact') }" maxlength="10">
                                        <has-error :form="form" field="contact"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="gender">Gender</label>
                                        <select class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('gender') }"
                                                v-model="form.gender">
                                            <option disabled value="">Select One</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>


                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label>Select Company</label>
                                        <select class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('company_name') }"
                                                v-model="form.company_name">
                                            <option disabled value="">Select One</option>
                                            <option :value="company.id" v-for="company in allStates">
                                                {{company.company_name}}
                                            </option>

                                        </select>
                                        <has-error :form="form" field="company_name"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label>Select Industry</label>
                                        <select class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('industry_name') }"
                                                v-model="form.industry_name">
                                            <option disabled value="">Select One</option>
                                            <option :value="industry.id" v-for="industry in allIndustry">
                                                {{industry.category_name}}
                                            </option>

                                        </select>
                                        <has-error :form="form" field="industry_name"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label>Select Functional Role </label>
                                        <select class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('functionalrole_name') }"
                                                v-model="form.functionalrole_name">
                                            <option disabled value="">Select One</option>
                                            <option :value="functional.id" v-for="functional in allDesignation">
                                                {{functional.subcategory_name}}
                                            </option>

                                        </select>
                                        <has-error :form="form" field="functionalrole_name"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" id="designation"
                                               placeholder="Enter Designation" v-model="form.designation"
                                               name="designation"
                                               :class="{ 'is-invalid': form.errors.has('designation') }">
                                        <has-error :form="form" field="designation"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="establish_date">Date of birth</label>
                                        <input type="date" class="form-control" id="dob" placeholder=" DOB"
                                               v-model="form.dob" name="establish_date"
                                               :class="{ 'is-invalid': form.errors.has('dob') }" autocomplete="off">
                                        <has-error :form="form" field="dob"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="use_recruitment_service">Use Recruitment Service</label>
                                        <select class="form-control"
                                                :class="{ 'is-invalid': form.errors.has('use_recruitment_service') }"
                                                v-model="form.use_recruitment_service">
                                            <option disabled value="">Select One</option>
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">
                                        <label for="profile_pic_thumb">Upload Profile image</label>
                                        <input type="file" class="form-control" name="profile_pic_thumb"
                                               @change="changePhoto($event)">
                                        <has-error :form="form" field="profile_pic_thumb"></has-error>
                                    </div>

                                    <div class="form-group col-md-4 mb-3">


                                        <img :src="updateImage()" alt="missing" width="200" height="100">
                                        <has-error :form="form" field="profile_pic_thumb"></has-error>
                                    </div>


                                </div><!-- form row -->


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
                company_name: [],
                industry_name: [],
                functionalrole_name: [],
                form: new Form({
                    company_name: '',
                    fname: '',
                    lname: '',
                    email: '',
                    password: '',
                    contact: '',
                    username: '',
                    gender: '',
                    designation: '',
                    profile_pic_thumb: '',
                    dob: '',
                    industry_name: '',
                    industry_id: '',
                    functionalrole_name: '',
                    use_recruitment_service: '',


                })
            }
        },
        mounted() {
            this.$store.dispatch('getAllData', '/employer')
            this.$store.dispatch('getAllState', '/companies')
            this.$store.dispatch('getAllJobtype', '/industry')
            this.$store.dispatch('getAllDesignation', '/functionalrole')
            this.$store.dispatch('getEditData', `/edit-employer/${this.$route.params.employerid}`)

        },
        computed: {
            allCountry() {
                return this.$store.getters.getAllData
            },
            allStates() {
                return this.$store.getters.getAllState
            },
            allIndustry() {
                return this.$store.getters.getAllJobtype
            },
            allDesignation() {
                return this.$store.getters.getAllDesignation
            },
            editData() {
                this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
            },

        },
        methods: {
            switchVisibility() {
                alert('hello');
                this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
            },
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
                        this.form.profile_pic_thumb = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }

            },

            updateEmployer() {
                this.form.post(`/update-employer/${this.$route.params.employerid}`)
                    .then((response) => {
                        console.log(response);
                        this.$router.push('/employer-list')
                        toast({
                            type: 'success',
                            title: 'Employer Updated successfully'
                        })
                    })
                    .catch(() => {

                    })

            },
            updateImage() {
                let img = this.form.profile_pic_thumb;
                if (img.length > 100) {
                    return this.form.profile_pic_thumb
                } else {
                    return `emp_profile_image/${this.form.profile_pic_thumb}`
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