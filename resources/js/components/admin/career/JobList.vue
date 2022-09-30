<template>
    <section class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <router-link to="/career-post-job" class="btn btn-primary">Create Job</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SN#</th>
                                    <th>Job Title</th>
                                    <th>Experience</th>
                                    <th>Total Opening</th>
                                    <th>CTC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(job, index) in jobs" :key="job.id">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ job.post_name }}</td>
                                    <td>{{ (job.min_exp) ? job.min_exp : '0' }} - {{ (job.max_exp) ? job.max_exp : '0' }}</td>
                                    <td>{{ job.total_opening }}</td>
                                    <td>{{ job.current_ctc }}</td>
                                    <td>
                                        <router-link :to="`/career-edit-job/${job.id}`" class="btn btn-warning btn-sm">Edit</router-link>
                                        <a href="javascript.void(0)" class="btn btn-danger btn-sm" @click.prevent="deleteCareerJob(job.id)">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "JobList",
        data() {
            return {
                jobs: []
            }
        },
        mounted() {
            this.getCareerJobs();
        },
        methods: {
            getCareerJobs() {
                axios.get('/get-career-jobs').then(response => {
                    if (response.status === 200) {
                        this.jobs = response.data.data;
                    }
                }).catch(error => {
                    console.log(error);
                })
            },
            deleteCareerJob(id) {
                axios.post('/delete-job/'+id).then(response => {
                    if (response.status === 200) {
                        this.getCareerJobs();
                        toast({
                            type: 'success',
                            title: 'Job deleted successfully'
                        })
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>