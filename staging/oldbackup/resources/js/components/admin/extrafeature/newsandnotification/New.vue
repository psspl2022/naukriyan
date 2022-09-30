<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <button class="btn btn-primary">
                            <router-link to="/packagemanager-list" style="color:#fff">News And Notification List
                            </router-link>
                        </button>
                    </ol>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add News And Notification</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add News</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addnews()">
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="news_subject"> News Subject</label>
                                    <input type="text" class="form-control" id="news_subject"
                                           placeholder="Add News Subject" v-model="form.news_subject"
                                           name="news_subject"
                                           :class="{ 'is-invalid': form.errors.has('news_subject') }">
                                    <has-error :form="form" field="news_subject"></has-error>
                                </div>


                                <div class="form-group">
                                    <label for="one_liner_news">News/Notification(One liner)</label>
                                    <input type="text" class="form-control" id="one_liner_news"
                                           placeholder="Add News One liner" v-model="form.one_liner_news"
                                           name="one_liner_news"
                                           :class="{ 'is-invalid': form.errors.has('one_liner_news') }" min="0">
                                    <has-error :form="form" field="one_liner_news"></has-error>
                                </div>


                                <div class="form-group">
                                    <label>News For</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('news_for') }"
                                            v-model="form.news_for">
                                        <option disabled value="">Select One</option>
                                        <option value="All">All</option>
                                        <option value="Jobseeker">Job Seeker</option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Employer">Employer</option>
                                        <option value="SubUser">SubUser</option>

                                    </select>
                                    <has-error :form="form" field="news_for"></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Description"
                                              v-model="form.description" name="description"
                                              :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                    <has-error :form="form" field="description"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="titleId">Upload Attachment <span
                                            class="text-muted">(Upload only image)</span></label>
                                    <input type="file" class="form-control" name="attachment"
                                           @change="changePhoto($event)">
                                    <has-error :form="form" field="title"></has-error>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "New",
        data() {
            //let now = new Date()
            return {

                form: new Form({

                    news_subject: '',
                    one_liner_news: '',
                    news_for: '',
                    description: '',
                    attachment: '',

                })
            }
        },
        mounted() {
            //this.$store.dispatch('getAllData','/package')
        },
        computed: {

            // allCountry(){
            //   return this.$store.getters.getAllData
            // },

        },

        methods: {

            addnews() {
                this.form.post('/add-news-notification')
                    .then(() => {
                        this.$router.push('/newsandnotification-list')
                        toast({
                            type: 'success',
                            title: 'News And Notification Added successfully'
                        })
                    })
                    .catch(() => {

                    })

            },
            changePhoto(event) {
                let file = event.target.files[0];

                if (file.size > 1048576) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'File Size should be less than 1MB!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.attachment = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }

                /* let fileName = event.target.files[0].name;
                 let fileSize = event.target.files[0].size;
                 let fileExtension = fileName.split('.').pop();
                 let files = event.target.files[0];
                 console.log(fileExtension);

                 let reader = new FileReader();
                 reader.onload = event => {
                     this.files.document.push(event.target.result);
                 };
                 reader.readAsDataURL(files);

                 if(this.allowedExtension.includes(fileExtension) === false) {
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'File not allowed. Please upload only .docx, .doc and .pdf'
                     })
                 } else if(fileSize > 1048576) {
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'File size should be less then 1 MB'
                     })
                 } else {
                     console.log(this.files.document);
                     axios.post('/add-news-notification', {
                         file: +this.document
                     }).then(response => {
                         swal({
                             type: 'success',
                             title: 'Success',
                             text: response.data.success
                         })
                     }).catch(response => {
                         console.log(response.data.error)
                     })
                 }*/


            },
        }
    }
</script>

<style scoped>
    textarea, input {

        -webkit-appearance: textfield;
    }
</style>