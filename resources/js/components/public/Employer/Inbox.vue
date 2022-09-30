<template>
  <div id="inbox">
    <Emp-header></Emp-header>
    <header class="masthead1 text-center text-white">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-5 pb-4">Messages</h1>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section class="mail-inbox mt-3 mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mail-box">
              <aside class="sm-side">
                <div class="user-head">
                  <div class="inbox-avatar">
                    <img
                      v-if="allProfile.profile_pic_thumb"
                      width="60"
                      height="60"
                      :src="
                        '/emp_profile_image/' + allProfile.profile_pic_thumb
                      "
                    />
                    <img
                      v-else
                      src="default_images/no_image_available.png"
                      width="60"
                      height="60"
                    />
                  </div>
                  <div class="user-name">
                    <h5>{{ allProfile.fname }} {{ allProfile.lname }}</h5>
                    <span>{{ allProfile.email }}</span>
                  </div>
                </div>
                <div class="inbox-body">
                  <a
                    @click.prevent="composeMail()"
                    class="btn btn-primary text-white btn-block custom-compose"
                    >Compose</a
                  >
                </div>
                <ul class="inbox-nav inbox-divider">
                  <li>
                    <router-link :to="`/emp-inbox`">
                      <i class="fa fa-inbox"></i> Inbox
                      <span
                        class="label label-danger pull-right"
                        v-if="countUnreadMessage > 0"
                        >({{ countUnreadMessage }})</span
                      >
                    </router-link>
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
                  <h3>Inbox</h3>
                </div>
                <div class="inbox-body mail-box-section">
                  <table class="table table-inbox table-bordered table-hover">
                    <tbody>
                      <tr class="dark">
                        <td>#</td>
                        <td>From</td>
                        <td>Subject</td>
                        <td>Attachment</td>
                        <td>Time</td>
                      </tr>

                      <tr
                        v-bind:class="
                          message.read_status === '0' ? 'unread' : 'read'
                        "
                        v-for="message in alldata"
                        :key="message.id"
                        v-if="alldata.length > 0"
                      >
                        <td class="inbox-small-cells">
                          <input type="checkbox" class="mail-checkbox" />
                        </td>
                        <td class="view-message dont-show">
                          <router-link
                            :to="`/emp-inbox-single/${message.id}`"
                            >{{ message.receiver_email }}</router-link
                          >
                        </td>
                        <td class="view-message">
                          <router-link
                            :to="`/emp-inbox-single/${message.id}`"
                            >{{ message.subject }}</router-link
                          >
                        </td>
                        <td
                          class="view-message inbox-small-cells"
                          width="5%"
                          v-if="message.attachment"
                        >
                          <i class="fa fa-paperclip"></i>
                        </td>
                        <td
                          class="view-message inbox-small-cells"
                          width="5%"
                          v-else
                        >
                          No Attachment
                        </td>
                        <td class="view-message text-right" width="14%">
                          {{ message.created_at | checkCurrentDateTime }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="inbox-body mail-body">
                  <form
                    method="post"
                    @submit.prevent="sendMessage()"
                    enctype="multipart/form-data"
                  >
                    <div class="form-group">
                      <label for=""
                        >Recipient Email Address
                        <span class="required">*</span></label
                      >
                      <input
                        type="email"
                        class="form-control"
                        v-model="form.email_id"
                        placeholder="Recipient Email Address"
                      />
                    </div>
                    <div class="form-group">
                      <label for=""
                        >Subject <span class="required">*</span></label
                      >
                      <input
                        type="text"
                        class="form-control"
                        v-model="form.subject"
                        placeholder="Enter Subject..."
                      />
                    </div>
                    <div class="form-group">
                      <label for=""
                        >Message <span class="required">*</span></label
                      >
                      <ckeditor
                        :editor="editor"
                        v-model="form.editorData"
                      ></ckeditor>
                    </div>
                    <div class="form-group">
                      <label for=""
                        >Upload Attachment
                        <span class="text-muted">(Optional)</span></label
                      >
                      <input
                        type="file"
                        class="form-control"
                        v-on:change="onResumeChange"
                      />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary text-white">
                        {{ status ? "Sending..." : "Send" }}
                      </button>
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
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
var moment = require("moment");
export default {
  name: "Inbox",
  data() {
    return {
      moment: moment,
      message_box: false,
      editor: ClassicEditor,
      status: false,
      countUnreadMessage: 0,

      form: new Form({
        email_id: "",
        subject: "",
        editorData: "",
        attachment: "",
      }),
    };
  },
  mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
    this.$store.dispatch("getAllData", "/get-message-for-jobseeker");
    axios.get("get-unread-message").then((response) => {
      this.countUnreadMessage = response.data;
    });
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
  methods: {
    composeMail() {
      $(".mail-box-section").hide();
      $(".inbox-head h3").text("Compose Mail");
      $(".mail-body").show();
    },
    sendMessage() {
      this.status = true;
      axios
        .post("/send-message-to-jobseeker", this.form)
        .then((response) => {
          if (response.status === 200) {
            toast({
              type: "success",
              title: "Message send successfully",
            });
            this.status = false;
            let self = this;
            // Reset form data after success
            Object.keys(this.form).forEach(function (key, index) {
              self.form[key] = "";
            });
          }
        })
        .catch((error) => {
          console.log(error);
          this.status = false;
        });
    },
    com_message($nm, id) {
      this.message_box = true;
      this.currentTab = id;
    },
    onResumeChange(event) {
      let file = event.target.files[0];
      if (file.size > 5242880) {
        swal({
          type: "error",
          title: "Oops...",
          text: "Your file size is too large.",
        });
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.attachment = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
  },
  filters: {
    checkCurrentDateTime: function (date) {
      if (!date) return "";
      let currentDate = moment().format("YYYY-MM-DD");
      let createdDate = moment(date).format("YYYY-MM-DD");
      if (currentDate === createdDate) {
        return moment(date).format("LT"); // 03:55 PM
      } else {
        return moment(date).format("MMM DD"); // JUN 29
      }
    },
  },
};
</script>

<style scoped>
.label-danger {
  font-weight: bold;
}
.mail-body {
  display: none;
}
.required {
  color: red !important;
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
ul.inbox-nav li a:hover,
ul.inbox-nav li.active a,
ul.inbox-nav li a:focus {
  background: none repeat scroll 0 0 #d5d7de;
  color: #6a6a6a;
}
ul.inbox-nav li a i {
  color: #6a6a6a;
  font-size: 16px;
  padding-right: 10px;
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
ul.labels-info li a:hover,
ul.labels-info li a:focus {
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
.table-inbox {
  border: 1px solid #d3d3d3;
  margin-bottom: 0;
}
.table-inbox tr td {
  padding: 12px !important;
}
.table-inbox tr td:hover {
  cursor: pointer;
}
.table-inbox tr.unread td {
  background: none repeat scroll 0 0 #f7f7f7;
  font-weight: 600;
}
ul.inbox-pagination li {
  float: left;
}
.mail-option .chk-all input[type="checkbox"] {
  margin-top: 0;
}
.inbox-pagination li span {
  display: inline-block;
  margin-right: 5px;
  margin-top: 7px;
}
.inbox-body .modal .modal-body input,
.inbox-body .modal .modal-body textarea {
  border: 1px solid #e6e6e6;
  box-shadow: none;
}
.modal-body label {
  font-family: "Open Sans", sans-serif;
  font-weight: 400;
}
.heading-inbox h4 {
  border-bottom: 1px solid #ddd;
  color: #444;
  font-size: 18px;
  margin-top: 20px;
  padding-bottom: 10px;
}
.sender-info img {
  height: 30px;
  width: 30px;
}
.view-mail a {
  color: #ff6c60;
}
.attachment-mail ul {
  display: inline-block;
  margin-bottom: 30px;
  width: 100%;
}
.attachment-mail ul li {
  float: left;
  margin-bottom: 10px;
  margin-right: 10px;
  width: 150px;
}
.attachment-mail ul li img {
  width: 100%;
}
.attachment-mail ul li span {
  float: right;
}
.fileinput-button input {
  cursor: pointer;
  direction: ltr;
  font-size: 23px;
  margin: 0;
  opacity: 0;
  position: absolute;
  right: 0;
  top: 0;
  transform: translate(-300px, 0px) scale(4);
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