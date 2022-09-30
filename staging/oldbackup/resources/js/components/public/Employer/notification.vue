<template>
  <div id="EmpDashboard">
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
                  <li class="active">Employer Notification</li>
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
    <section class="text-center section top-adjust mt-2 mb-2">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link read-header card-header job-header active mb-3" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar">
                <b>Rakesh jha </b> applied for <b> Web developer</b></a>
              <a class="nav-link read-header card-header job-header mb-3" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar">
                <b>Rakesh jha </b> applied for <b> Web developer</b></a>
              <a class="nav-link read-header card-header job-header mb-3" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar">
                <b>Rakesh jha </b> applied for <b> Web developer</b></a>
              <a class="nav-link read-header card-header job-header mb-3" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                <img src="https://www.w3schools.com/howto/img_avatar.png" class="avatar">
                <b>Rakesh jha </b> applied for <b> Web developer</b></a>
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <table class="table table-responsive">

                  <tbody>
                  <tr>
                    <td>Name :</td>
                    <td>Rakesh jha </td>
                    <td>Email :</td>
                    <td>rakesh@gmail.com</td>
                  </tr>
                  <tr>
                    <td>Contact :</td>
                    <td>7828559183</td>
                    <td>applied for :</td>
                    <td>web developer</td>
                  </tr>


                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <table class="table table-responsive">

                  <tbody>
                  <tr>
                    <td>Name :</td>
                    <td>Rakesh jha </td>
                    <td>Email :</td>
                    <td>rakesh@gmail.com</td>
                  </tr>
                  <tr>
                    <td>Contact :</td>
                    <td>sjdfgshfg</td>
                    <td>applied for :</td>
                    <td>web sdfsdfsdf</td>
                  </tr>


                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <table class="table table-responsive">

                  <tbody>
                  <tr>
                    <td>Name :</td>
                    <td>Rakesh jha </td>
                    <td>Email :</td>
                    <td>rakesh@gmail.com</td>
                  </tr>
                  <tr>
                    <td>Contact :</td>
                    <td>7828559183</td>
                    <td>applied for :</td>
                    <td>web developer</td>
                  </tr>


                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <table class="table table-responsive">

                  <tbody>
                  <tr>
                    <td>Name :</td>
                    <td>Rakesh jha </td>
                    <td>Email :</td>
                    <td>rakesh@gmail.com</td>
                  </tr>
                  <tr>
                    <td>Contact :</td>
                    <td>7828559183</td>
                    <td>applied for :</td>
                    <td>web developer</td>
                  </tr>


                  </tbody>
                </table>
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
  name: "Notification",
  data() {
    return {
      empNotifications: [],
    };
  },
  mounted() {
    axios.get("/employer-notification").then((response) => {
      this.empNotifications = response.data;
    });
  },
};
</script>

<style scoped>
.box {
  color: #fff;
  padding: 1rem;
  height: 135px;
}
.avatar {
  height: 50px;
  width: 50px;
  margin-right: 10px;
}
.list-group a {
  color: #000;
}
.list-group-item {
  text-align: left;
}
#accordion {
  text-align: initial;
}
.card-header {
  background-color: #70b5f933;
  cursor: pointer;
  display: flex;
}
.read-header {
  background-color: #fff;
}
.card-header a {
  color: #000000e6 !important;
}
.btn-link {
  color: #404040 !important;
}
.collapse {
  padding: 1rem;
}
.fadeIn-top {
  top: 20%;
}

.content {
  position: relative;
  width: 100%;
  /* max-width: 400px; */
  margin: auto;
  overflow: hidden;
}
.content .content-overlay {
  background: rgba(0, 0, 0, 0.7);
  position: absolute;
  height: 99%;
  width: 100%;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay {
  opacity: 1;
}

.content-image {
  width: 100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details {
  top: 50%;
  left: 50%;
  opacity: 1;
}

.content-details h3 {
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}
.content a {
  padding: 0;
  border: 0;
  border-radius: 0;
}
.content-details p {
  color: #fff;
  font-size: 0.8em;
}
.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff !important;
}
</style>