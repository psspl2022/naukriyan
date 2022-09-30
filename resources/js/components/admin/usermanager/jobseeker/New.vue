<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
            <button class="btn btn-primary">
              <router-link to="/jobseeker-list" style="color:#fff">Jobseeker List</router-link>
            </button>
          </ol>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Jobseeker</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link mt-4 active" id="nav-home-tab" data-toggle="tab" href="#nav-bulk-upload"
               role="tab"
               aria-controls="nav-home" aria-selected="true"><b>Bulk Jobseeker Upload</b></a>
            <a class="nav-item nav-link mt-4" id="nav-profile-tab" data-toggle="tab" href="#nav-jobseeker-registration"
               role="tab"
               aria-controls="nav-profile" aria-selected="false"> <b>Jobseeker Registration</b> </a>
          </div>

          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-bulk-upload" role="tabpanel" aria-labelledby="nav-home-tab">
              <h4>Important Instruction</h4>
              <ul>
                <li>Jobseeker should not be more then 250 in one sheet.</li>
              </ul>
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Bulk Jobseeker Upload</h3>
                </div>
                <form method="post" enctype="multipart/form-data" @submit.prevent="importBulkJob()">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Upload Sheet <span class="text-muted"> (CSV only) Download <a
                          href="https://naukriyan.com/sample-jobseeker.csv"
                          target="_blank">Sample File</a></span></label>
                      <input type="file" class="form-control form-control-file" @change="onChangeFile($event)">
                    </div>
                    <button class="btn btn-primary" :disabled="isImport">{{
                        isImport ? 'Importing' : 'Import'
                      }}
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-jobseeker-registration" role="tabpanel"
                 aria-labelledby="nav-profile-tab">
              <div class="card card-primary">
                <div class="card-header gr">
                  <h3 class="card-title">Add New Jobseeker</h3>
                </div>
                <form role="form" @submit.prevent="addjobseeker()">
                  <div class="card-body">
                    <div class="form-row">

                      <div class="form-group col-md-4 mb-3">
                        <label for="fname"> First name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name" v-model="form.fname"
                               name="fname" :class="{ 'is-invalid': form.errors.has('fname') }">
                        <has-error :form="form" field="fname"></has-error>
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" id="lname" placeholder="Last Name" v-model="form.lname"
                               name="lname" :class="{ 'is-invalid': form.errors.has('lname') }">
                        <has-error :form="form" field="lname"></has-error>
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email"
                               name="email" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" placeholder="Add Contact number"
                               v-model="form.contact" name="contact"
                               :class="{ 'is-invalid': form.errors.has('contact') }"
                               maxlength="10">
                        <has-error :form="form" field="contact"></has-error>
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="gender">Gender</label>
                        <select class="form-control" :class="{ 'is-invalid': form.errors.has('gender') }"
                                v-model="form.gender">
                          <option disabled value="">Select One</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Others">Others</option>
                        </select>
                      </div>

                      <div class="form-group col-md-4 mb-3">
                        <label for="establish_date">Date of birth</label>
                        <input type="date" class="form-control" id="dob" placeholder=" DOB" v-model="form.dob"
                               name="establish_date" :class="{ 'is-invalid': form.errors.has('dob') }"
                               autocomplete="off">
                        <has-error :form="form" field="dob"></has-error>
                      </div>

                    </div>


                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>

          </div>

        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</template>

<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        fname: '',
        lname: '',
        email: '',
        contact: '',
        gender: '',
        dob: '',
      }),
      bulkData: '',
      isImport: false
    }
  },

  mounted() {
    this.$store.dispatch('getAllData', '/jobseeker')
  },

  methods: {
    importBulkJob() {
      this.isImport = true;
      let currentObj = this;
      const config = {
        headers: {'content-type': 'multipart/form-data'}
      }
      let formData = new FormData();
      formData.append('csvFile', this.bulkData);
      axios.post('/import-jobseeker-job', formData, config).then(function (response) {
        console.log(response)
        currentObj.isImport = false;
        if (response.data.status === 'success') {
          toast({
            type: 'success',
            title: 'success import file',
          })
          currentObj.$router.push('/jobseeker-list')
        } else {
          toast({
            type: 'warning',
            title: 'Something went wrong. File not import',
          })
        }
      }).catch(function (error) {
        currentObj.isImport = false;
        console.log(error);
      });
    },

    onChangeFile(event) {
      this.bulkData = event.target.files[0];
    },

    addjobseeker() {
      this.form.post('/add-jobseeker')
          .then(() => {
            this.$router.push('/jobseeker-list')
            toast({
              type: 'success',
              title: 'Jobseeker Added successfully'
            })
          })
          .catch(() => {

          })
    }
  }
}
</script>

<style scoped>
textarea, input {

  -webkit-appearance: textfield;
}
</style>