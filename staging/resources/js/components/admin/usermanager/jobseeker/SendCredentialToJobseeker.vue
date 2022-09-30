<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Imported JobSeeker List</h3>
            </div>
            <div class="card-header">
              <button class="btn btn-primary" @click.prevent="sendCredentials()" :disabled="sendStatus">
                <i class="fa fa-paper-plane"></i>
                {{ sendStatus ? 'Mail Sending. Please Wait...' : 'Click to Send Credentials' }}
              </button>
              <button class="btn btn-primary">
                <router-link to="/jobseeker-list" style="color:#fff"> Back to Jobseeker List</router-link>
              </button>
            </div>
            <div class="card-body">
              <table id="example1"
                     class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" @click="selectAll()" v-model="allSelected"></th>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Active</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(jobseekers,index) in myData.data" :key="jobseekers.id"
                    :style="[jobseekers.is_credential_send === 0 ? {'background': '#ffccc3'} : {'background': '#FFF'}]">
                  <td><input type="checkbox" :value="jobseekers.id" v-model="jobseekerIds" @click="singleSelect()"></td>
                  <td>{{ index + 1 }}</td>
                  <td>{{ jobseekers.fname }} {{ jobseekers.lname }}</td>

                  <td>{{ jobseekers.email }}</td>
                  <td>{{ jobseekers.contact }}</td>
                  <td>{{ jobseekers.active }}</td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <pagination :data="myData" :limit="10" @pagination-change-page="getFilterData"></pagination>
            </div>
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
      allSelected: false,
      jobseekerIds: [],
      selected: [],
      myData: [],
      sendStatus: false
    }
  },
  methods: {
    sendCredentials() {
      if (this.jobseekerIds.length === 0) {
        alert('Please select atleast one recipient');
      } else {

        this.sendStatus = true;

        axios.post('/send-credentials-to-jobseeker', {params: {jobseeker_id: this.jobseekerIds}}).then(response => {
          console.log(response);
          if (response.data.status === 'success') {
            toast({
              type: 'success',
              title: response.data.message
            })
          } else {
            toast({
              type: 'error',
              title: 'Something went wrong.'
            })
          }
          this.sendStatus = false;
          this.getFilterData();

        }).catch(error => {
          this.sendStatus = false;
          toast({
            type: 'error',
            title: 'Something went wrong.'
          })
        })
      }
    },

    getFilterData(page = 1) {
      axios.get('imported-jobseeker?page=' + page).then(response => {
        this.myData = response.data;
      });
    },

    selectAll() {
      this.userIds = [];
      let self = this;
      if (!this.allSelected) {
        this.myData.data.forEach(function (jobseeker) {
          self.jobseekerIds.push(jobseeker.id);
        })
      } else {
        self.jobseekerIds = [];
      }
    },

    singleSelect() {
      this.allSelected = false;
    }
  },
  created: function () {
    this.getFilterData()
  }
}
</script>

<style scoped>
</style>
