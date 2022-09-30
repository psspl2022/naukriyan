<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Government Jobs List</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link style="color:#fff" to="/add-govt-job"> Add Job</router-link>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Job Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(govtJob, index) in govtJobs.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ govtJob.title }}</td>
                  <td>{{ govtJob.start_apply_date | dateFormat }}</td>
                  <td>{{ govtJob.last_apply_date | dateFormat }}</td>
                  <td><span :class="govtJob.status === 'Active' ? 'badge badge-success' : 'badge badge-danger'">{{ govtJob.status }}</span></td>
                  <td>
                    <router-link :to="`/edit-govt-job/${govtJob.id}`" class="btn btn-warning">Edit</router-link>
                    <a href="" @click.prevent="deleteGovtJob(govtJob.id)" class="btn btn-danger">{{ deleteStatus ? 'Deleting' : 'Delete' }}</a>
                  </td>
                </tr>
                </tbody>
              </table>
              <pagination :data="govtJobs" @pagination-change-page="getGovtJobs"></pagination>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
var moment = require('moment');
export default {
  name: "List",
  data() {
    return {
      moment:moment,
      govtJobs: [],
      deleteStatus: false
    }
  },
  mounted() {
    this.getGovtJobs()
  },

  methods: {
    async getGovtJobs(page = 1) {
      try {
        const response = await axios.get("get-govt-job?page=" + page);
        this.govtJobs = response.data;
      } catch(error) {
        console.log("error", error);
      }
    },

    deleteGovtJob(id) {
      if (confirm('Do you want to delete?')) {
        this.deleteStatus = true;
        axios.delete('/delete-govt-job', {params: {'id': id}}).then(response => {
          if (response.data.status === 'success') {
            this.deleteStatus = false;
            this.getGovtJobs();
          }
        }).catch(error => {
          console.log("error", error);
          this.deleteStatus = false;
        })
      }
    }
  },

  filters: {
    dateFormat: function (date) {
      if (!date) return ''
      return moment(String(date)).format('DD-MM-YYYY')
    }
  }
}
</script>

<style scoped>

</style>