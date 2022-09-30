<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Jobseeker</li>
          </ol>
        </div>
      </div>
      <div class="row justify-content-around">
        <!-- left column -->
        <div class="col-md-11">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header gr">
              <h3 class="card-title">Edit Jobseeker</h3></div>
            {{ editData }}
            <form role="form" @submit.prevent="updateJobseeker()" enctype="multipart/form-data">
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
                           v-model="form.contact" name="contact" :class="{ 'is-invalid': form.errors.has('contact') }"
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
                           name="establish_date" :class="{ 'is-invalid': form.errors.has('dob') }" autocomplete="off">
                    <has-error :form="form" field="dob"></has-error>
                  </div>

                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" :disabled="updateStatus">{{ updateStatus ? 'Updating...' : 'Update' }}</button>
              </div>
            </form>
          </div>

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
      form: new Form({
        fname: '',
        lname: '',
        email: '',
        password: '',
        contact: '',
        gender: '',
        dob: '',
      }),
      updateStatus: false
    }
  },
  mounted() {
    this.$store.dispatch('getEditData', `/edit-jobseeker/${this.$route.params.jobseekerid}`)

  },
  computed: {
    editData() {
      this.form.fill(this.$store.getters.getEditData);
    },
  },
  methods: {
    switchVisibility() {
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

    updateJobseeker() {
      this.updateStatus = true;
      this.form.post(`/update-jobseeker/${this.$route.params.jobseekerid}`)
          .then((response) => {
            this.updateStatus = false;
            this.$router.push('/jobseeker-list')
            toast({
              type: 'success',
              title: 'Jobseeker Updated successfully'
            })
          })
          .catch(() => {
            this.updateStatus = false;
          })

    },
    updateImage() {
      let img = this.form.profile_pic_thumb;
      if (img.length > 100) {
        return this.form.profile_pic_thumb
      } else {
        return `jobseeker_profile_image/${this.form.profile_pic_thumb}`
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