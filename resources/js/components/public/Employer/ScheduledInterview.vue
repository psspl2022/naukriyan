<template>
  <div id="reports">
    <Emp-header></Emp-header>
    <section>
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Scheduled Interview</li>
                </ol>
              </div>
              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411 </a>
                </p>
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
              <h2 class="hk-pg-title">Scheduled Interview</h2>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <div class="search-bar">
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <input
                        type="date"
                        class="form-control"
                        placeholder="Enter From Date"
                        id="startDate"
                      />
                    </div>
                    <div class="col-sm-4">
                      <input
                        type="date"
                        class="form-control"
                        placeholder="Enter To Date"
                        id="endDate"
                      />
                    </div>
                    <div class="col-sm-4">
                      <button
                        type="submit"
                        class="btn btn-secondary text-white mr-2"
                      >
                        submit
                      </button>
                      <button
                        type="submit"
                        class="btn btn-secondary text-white mr-2"
                      >
                        Reset
                      </button>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-head-fixed custom-table mt-2">
                    <thead>
                      <tr>
                        <th>SN#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Position</th>
                        <th>Date of Scheduled</th>
                        <th>Date of Interview</th>
                        <th>Send Notification</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(
                          scheduleInterview, index
                        ) in scheduledInterviewList"
                        :key="scheduleInterview.id"
                      >
                        <td>{{ index + 1 }}</td>
                        <td>
                          {{ scheduleInterview.fname }}
                          {{ scheduleInterview.lname }}
                        </td>
                        <td>{{ scheduleInterview.email }}</td>
                        <td>{{ scheduleInterview.contact }}</td>
                        <td>{{ scheduleInterview.applied_for }}</td>
                        <td>{{ scheduleInterview.updated_at }}</td>
                        <td>Need to be clarify</td>
                        <td>
                          <button class="btn btn-success btn-xs">Notify</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "ScheduledInterview",
  data() {
    return {
      scheduledInterviewList: [],
    };
  },
  methods: {
    InterviewScheduled() {
      axios.get("scheduled-interview").then((response) => {
        if (response.status === 200) {
          this.scheduledInterviewList = response.data.data;
        }
      });
    },
  },
  mounted: function () {
    this.InterviewScheduled();
  },
};
</script>

<style scoped>
</style>
