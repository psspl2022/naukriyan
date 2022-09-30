<template>
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
            <button class="btn btn-primary">
              <router-link to="/consolidate-data" style="color: #fff"
                >Consolidate Data List</router-link
              >
            </button>
          </ol>
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Consolidate Data</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link mt-4 active" id="nav-home-tab" data-toggle="tab" href="#nav-bulk-upload"
               role="tab"
               aria-controls="nav-home" aria-selected="true"><b>Bulk Jobseeker Upload</b></a>
            
          </div> -->

          <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div
              class="tab-pane fade show active"
              id="nav-bulk-upload"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <h4>Important Instruction</h4>
              <ul>
                <li>Data should not be more then 1000 in one sheet.</li>
              </ul>
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Bulk Upload</h3>
                </div>
                <form
                  method="post"
                  enctype="multipart/form-data"
                  @submit.prevent="importBulkJob()"
                >
                  <div class="card-body">
                    <div class="form-group">
                      <label
                        >Upload Sheet
                        <span class="text-muted">
                          (CSV only) Download
                          <a
                            href="https://naukriyan.com/consolidateData/sample-consolidate.csv"
                            target="_blank"
                            >Sample File</a
                          ></span
                        ></label
                      >
                      <input
                        type="file"
                        class="form-control form-control-file"
                        @change="onChangeFile($event)"
                      />
                    </div>
                    <button class="btn btn-primary" :disabled="isImport">
                      {{ isImport ? "Importing" : "Import" }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</template>

<script>
export default {
  name: "New",
  data() {
    return {
      form: new Form({
        fname: "",
        lname: "",
        email: "",
        contact: "",
        gender: "",
        dob: "",
      }),
      bulkData: "",
      isImport: false,
    };
  },

  mounted() {
    this.$store.dispatch("getAllData", "/jobseeker");
  },

  methods: {
    importBulkJob() {
      this.isImport = true;
      let currentObj = this;
      const config = {
        headers: { "content-type": "multipart/form-data" },
      };
      let formData = new FormData();
      formData.append("csvFile", this.bulkData);
      axios
        .post("/import-consolidate", formData, config)
        .then(function (response) {
          currentObj.isImport = false;
          if (response.data.status === "success") {
            toast({
              type: "success",
              title:
                "Total : " +
                response.data.total_record +
                " Records are Successfully Imported",
            });
            //currentObj.$router.push("/jobseeker-list");
          }
          if (response.data.status === "alert") {
            toast({
              type: "warning",
              title: response.data.message,
            });
          }
        })
        .catch(function (error) {
          currentObj.isImport = false;
          toast({
            type: "warning",
            title: "File not Selected/Something Went Wrong",
          });
          //   console.log(error);
        });
    },

    onChangeFile(event) {
      this.bulkData = event.target.files[0];
    },
  },
};
</script>

<style scoped>
textarea,
input {
  -webkit-appearance: textfield;
}
</style>