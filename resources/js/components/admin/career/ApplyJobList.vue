<template>
    <section class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Applied Job List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>SN#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Applied For</th>
                                <th>Resume</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(appliedList, index) in appliedLists">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ appliedList.full_name }}</td>
                                    <td>{{ appliedList.email_id }}</td>
                                    <td>{{ appliedList.phone_num }}</td>
                                    <td>{{ (appliedList.careers) ? appliedList.careers.post_name : 'N/A' }}</td>
                                    <td>
                                        <a href="#" @click.prevent="downloadResume(appliedList.id)" class="btn btn-primary">Download Resume</a>
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
        name: "ApplyJobList",
        data() {
            return {
                appliedLists: [],
            }
        },
        mounted() {
            axios.get('/get-applied-user-list').then(response => {
                this.appliedLists = response.data.data;
            })
        },
        methods: {
            downloadResume(id) {
                axios.get('/download-resume-career/' +id).then(response => {
                    // this.downloadFile(response, 'customFilename');
                    if (response.data.error) {
                        toast({
                            type: 'warning',
                            title: response.data.error
                        })
                    }
                }).catch(error => {
                    toast({
                        type: 'warning',
                        title: 'Something went wrong.'
                    })
                })
            }
        }
    }
</script>

<style scoped>

</style>