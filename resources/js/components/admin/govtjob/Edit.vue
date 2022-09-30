<template>
  <section class="container mt-2">

    <div class="green box mt-4">
      <div class="card">
        <div class="card-header text-center">

          <h3>Single post</h3>

        </div>
        <form action="" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Job Title <span class="required">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter Job Title" v-model="form.job_title">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <input type="text" class="form-control" placeholder="Your department" v-model="form.department">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Job apply link<span class="required">*</span></label>
                  <input class="form-control" type="text" placeholder="Job link" v-model="form.job_link">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Educational qualification<span class="required">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter your qualification" v-model="form.educational_qualification">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Experience</label>
                  <label>Experience (In year)</label>
                  <select class="form-control" v-model="form.experience">
                    <option value="">Select Experience</option>
                    <option :value="exp" v-for="exp in experience" :selected="exp === form.experience">{{ exp }}</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Age limit<span class="required">*</span></label>
                  <div class="row">
                    <div class="col-sm-6">
                      <input class="form-control" type="text" v-model="form.min_age">
                    </div>
                    <div class="col-sm-1"><b>to</b></div>
                    <div class="col-sm-5">
                      <input class="form-control" type="text" v-model="form.max_age">
                    </div>
                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>No. of posts <span class="required">*</span></label>
                  <input type="number" class="form-control" placeholder="Enter no." v-model="form.total_post">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" placeholder="Enter your location" v-model="form.location">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Starting date for apply <span class="required">*</span></label>
                  <input class="form-control" type="date" v-model="form.apply_starting_date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Last date for apply <span class="required">*</span></label>
                  <input class="form-control" type="date" v-model="form.apply_last_date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label> Fees<span class="text-muted"> (If any)</span></label>
                  <input type="text" class="form-control" placeholder="Enter the amount" v-model="form.fees">
                </div>
              </div>


              <div class="col-sm-6">
                <div class="form-group">
                  <label>Upload Excel Sheet <span class="text-muted"> (PDF only)</span></label>
                  <input type="file" class="form-control form-control-file" aria-describedby="fileHelp">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Job Description <span class="text-muted">(optional)</span></label>
                  <ckeditor :editor="editor" v-model="form.job_description"></ckeditor>
                </div>
              </div>
              <div class="col-sm-12">
                <b>All (<span style="color: red;">*</span>) fields are mandatory.
                </b>
              </div>

            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-form mt-4" @click.prevent="updateJobPost()">
                {{ status ? 'Updating...' : 'Submit' }}
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </section>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  name: "Edit",
  data() {
    return {
      status: false,
      editor: ClassicEditor,
      experience: [1,2,3,4,5,6,7,8,9,10],
      form: new Form({
        job_title: '',
        department: '',
        job_link: '',
        educational_qualification: '',
        experience: '',
        min_age: '',
        max_age: '',
        total_post: '',
        location: '',
        apply_starting_date: '',
        apply_last_date: '',
        fees: '',
        attachment: '',
        job_description: '',
        job_id: this.$route.params.id
      }),
      editJob: {}
    }
  },
  mounted() {
    axios.get('/edit-govt-job', { params : { 'id' : this.form.job_id }}).then(response => {
      this.form.job_title = response.data.data.title;
      this.form.department = response.data.data.department;
      this.form.job_link = response.data.data.government_apply_link;
      this.form.educational_qualification = response.data.data.title;
      this.form.experience = response.data.data.main_exp;
      this.form.min_age = response.data.data.min_age;
      this.form.max_age = response.data.data.max_age;
      this.form.total_post = response.data.data.job_vaccancy;
      this.form.location = response.data.data.location;
      this.form.apply_starting_date = response.data.data.start_apply_date;
      this.form.apply_last_date = response.data.data.last_apply_date;
      this.form.fees = response.data.data.fees;
      this.form.attachment = response.data.data.attachment;
      this.form.job_description = response.data.data.description;
    })
  },

  methods: {
    updateJobPost() {
      let self = this;
      this.status = true;
      axios.post('/update-govt-job', {
        data: self.form
      }).then(response => {
        if (response.status === 201) {
          this.status = false;
          self.form.reset();
          toast({
            type: 'success',
            title: 'Job created successfully'
          })
          this.$router.push('/govt-jobs-list')
        }
      }).catch(error => {
        this.status = false;
        toast({
          type: 'warning',
          title: 'Something went wrong'
        })
      })
    }
  }
}
</script>

<style scoped>
.form-group .required {
  color: red !important;
}

.form-control {
  display: block;
  width: 100%;
  height: calc(1.6em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #495057;
  background: radial-gradient(ellipse at center, #FFFFFF, #efedee6b);
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 23px;
  -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}

.card-header {
  background-color: #fbfbfb;
}

.btn-form {
  border-radius: 23px;
  padding: .40rem;
  transition: .3s ease;

}

.btn-form:hover {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2), 0 2px 10px 0 rgba(0, 0, 0, 0.1);
}
</style>