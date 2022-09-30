<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Company</h3>
                        </div>
                        {{editData}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateCompany()">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="company_name"> Company name</label>
                                    <input type="text" class="form-control" id="company_name"
                                           placeholder="Add Company Name" v-model="form.company_name"
                                           name="company_name"
                                           :class="{ 'is-invalid': form.errors.has('company_name') }">
                                    <has-error :form="form" field="company_name"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="owner_name"> Owner name</label>
                                    <input type="text" class="form-control" id="owner_name" placeholder="Owner name"
                                           v-model="form.owner_name" name="owner_name"
                                           :class="{ 'is-invalid': form.errors.has('owner_name') }">
                                    <has-error :form="form" field="owner_name"></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Select Industry</label>
                                    <select class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('company_industry') }"
                                            v-model="form.company_industry">
                                        <option disabled value="">Select Industry</option>
                                        <option :value="industry.id" v-for="industry in allIndustry">
                                            {{industry.category_name}}
                                        </option>

                                    </select>
                                    <has-error :form="form" field="company_industry"></has-error>
                                </div>

                                <div class="form-group">
                                    <label>Select State</label>
                                    <select @change="StateId()" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('company_state') }"
                                            v-model="form.company_state">
                                        <option disabled value="">Select State</option>
                                        <option :value="state.id" v-for="state in allStates"> {{state.states_name}}
                                        </option>

                                    </select>
                                    <has-error :form="form" field="company_state"></has-error>
                                </div>
                                <div class="form-group">
                                    <label>Select City</label>
                                    <select class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('company_city') }"
                                            v-model="form.company_city">
                                        <option>Select City</option>
                                        <option :value="city.id" v-for="city in percity"> {{city.cities_name}}</option>
                                    </select>
                                    <has-error :form="form" field="company_city"></has-error>
                                </div>
                                <div class="form-group">
                                    <label>No.Of Employee</label>
                                    <select class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('no_of_employee') }"
                                            v-model="form.no_of_employee">
                                        <option disabled value="">Select One</option>
                                        <option value="1-10">1-10</option>
                                        <option value="11-100">11-100</option>
                                        <option value="101-1000">101-1000</option>
                                        <option value="1001-10000">1001-10000</option>

                                    </select>
                                    <has-error :form="form" field="no_of_employee"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="address"> Address</label>
                                    <textarea class="form-control" id="address" placeholder="Add Address"
                                              v-model="form.address" name="address"
                                              :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cin_no"> CIN Number</label>
                                    <input type="text" class="form-control" id="cin_no" placeholder="Add CIN Number"
                                           v-model="form.cin_no" name="cin_no"
                                           :class="{ 'is-invalid': form.errors.has('cin_no') }">
                                    <has-error :form="form" field="cin_no"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="establish_date">Establish date</label>
                                    <input type="date" class="form-control" id="establish_date"
                                           placeholder=" Establish Date" v-model="form.establish_date"
                                           name="establish_date"
                                           :class="{ 'is-invalid': form.errors.has('establish_date') }"
                                           autocomplete="off">
                                    <has-error :form="form" field="establish_date"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="titleId">Upload Company Logo</label>
                                    <input type="file" class="form-control" name="company_logo"
                                           @change="changePhoto($event)">
                                    <img :src="updateImage()" alt="missing" width="80" height="80">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="company_email"> Company Email</label>
                                    <input type="email" class="form-control" placeholder="Company Email"
                                           v-model="form.com_email" name="com_email"
                                           :class="{ 'is-invalid': form.errors.has('com_email') }">
                                    <has-error :form="form" field="com_email"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="com_contact"> Company Contact</label>
                                    <input type="text" class="form-control" placeholder="Company Contact"
                                           v-model="form.com_contact" name="com_contact"
                                           :class="{ 'is-invalid': form.errors.has('com_contact') }">
                                    <has-error :form="form" field="com_contact"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="titleId">Upload Company Cover</label>
                                    <input type="file" class="form-control" name="cover_image"
                                           @change="changecover($event)">
                                    <img :src="updateCover()" alt="missing" width="80" height="80">
                                    <has-error :form="form" field="title"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="website"> Website</label>
                                    <input type="text" class="form-control" placeholder="Website" v-model="form.website"
                                           name="website" :class="{ 'is-invalid': form.errors.has('website') }">
                                    <has-error :form="form" field="website"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="about"> About</label>
                                    <textarea class="form-control" placeholder="Add About" v-model="form.about"
                                              name="about"
                                              :class="{ 'is-invalid': form.errors.has('about') }"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="company_capital"> Company capital <i
                                            class="fas fa-rupee-sign"></i></label>
                                    <textarea class="form-control" placeholder="Company capital"
                                              v-model="form.company_capital" name="company_capital"
                                              :class="{ 'is-invalid': form.errors.has('company_capital') }"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tagline"> Tagline</label>
                                    <textarea class="form-control" placeholder="Tagline" v-model="form.tagline"
                                              name="tagline"
                                              :class="{ 'is-invalid': form.errors.has('tagline') }"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" :disabled="updateStatus">{{ updateStatus ? 'Updating...' : 'Update' }}</button>
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
                company_industry: [],
                company_state: [],
                percity: [],
                updateStatus: false,
                form: new Form({
                    company_name: '',
                    company_industry: '',
                    company_state: '',
                    company_city: '',
                    no_of_employee: '',
                    address: '',
                    cin_no: '',
                    establish_date: '',
                    company_logo: '',
                    com_email: '',
                    com_contact: '',
                    cover_image: '',
                    website: '',
                    about: '',
                    company_capital: '',
                    tagline: '',
                    owner_name: '',
                })
            }
        },
        mounted() {
            this.$store.dispatch('getAllData', '/industry')
            this.$store.dispatch('getAllState', '/states')
            this.$store.dispatch('getEditData', `/edit-companies/${this.$route.params.companiesid}`)
            this.loadCitys()
        },
        computed: {
            allIndustry() {
                return this.$store.getters.getAllData
            },
            editData() {
                this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
            },
            allStates() {
                return this.$store.getters.getAllState
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
                        this.form.company_logo = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }
            },
            changecover(event) {
                let file = event.target.files[0];
                if (file.size > 1048576) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'File size too large!',
                        footer: '<a>Why do I have this issue?</a>'
                    })
                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.cover_image = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }

            },
            StateId() {
                let url = `/get-city/${this.form.company_state}`
                this.dynamicDropdown(url, 'percity')
            },
            loadCitys() {
                let url = `/geteditcompany-city/${this.$route.params.companiesid}`
                this.dynamicDropdown(url, 'percity')
            },
            dynamicDropdown(url, data) {
                axios.get(url)
                    .then(response => this[data] = response.data.data)
                    .catch(error => console.log(error))
            },
            updateCompany() {
                this.updateStatus = true;
                this.form.post(`/update-companies/${this.$route.params.companiesid}`)
                    .then((response) => {
                        this.$router.push('/companies-list')
                        toast({
                            type: 'success',
                            title: 'Company Updated successfully'
                        })
                        this.updateStatus = false;
                    })
                    .catch(() => {
                        this.updateStatus = false;
                    })

            },
            updateImage() {
                let img = this.form.company_logo;
                if (img.length > 100) {
                    return this.form.company_logo
                } else {
                    return `company_logo/${this.form.company_logo}`
                }
            },
            updateCover() {
                let img = this.form.cover_image;
                if (img.length > 100) {
                    return this.form.cover_image
                } else {
                    return `company_cover/${this.form.cover_image}`
                }
            },
            updateVideo() {
                let img = this.form.company_video;
                if (img.length > 100) {
                    return this.form.company_video
                } else {
                    return `company_video/${this.form.company_video}`
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