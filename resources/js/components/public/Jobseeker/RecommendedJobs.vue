<template>
    <div id="recommended-jobs">
        <jobseeker-header></jobseeker-header>
        <section>
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Recommended Jobs</li>
                                </ol>
                            </div>
                            <div class="col-xs-12 col-sm-4 hidden-xs">
                                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="top-adjust section pb-5 pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="interview ">
                                    <h2 class="interview">Recommended Jobs</h2>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover custom-table">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Job Title</th>
                                                <th>Position</th>
                                                <th>Company Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr v-for="(recommendedJob, index) in recommendedJobs" :key="recommendedJob.id">
                                                <td>{{ index+1 }}</td>
                                                <td>{{ recommendedJob.title }}</td>
                                                <td>{{ recommendedJob.job_role }}</td>
                                                <td>{{ recommendedJob.companies.company_name ? recommendedJob.companies.company_name : 'N/A' }}</td>
                                                <td>
                                                    <router-link :to="`/edit-viewjobs/${recommendedJob.id}`" class="btn btn-primary apply-btn">
                                                        View Job
                                                    </router-link>
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
        name: "RecommendedJobs",
        data() {
            return {
                recommendedJobs: [],
            }
        },
        mounted() {
            this.getRecommendedJobs();
        },
        methods: {
            getRecommendedJobs() {
                axios.get('/recommended-job').then(response => {
                    this.recommendedJobs = response.data.data;
                })
            }
        }
    }
</script>

<style scoped>
    .apply-btn {
        color: white!important;
    }
</style>