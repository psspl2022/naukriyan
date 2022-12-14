<template>
    <div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="title">Feedback List <a href="/feedback" target="_blank" class='btn btn-info float-right text-white'>FeedBack</a></h3>
                </div>
  
                <div class="card-body">
                  <!-- <div class="card-header">
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
                    </div> -->
                  <table
                    id="example1"
                    class="table table-bordered table-hover table-striped"
                  >
                    <thead>
                      <tr>
                        <!-- <th>
                        #
                        <input
                          type="checkbox"
                          v-model="selectAll"
                          @click="select"
                        /> 
                        Check all
                      </th>-->
                        <th>S.No</th>                       
                        <th>Name</th>
                        <th>Email </th>
                        <th>Contact</th>
                        <th>Remark</th>
                        <th>Rating</th>
                        <th>Added On</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(feedback, index) in feedback_data.data" :key="index">
                        <!-- <td>
                          <input
                            type="checkbox"
                            id="checkvalue"
                            :value="feedback.id"
                            v-model="checkedNames"
                          />
                        </td> -->
                        <td>{{ index + 1 }}</td>
                        <td>{{ feedback.name ? feedback.name : "N/A"}}</td>
                        <td>{{ feedback.email ? feedback.email : "N/A"}} </td>                            
                        <td>{{ feedback.contact ? feedback.contact : "N/A"}}</td>                       
                        <td>{{ feedback.remarks ? feedback.remarks : "N/A"}}</td>
                        <td>{{ feedback.rating ? feedback.rating : "N/A"}}</td>
                      <td>{{ feedback.created_at | timeformat}}</td>
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
        feedback_data: [],
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
        axios.get("feedback-list").then((response) => {
            this.feedback_data = response.data;
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
        document.getElementById("name").innerHTML = $feedback.name;
        document.getElementById("email").innerHTML = $feedback.email;
        document.getElementById("contact").innerHTML = $feedback.contact;
        document.getElementById("remark").innerHTML = $feedback.remarks;
        document.getElementById("rating").innerHTML = $feedback.rating;
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