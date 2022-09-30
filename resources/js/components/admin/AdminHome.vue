<template>
  <div>
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DashBoard</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- <div class="row">
          <router-link :to="`/consolidate-data`"
            ><a href="" class="badge badge-success"
              >Consolidate Data</a
            ></router-link
          >
        </div> -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <router-link
              :to="{
                path: '/jobseeker-list',
                query: { curdate: 'yes' },
              }"
            >
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ countAll.today_jobseeker }}</h3>

                  <p>Jobseekers registered Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>

          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <router-link
              :to="{
                path: '/resume-list',
                query: { curdate: 'yes' },
              }"
            >
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ countAll.today_resume_uploaded }}</h3>

                  <p>Resume Uploaded Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <router-link
              :to="{
                path: '/employer-list',
                query: { curdate: 'yes' },
              }"
            >
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ countAll.today_employer }}</h3>

                  <p>Employer Registered Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <router-link
              :to="{
                path: '/jobmanager-list',
                query: { curdate: 'yes' },
              }"
            >
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ countAll.today_job_posted }}</h3>

                  <p>Job Posted Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->
          <!-- //2nd row -->
          <div class="col-lg-3 col-6">
            <router-link :to="`/jobmanager-list`">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ countAll.total_active_jobs }}</h3>

                  <p>Live jobs</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <router-link
              :to="{
                path: '/resume-list-by-jobs',
                query: { curdate: 'yes' },
              }"
            >
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ countAll.today_application }}</h3>

                  <p>Application Received Today</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <router-link :to="`/employer-list`">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ countAll.total_employer }}</h3>

                  <p>No.of Recruiters(Employer)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <router-link :to="`/jobseeker-list`">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ countAll.total_jobseeker }}</h3>

                  <p>No.of Jobseekers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </router-link>
          </div>
          <!-- ./col -->

          <!-- 3rd row -->
          <div class="col-lg-3 col-6">
            <router-link :to="`/companies-list`">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ countAll.total_companies }}</h3>

                  <p>No.Of Companies</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>

          <div class="col-lg-3 col-6">
            <router-link :to="`/consolidate-data`">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ countAll.consolidateData }}</h3>

                  <p>Consolidate data</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>
          <div class="col-lg-3 col-6">
            <router-link :to="`/admin/tracker/list`">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ countAll.tracker }}</h3>

                  <p>Tracker data</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>
          <div class="col-lg-3 col-6">
            <router-link :to="`/resume-list-by-jobs`">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ countAll.total_application }}</h3>

                  <p>Physical Application Received</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>

          <div class="col-lg-3 col-6">
            <router-link :to="`/profile-video-resume`">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ countAll.total_video_resume }}</h3>

                  <p>Video Resume</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>

          <div class="col-lg-3 col-6">
            <router-link :to="`/self-registration-list`">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ countAll.total_online_registration }}</h3>

                  <p>Online Candidate Registration</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
              </div>
            </router-link>
          </div>

        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
</template>
<script>
export default {
  name: "AdminHome",
  data() {
    return {
      countAll: [],
    };
  },
  mounted() {
    axios.get("get-admin-dashboard-count/count").then((response) => {
      this.countAll = response.data.data;
    });
  },
};
</script>

<style scoped>
</style>