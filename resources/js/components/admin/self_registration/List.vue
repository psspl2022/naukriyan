<template>
  <div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="title">Candidate Self Registration List <a href="/online-registration" target="_blank" class='btn btn-info float-right text-white'>Online Candidate Registration</a></h3>
              </div>

              <div class="card-body">
                <div class="card-header">
                    <span
                      ><b>Total Checked :</b> {{ checkedNames.length }}</span
                    >

                    <a
                      href=""
                      type="button"
                      @click.prevent="exportjobseekerchecked()"
                      class="btn btn-success btn-xl"
                      id="checkboxsButton"
                      v-if="checkedNames.length > 0"
                      >Export</a
                    >
                  </div>
                <table
                  id="example1"
                  class="table table-bordered table-hover table-striped"
                >
                  <thead>
                    <tr>
                      <th>
                      #
                      <input
                        type="checkbox"
                        v-model="selectAll"
                        @click="select"
                      />
                      Check all
                    </th>
                      <th>S.No</th>
                      <th>Self Code</th>
                      <th>Candidate Name</th>
                      <!-- <th>Category Type</th> -->
                      <th>State</th>
                      <!-- <th>District</th> -->
                      <!-- <th>City</th>
                      <th>Gender</th> -->
                      <th>Email / Contact</th>
                      <th>Resume</th>
                      <th>More Details</th>
                      <th>Added On</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(self, index) in self_data.data" :key="index">
                      <td>
                        <input
                          type="checkbox"
                          id="checkvalue"
                          :value="self.id"
                          v-model="checkedNames"
                        />
                      </td>
                      <td>{{ index + 1 }}</td>
                      <td> {{ self.self_code }} </td>
                      <td>{{ self.name ? self.name : "N/A"}}</td>
                      <!-- <td>{{ self.category ? self.category : "N/A"}}</td> -->
                      <td>{{ self.state ? self.get_state_name.states_name : "N/A"}}</td>
                      <!-- <td>{{ self.district ? self.get_district_name.district_name : "N/A"}}</td> -->
                      <!-- <td>{{ self.city ? self.city : "N/A"}}</td>
                      <td> {{ self.gender | capitalising }} </td> -->
                      <td>{{ self.email ? self.email : "N/A"}} / {{ self.contact ? self.contact : "N/A"}}</td>
                      <td v-if="self.resume">
                      <a
                        v-if="self.resume !== null"
                        href=""
                        @click="opendoc(self.resume)"
                        data-toggle="modal"
                        data-target="#addNewLocation"
                        class="badge badge-warning"
                      >
                        <i class="fas fa-eye mr-2"></i>View Resume</a
                      >

                      <a
                        :href="'self_register/' + self.resume"
                        target="_blank"
                        v-if="self.resume"
                        class="badge badge-success"
                      >
                        <i class="fa fa-download mr-2" aria-hidden="true"></i>
                        Download
                      </a>
                    </td>
                    <td v-else>Not Uploaded</td>
                    <td>
                      <a
                        href=""
                        @click="setFields(self)"
                        data-toggle="modal"
                        data-target="#viewDetails"
                        class="badge badge-primary text-white"
                      >
                        <i class="fas fa-eye mr-2"></i>View Details</a
                      >
                    </td>
                    <td>{{ self.created_on | timeformat}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->

    <!-----------Resume Modal------------------------------>
    <div class="modal fade popupForm custom-model-width" id="addNewLocation">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Resume</h4>

            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->

            <iframe
              id="resume_iframe"
              src=""
              style="width: 450px; height: 400px"
              frameborder="0"
            ></iframe>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!----------------------Resume Modal Close-------------------->

    <!-----------View Details Modal------------------------------>
    <div class="modal fade popupForm custom-model-width" id="viewDetails">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Candidate Details</h4>

            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <div id="Candidate" class="tab-pane fade show active">
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>Registration Code</label>
                      <div class="input text" id="can_self_code"></div>
                  </div>
                  <div class="col-sm-6">
                      <label>Name</label>
                      <div class="input text" id="can_name"></div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>Email</label>
                      <div class="input text" id="can_email"></div>
                  </div>
                  <div class="col-sm-6">
                      <label>Contact No.</label>
                      <div class="input text" id="can_contact"></div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>Category</label>
                      <div class="input text" id="can_category"></div>
                  </div>
                  <div class="col-sm-6">
                      <label style="margin-bottom:5px;">Gender</label>
                      <div class="input text" id="can_gender"></div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>Qualification</label>
                      <div class="input password" id="can_qualification"></div>
                  </div>
                  <div class="col-sm-6">
                      <label style="margin-bottom:5px;">State
                      </label>
                      <div class="input text" id="can_state"></div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>District</label>
                      <div class="input password" id="can_district"></div>
                  </div>
                  <div class="col-sm-6">
                      <label style="margin-bottom:5px;">City
                      </label>
                      <div class="input text" id="can_city"></div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-6">
                      <label>Pincode</label>
                      <div class="input password" id="can_pincode"></div>
                  </div>
                  <div class="col-sm-6">
                      <label style="margin-bottom:5px;">Resume
                      </label>
                      <div class="input text" id="can_resume">
                        
                      </div>
                  </div>
              </div>
              <div class="form-group row inputBox">
                  <div class="col-sm-12">
                      <label style="margin-bottom:5px;">Address
                      </label>
                      <div class="input text" id="can_address"></div>
                  </div>
              </div>
            </div>

            <!-- <iframe
              id="resume_iframe"
              src=""
              style="width: 450px; height: 400px"
              frameborder="0"
            ></iframe> -->
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!----------------------View Details Modal Close-------------------->

  </div>
</template>

<script>
var moment = require("moment");
import $ from "jquery";
export default {
  name: "List",
  data() {
    return {
      checkedNames: [],
      moment: moment,
      resultInfo: "",
      self_data: [],
      selectAll: false,
      checkedData: "",
    };
  },
  mounted() {
    this.getAllLists();
    setTimeout(() => $('#example1').DataTable(), 1000);
  },
  methods: {
    select() {
      this.checkedNames = [];

      if (!this.selectAll) {
        for (let self in this.checkedData) {
          console.log(this.checkedData[self].id);
          this.checkedNames.push(this.checkedData[self].id);
        }
      }
    },
    getAllLists: function () {
      axios.get("candidate_self_registration_list").then((response) => {
          this.self_data = response.data;
          this.resultInfo = response.data;
          this.checkedData = response.data.data;
        });
    },
    exportjobseekerchecked() {
      if (!this.checkedNames.length) {
        alert("Please select at least one row");
      } else {
        swal
          .fire({
            title: "Are you sure want export data?",
            text: "Resume details!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, export it!",
          })
          .then((result) => {
            if (result.value) {
              swal.fire(
                "Data Export!",
                "Data Exported successfully.",
                "success"
              );
              window.open(
                "/export-online-registration-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
    opendoc($doc) {
      //document.getElementById("resume_iframe").src = "";
      //let res="http://infolab.stanford.edu/pub/papers/google.pdf";
      if ($doc) {
        var appUrl = "https://naukriyan.com";
        var link =
          "https://docs.google.com/gview?url=" +
          appUrl +
          "/self_register/" +
          $doc +
          "&embedded=true";
        document.getElementById("resume_iframe").src = link;
      }
      if (!$doc) {
        var appUrl = "https://naukriyan.com";
        var link =
          "https://docs.google.com/gview?url=" +
          appUrl +
          "/resume/default.pdf&embedded=true";
      }
    },
    setFields($self) {
      document.getElementById("can_name").innerHTML = $self.name;
      document.getElementById("can_self_code").innerHTML = $self.self_code;
      document.getElementById("can_email").innerHTML = $self.email;
      document.getElementById("can_contact").innerHTML = $self.contact ? $self.contact : 'Not Filled';
      document.getElementById("can_category").innerHTML = $self.category;
      document.getElementById("can_gender").innerHTML = $self.gender;
      document.getElementById("can_qualification").innerHTML = $self.qualification;
      document.getElementById("can_state").innerHTML = $self.get_state_name.states_name;
      document.getElementById("can_district").innerHTML = $self.get_district_name.district_name;
      document.getElementById("can_city").innerHTML = $self.city ? $self.city : 'Not Filled';
      document.getElementById("can_pincode").innerHTML = $self.pincode ? $self.pincode : 'Not Filled';
      document.getElementById("can_address").innerHTML = $self.address ? $self.address : 'Not Filled';
      if ($self.resume) {
        var appUrl = "https://naukriyan.com";
        var file_download = `<a href="self_register/` + $self.resume + `" target="_blank" class="badge badge-success p-1">
          <i class="fa fa-download mr-2" aria-hidden="true"></i>
            Download
        </a>`
        document.getElementById("can_resume").innerHTML = file_download;
      }
      if (!$self.resume) {
        document.getElementById("can_resume").innerHTML = 'Not Uploaded';
      }
    }
  },
  created: function () {
    // this.getAllList();
  },
  filters: {
      capitalising: function (data) {
        var capitalized = []
        data.split(' ').forEach(word => {
          capitalized.push(
            word.charAt(0).toUpperCase() +
            word.slice(1).toLowerCase()
          )
        })
        return capitalized.join(' ')
      }
    }
};
</script>

<style scoped>
.search-list {
  padding: 1rem;
  background-color: #fff;
  border: 1px solid #ddd;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
</style>