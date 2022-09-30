<template>
    <section class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Job</h3>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Job Title <span class="required">*</span></label>
                                       <input type="text" class="form-control" placeholder="Enter Job Title" v-model="form.job_title">
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Short Description <span class="text-muted">(optional)</span></label>
                                       <input type="text" class="form-control" placeholder="Write Short Description" v-model="form.short_desc">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Minimum Experience <span class="required">*</span></label>
                                       <input type="number" class="form-control" placeholder="Minimum Experience" v-model="form.min_exp">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Maximum Experience <span class="required">*</span></label>
                                       <input type="number" class="form-control" placeholder="Maximum Experience" v-model="form.max_exp">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>CTC <span class="required">*</span></label>
                                       <input type="text" class="form-control" placeholder="Enter CTC" v-model="form.ctc">
                                   </div>
                               </div>                                
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Total Opening <span class="required">*</span></label>
                                       <input type="number" class="form-control" placeholder="Enter Total Opening" v-model="form.total_opening">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Skill Required <span class="required">*</span></label>
                                       <input type="text" class="form-control" placeholder="Skill Required" v-model="form.skill_required">
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label>Interview Process <span class="required">*</span></label>
                                       <input type="text" class="form-control" placeholder="Interview Process" v-model="form.interview_process">
                                   </div>
                               </div>
                               <div class="col-md-12">
                                   <div class="form-group">
                                       <label>Long Description <span class="text-muted">(optional)</span></label>
                                       <ckeditor :editor="editor" v-model="form.long_desc"></ckeditor>
                                   </div>
                               </div>
                           </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" @click.prevent="createJobPost()">{{ status ? 'Submitting...' : 'Submit' }}</button>
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
        name: "PostJob.vue",
        data() {
            return {
                status: false,
                editor: ClassicEditor,
                form: new Form({
                   job_title: '',
                   short_desc: '',
                   long_desc: '',
                   min_exp: '',
                   max_exp: '',
                   ctc: '',
                   total_opening: '',
                   skill_required: '',
                   interview_process: '',
                }),
            }
        },
        methods: {
            createJobPost() {
                let self = this;
                this.status = true;
                axios.post('/create-job-post', {
                    data: self.form
                }).then(response => {
                    if (response.status === 200) {
                        this.status = false;
                        self.form.reset();
                        toast({
                            type: 'success',
                            title: 'Job created successfully'
                        })
                        this.$router.push('/career-job-list')
                    }
                }).catch(error => {
                    this.status = false;
                    toast({
                        type: 'warning',
                        title: 'Please fill required field'
                    })
                })
            }
        }
    }
</script>

<style scoped>
    .form-group .required {
        color: red!important;
    }
</style>