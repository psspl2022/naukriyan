<template>
  <div id="venues">
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
                  <li class="active">Manage Interview Location</li>
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
    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Manage Interview Location</h2>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="search-bar">
                  <div class="form-group row">
                    <div class="col-md-8">
                      <form action="" method="get">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Search Venue"
                                v-model="venueSearchInput"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <button
                                type="button"
                                class="btn btn-primary text-white"
                                @click.prevent="searchVenue()"
                              >
                                {{ searchStatus ? "Searching..." : "Search" }}
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-4">
                      <div class="add-new-btn">
                        <a
                          href=""
                          class="btn btn-primary text-white"
                          data-toggle="modal"
                          data-target="#addNewLocation"
                          ><i class="fas fa-plus mr-2"></i>Add New</a
                        >
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive custom-height">
                  <table
                    class="table table-head-fixed custom-table mt-2"
                    id="example1"
                  >
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Venue</th>
                        <th>Contact Person</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact No</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(ven, index) in allVenues" :key="ven.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ ven.venue_name }}</td>
                        <td>{{ ven.contact_person }}</td>
                        <td>{{ ven.email }}</td>
                        <td>{{ ven.venue_address }}</td>
                        <td>{{ ven.contact_no }}</td>
                        <td v-if="ven.venue_status === '1'">Active</td>
                        <td v-else>Inactive</td>
                        <td>
                          <a
                            href=""
                            data-toggle="modal"
                            :data-id="ven.id"
                            data-target=".mdupdate"
                            @click="openmd(ven.id)"
                          >
                            <button
                              name="status"
                              type="button"
                              value=""
                              class="btn btn-warning btn-xs"
                            >
                              <i class="far fa-edit mr-2"></i> Edit
                            </button>
                          </a>
                          <a href="" @click.prevent="deleteVenue(ven.id)">
                            <button
                              name="status"
                              type="button"
                              value=""
                              class="btn btn-danger btn-xs"
                            >
                              <i class="far fa-trash-alt"></i> Detete
                            </button>
                          </a>
                          <a
                            href=""
                            @click.prevent="deactivevenue(ven.id)"
                            v-if="ven.venue_status === '1'"
                            ><button
                              name="status"
                              type="button"
                              class="btn btn-success btn-xs"
                            >
                              Active
                            </button></a
                          >
                          <a href="" @click.prevent="activevenue(ven.id)" v-else
                            ><button
                              name="status"
                              type="button"
                              class="btn btn-danger btn-xs"
                            >
                              De-Active
                            </button></a
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- The add New Location start -->
    <div class="modal fade popupForm custom-model-width" id="addNewLocation">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            role="form"
            method="post"
            @submit.prevent="addVenue()"
            enctype="multipart/form-data"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Location</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <!-- form start -->

              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Venue</label>
                  <input
                    type="text"
                    name="venue_name"
                    class="form-control"
                    placeholder="Enter Your Venue"
                    id="venue_name"
                    v-model="form.venue_name"
                    :class="{ 'is-invalid': form.errors.has('venue_name') }"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact Person</label>
                  <input
                    type="text"
                    name="contact_person"
                    id="contact_person"
                    class="form-control"
                    placeholder="Enter Contact Person"
                    :class="{ 'is-invalid': form.errors.has('contact_person') }"
                    v-model="form.contact_person"
                  />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Email"
                    name="contact_email"
                    id="contact_email"
                    :class="{ 'is-invalid': form.errors.has('contact_email') }"
                    v-model="form.contact_email"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact No.</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Enter Your Contact No."
                    name="contact_no"
                    id="contact_no"
                    :class="{ 'is-invalid': form.errors.has('contact_no') }"
                    v-model="form.contact_no"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Address</label>
                  <textarea
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Address...."
                    name="venue_address"
                    id="venue_address"
                    :class="{ 'is-invalid': form.errors.has('venue_address') }"
                    v-model="form.venue_address"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Instruction</label>
                  <textarea
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Instruction here...."
                    name="instructions"
                    id="instructions"
                    :class="{ 'is-invalid': form.errors.has('instructions') }"
                    v-model="form.instructions"
                  ></textarea>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary text-white">
                {{ addVenueStatus ? "Saving" : "Save" }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- The add New Location end -->

    <!-- The Update New Location start -->
    <div
      class="modal mdupdate fade popupForm custom-model-width"
      id="updateLocation"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            role="form"
            method="post"
            @submit.prevent="updateVenue(demo.id)"
            enctype="multipart/form-data"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Update Location</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <!-- form start -->

              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Venue</label>
                  <input
                    type="text"
                    name="venue_name"
                    class="form-control"
                    placeholder="Enter Your Venue"
                    id="venue_name"
                    v-model="demo.venue_name"
                    :class="{ 'is-invalid': form.errors.has('venue_name') }"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact Person</label>
                  <input
                    type="text"
                    name="contact_person"
                    id="contact_person"
                    class="form-control"
                    placeholder="Enter Contact Person"
                    :class="{ 'is-invalid': form.errors.has('contact_person') }"
                    v-model="demo.contact_person"
                  />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Email"
                    name="contact_email"
                    id="contact_email"
                    :class="{ 'is-invalid': form.errors.has('contact_email') }"
                    v-model="demo.email"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact No.</label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Enter Your Contact No."
                    name="contact_no"
                    id="contact_no"
                    :class="{ 'is-invalid': form.errors.has('contact_no') }"
                    v-model="demo.contact_no"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Address</label>
                  <textarea
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Address...."
                    name="venue_address"
                    id="venue_address"
                    :class="{ 'is-invalid': form.errors.has('venue_address') }"
                    v-model="demo.venue_address"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Instruction</label>
                  <textarea
                    type="email"
                    class="form-control"
                    placeholder="Enter Your Instruction here...."
                    name="instructions"
                    id="instructions"
                    :class="{ 'is-invalid': form.errors.has('instructions') }"
                    v-model="demo.instructions"
                  ></textarea>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary text-white">
                {{ updateVenueStatus ? "Updating..." : "Update" }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- The Update New Location end -->

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Venues",
  data() {
    return {
      venueSearchInput: "",
      addVenueStatus: false,
      updateVenueStatus: false,
      searchStatus: false,
      allVenues: [],
      form: new Form({
        venue_name: "",
        contact_person: "",
        contact_email: "",
        contact_no: "",
        venue_address: "",
        instructions: "",
      }),
      demo: new Form({
        id: "",
        venue_name: "",
        contact_person: "",
        email: "",
        contact_no: "",
        venue_address: "",
        instructions: "",
      }),
      name1: "",
      mydata: [],
    };
  },
  methods: {
    searchVenue() {
      let venueTxt = this.venueSearchInput;
      this.searchStatus = true;
      axios.get("/search-venue/" + venueTxt).then((response) => {
        this.allVenues = response.data.data;
        this.searchStatus = false;
      });
    },
    getAllVenues() {
      this.addVenueStatus = true;
      axios.get("venue").then((response) => {
        this.allVenues = response.data.data;
        this.addVenueStatus = false;
      });
    },
    openmd: function (id) {
      axios.get("/get-venuedata/" + id).then((response) => {
        this.demo.id = response.data.id;
        this.demo.venue_name = response.data.venue_name;
        this.demo.contact_person = response.data.contact_person;
        this.demo.email = response.data.email;
        this.demo.contact_no = response.data.contact_no;
        this.demo.venue_address = response.data.venue_address;
        this.demo.instructions = response.data.instructions;
      });
    },
    addVenue() {
      this.addVenueStatus = true;
      this.form.post("/add-venue").then(() => {
        this.addVenueStatus = false;
        toast("Venue Added Successfully");
        Fire.$emit("afterUpdate");
      });
    },
    updateVenue: function (id) {
      this.updateVenueStatus = true;
      this.demo.post("/update-venue/" + id).then((response) => {
        this.updateVenueStatus = false;
        Fire.$emit("afterUpdate");
        toast({
          type: "success",
          title: "Your venue has been updated.",
        });
      });
    },
    deactivevenue(id) {
      var uri = "/deactive-venues/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              Fire.$emit("afterUpdate");
              swal.fire(
                "Change status!",
                "Your status has been changed.",
                "success"
              );
            });
          }
        });
    },
    activevenue(id) {
      var uri = "/active-venues/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              Fire.$emit("afterUpdate");
              swal.fire(
                "Change status!",
                "Your status has been changed.",
                "success"
              );
            });
          }
        });
    },
    deleteVenue(id) {
      var uri = "/venues/" + id;
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              Fire.$emit("afterUpdate");
              swal.fire(
                "Venue deleted!",
                "Your venue has been deleted.",
                "success"
              );
            });
          }
        });
    },
  },
  created: function () {
    this.getAllVenues();
    Fire.$on("afterUpdate", () => {
      this.getAllVenues();
    });
  },
};
</script>

<style scoped>
.add-new-btn {
  float: right !important;
}
</style>