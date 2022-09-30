<template>
  <section class="container mt-2">
    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
      <a class="nav-item nav-link mt-4 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
         aria-controls="nav-home" aria-selected="true"><b>Bulk post</b></a>
      <a class="nav-item nav-link mt-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
         aria-controls="nav-profile" aria-selected="false"> <b>Single post</b> </a>
    </div>

    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <h4>Important Instruction</h4>
        <ul>
          <li>All date format should be YYYY-MM-DD (Example: 2020-12-19)</li>
          <li>Government application link should be compulsory.</li>
        </ul>
        <div class="card">
          <div class="card-header">
            <h3>Bulk Post</h3>
          </div>
          <form method="post" enctype="multipart/form-data" @submit.prevent="importBulkJob()">
            <div class="card-body">
              <div class="form-group">
                <label>Upload Sheet <span class="text-muted"> (CSV only) Download <a
                    href="https://naukriyan.com/sample.csv" target="_blank">Sample File</a></span></label>
                <input type="file" class="form-control form-control-file" @change="onChangeFile($event)">
              </div>
              <button class="btn btn-primary ">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                    <input type="text" class="form-control" placeholder="Enter your qualification"
                           v-model="form.educational_qualification">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Experience (In year)</label>
                    <select class="form-control" v-model="form.experience">
                      <option value="">Select Experience</option>
                      <option :value="exp" v-for="exp in experience">{{ exp }}</option>
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
                    <label>Notification URL (optional)</label>
                    <!--                    <input type="file" class="form-control form-control-file" accept="application/pdf"-->
                    <!--                           @change="uploadImage($event)" aria-describedby="fileHelp">-->
                    <input type="text" v-model="form.attachment" placeholder="Notification URL" class="form-control">
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
                <button type="submit" class="btn btn-primary btn-block btn-form mt-4" @click.prevent="createJobPost()">
                  {{ status ? 'Submitting...' : 'Submit' }}
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

  </section>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  name: "New",
  data() {
    return {
      status: false,
      editor: ClassicEditor,
      experience: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
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
        job_description: ''
      }),
      bulkData: ''
    }
  },
  methods: {
    importBulkJob() {
      let currentObj = this;
      const config = {
        headers: {'content-type': 'multipart/form-data'}
      }
      let formData = new FormData();
      formData.append('csvFile', this.bulkData);
      axios.post('/import-govt-job', formData, config).then(function (response) {
        if (response.data.status === 'success') {
          toast({
            type: 'success',
            title: 'success import file',
          })
          currentObj.$router.push('/govt-jobs-list')
        } else {
          toast({
            type: 'warning',
            title: 'Something went wrong. File not import',
          })
        }
      }).catch(function (error) {
        console.log(error);
      });
    },

    onChangeFile(event) {
      this.bulkData = event.target.files[0];
    },

    createJobPost() {
      let self = this;
      this.status = true;
      axios.post('/create-govt-job', {
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
    },

    uploadImage(event) {
      let file = event.target.files[0];
      let type = event.target.files[0].type;
      if (type === 'application/pdf') {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.attachment = event.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        toast({
          type: 'warning',
          title: 'Please upload only pdf'
        })
      }
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

.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
  background-color: #007bff !important;
  color: #fff;
}
</style>