<template>
    <div>
        <Emp-header></Emp-header>
        <header class="masthead1 text-center text-white mt-5">
            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">Messages</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

        <section class="mail-inbox">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail-box">
                            <aside class="sm-side">
                                <div class="user-head">
                                    <div class="inbox-avatar">
                                        <img v-if="allProfile.profile_pic_thumb" width="64" height="60" :src="'/emp_profile_image/' +allProfile.profile_pic_thumb">
                                        <img v-else src="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/portrait/small/avatar-s-1.png" width="64" height="60">
                                    </div>
                                    <div class="user-name">
                                        <h5>{{ allProfile.fname }} {{ allProfile.lname }}</h5>
                                        <span>{{ allProfile.email }}</span>
                                    </div>
                                </div>
                                <div class="inbox-body">
                                    <a @click.prevent="composeMail()" class="btn btn-primary text-white btn-block custom-compose">Compose</a>
                                </div>
                                <ul class="inbox-nav inbox-divider">
                                    <li class="active">
                                        <router-link :to="`/emp-inbox`"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right" v-if="countUnreadMessage > 0">({{ countUnreadMessage }})</span></router-link>
                                    </li>
                                    <li>
                                        <router-link :to="`/emp-send-mail`">
                                            <i class="fa fa-envelope"></i> Send Mail
                                        </router-link>
                                    </li>
                                </ul>
                            </aside>
                            <aside class="lg-side">
                                <div class="inbox-head">
                                    <span><router-link :to="`/emp-inbox`"><i class="fa fa-arrow-left"></i></router-link></span>
                                </div>
                                <div class="inbox-body mail-box-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="subject-body">
                                                <span><strong>Subject:</strong> {{ singleMessage.subject }}</span>
                                                <span class="date-time"><strong>Received on:</strong> {{ singleMessage.created_at | checkCurrentDateTime }}</span>
                                            </div>
                                            <hr>
                                            <div class="message-body mt-5">
                                                <p v-html="singleMessage.message"></p>
                                            </div>
                                            <div class="attachment-link" v-if="singleMessage.attachment">
                                                <a href="#" @click.prevent="downloadAttachment(singleMessage.id)" class="btn btn-primary text-white btn-download"><i class="fa fa-paperclip"></i> {{ status ? 'Downloading...' : 'Download Attachment' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="inbox-body mail-body">
                                    <form method="post" @submit.prevent="sendMessage()" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Recipient Email Address <span class="required">*</span></label>
                                            <input type="email" class="form-control" v-model="form.email_id" placeholder="Recipient Email Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Subject <span class="required">*</span></label>
                                            <input type="text" class="form-control" v-model="form.subject" placeholder="Enter Subject...">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Message <span class="required">*</span></label>
                                            <ckeditor :editor="editor" v-model="form.editorData"></ckeditor>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Upload Attachment <span class="text-muted">(Optional)</span></label>
                                            <input type="file" class="form-control" v-on:change="onResumeChange">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary text-white">{{ status ? 'Sending...' : 'Send' }}</button>
                                        </div>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main-footer></main-footer>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    var moment = require('moment');
    export default {
        name: "Inbox",
        data(){
            //let now = new Date()
            return {
                countUnreadMessage: 0,
                status: false,
                editor: ClassicEditor,
                singleMessage: '',
                inboxId: this.$route.params.id,

                form: new Form({
                    email_id:'',
                    subject: '',
                    editorData: '',
                    attachment:'',
                })
            }
        },
        mounted(){
           this.$store.dispatch('getAllProfile','/userprofile')

           axios.get('/get-single-inbox-message/' +this.inboxId).then(response => {
               this.singleMessage = response.data[0];
           })

           axios.get('/mark-as-read/' +this.inboxId).then(response => {

           })

           axios.get('get-unread-message').then(response => {
               this.countUnreadMessage = response.data;
           })
        },
        computed : {
            allProfile(){
                return this.$store.getters.getAllProfile
            }
        },
        methods: {
            composeMail() {
                $(".mail-box-section").hide();
                $('.inbox-head h3').text("Compose Mail");
                $(".mail-body").show();
            },
            sendMessage() {
                this.status = true;
                axios.post('/send-message-to-jobseeker', this.form).then(response => {
                    if (response.status === 200) {
                        toast({
                            type: 'success',
                            title: 'Message send successfully'
                        })
                        this.status = false;
                        let self = this;
                        // Reset form data after success
                        Object.keys(this.form).forEach(function(key,index) {
                            self.form[key] = '';
                        });
                    }
                }).catch(error => {
                    console.log(error);
                    this.status = false;
                })

            },
            com_message($nm, id){
                this.message_box = true;
                this.currentTab = id;
            },
            onResumeChange(event){
                let file = event.target.files[0];
                if(file.size > 5242880){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Your file size is too large.'
                    })
                } else {
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.attachment = event.target.result
                    };
                    reader.readAsDataURL(file);
                }

            },
            downloadAttachment(id) {
                this.status = true;
                axios.get('/download-attachment/' +id).then(response => {
                    // this.downloadFile(response, 'customFilename');
                    this.status = false;
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
                    this.status = false;
                })
            },
            downloadFile(response, filename) {
                // It is necessary to create a new blob object with mime-type explicitly set
                // otherwise only Chrome works like it should
                var newBlob = new Blob([response.data], {type: 'application/pdf'})

                // IE doesn't allow using a blob object directly as link href
                // instead it is necessary to use msSaveOrOpenBlob
                if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveOrOpenBlob(newBlob)
                    return
                }

                // For other browsers:
                // Create a link pointing to the ObjectURL containing the blob.
                const data = window.URL.createObjectURL(newBlob)
                var link = document.createElement('a')
                link.href = data
                link.download = filename + '.pdf'
                link.click()
                setTimeout(function () {
                    // For Firefox it is necessary to delay revoking the ObjectURL
                    window.URL.revokeObjectURL(data)
                }, 100)
            }
        },
        filters: {
            checkCurrentDateTime: function (date) {
                if (!date) return ''
                let currentDate = moment().format('YYYY-MM-DD');
                let createdDate = moment(date).format('YYYY-MM-DD');
                if (currentDate === createdDate) {
                    return moment(date).format('LT'); // 03:55 PM
                } else {
                    return moment(date).format('MMM DD'); // JUN 29
                }
            }
        }
    }
</script>

<style scoped>
    .label-danger {
        font-weight: bold;
    }
    .mail-body {
        display: none;
    }
    .mail-box {
        border-collapse: collapse;
        border-spacing: 0;
        display: table;
        table-layout: fixed;
        width: 100%;
    }
    .mail-box aside {
        display: table-cell;
        float: none;
        height: 100%;
        padding: 0;
        vertical-align: top;
    }
    .mail-box .sm-side {
        background: none repeat scroll 0 0 #e5e8ef;
        border-radius: 4px 0 0 4px;
        width: 25%;
    }
    .mail-box .lg-side {
        background: none repeat scroll 0 0 #fff;
        border-radius: 0 4px 4px 0;
        width: 75%;
    }
    .mail-box .sm-side .user-head {
        background: none repeat scroll 0 0 #00a8b3;
        border-radius: 4px 0 0;
        color: #fff;
        min-height: 80px;
        padding: 10px;
    }
    .user-head .inbox-avatar {
        float: left;
        width: 65px;
    }
    .user-head .inbox-avatar img {
        border-radius: 4px;
    }
    .user-head .user-name {
        display: inline-block;
        margin: 0 0 0 10px;
    }
    .user-head .user-name h5 {
        font-size: 14px;
        font-weight: 300;
        margin-bottom: 0;
        margin-top: 15px;
    }
    .user-head .user-name h5 a {
        color: #fff;
    }
    .user-head .user-name span a {
        color: #87e2e7;
        font-size: 12px;
    }
    .inbox-body {
        padding: 20px;
    }
    ul.inbox-nav {
        display: inline-block;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .inbox-divider {
        border-bottom: 1px solid #d5d8df;
    }
    ul.inbox-nav li {
        display: inline-block;
        line-height: 45px;
        width: 100%;
    }
    ul.inbox-nav li a {
        color: #6a6a6a;
        display: inline-block;
        line-height: 45px;
        padding: 0 20px;
        width: 100%;
    }
    ul.inbox-nav li a:hover, ul.inbox-nav li.active a, ul.inbox-nav li a:focus {
        background: none repeat scroll 0 0 #d5d7de;
        color: #6a6a6a;
    }
    ul.inbox-nav li a i {
        color: #6a6a6a;
        font-size: 16px;
        padding-right: 10px;
    }
    ul.inbox-nav li a span.label {
        margin-top: 13px;
    }
    ul.labels-info li h4 {
        color: #5c5c5e;
        font-size: 13px;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 5px;
        text-transform: uppercase;
    }
    ul.labels-info li {
        margin: 0;
    }
    ul.labels-info li a {
        border-radius: 0;
        color: #6a6a6a;
    }
    ul.labels-info li a:hover, ul.labels-info li a:focus {
        background: none repeat scroll 0 0 #d5d7de;
        color: #6a6a6a;
    }
    ul.labels-info li a i {
        padding-right: 10px;
    }
    .nav.nav-pills.nav-stacked.labels-info p {
        color: #9d9f9e;
        font-size: 11px;
        margin-bottom: 0;
        padding: 0 22px;
    }
    .inbox-head {
        background: none repeat scroll 0 0 #41cac0;
        border-radius: 0 4px 0 0;
        color: #fff;
        min-height: 80px;
        padding: 20px;
    }
    .inbox-head h3 {
        display: inline-block;
        font-weight: 300;
        margin: 0;
        padding-top: 6px;
    }
    .date-time {
        float: right;
    }
    @media (max-width: 767px) {
        .files .btn span {
            display: none;
        }
        .files .preview * {
            width: 40px;
        }
        .files .name * {
            display: inline-block;
            width: 80px;
            word-wrap: break-word;
        }
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
</style>