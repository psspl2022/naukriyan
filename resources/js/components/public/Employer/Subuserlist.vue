<template>
  <div id="subuserlist">
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
                  <li class="active">Sub User List</li>
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
              <h2 class="hk-pg-title">Sub User List</h2>
              <a
                href=""
                class="btn btn-primary text-white"
                data-toggle="modal"
                data-target="#addSubUser"
                ><i class="fas fa-plus mr-2"></i>Add Sub User</a
              >
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="table-responsive custom-height">
                  <table
                    class="table table-head-fixed custom-table mt-2"
                    id="example1"
                  >
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Designation</th>
                        <th>Password</th>
                        <th>Created Date</th>
                        <th width="12%">Status</th>
                        <th width="12%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr
                        v-for="(subuser, index) in subUserLists"
                        :key="subuser.id"
                      >
                        <td>{{ index + 1 }}</td>
                        <td>{{ subuser.fname }} {{ subuser.lname }}</td>
                        <td>{{ subuser.contact }}</td>
                        <td>{{ subuser.gender }}</td>
                        <td>{{ subuser.email }}</td>
                        <td>{{ subuser.designation }}</td>
                         <td>{{ subuser.password_view }}</td>
                        <td>{{ subuser.created_at | timeformat }}</td>
                        <td>
                          <a
                            href="#"
                            class="badge badge-success text-white"
                            v-if="subuser.active == 1"
                            >Active</a
                          >
                          <a
                            href="#"
                            class="badge badge-danger text-white"
                            v-else
                            >De-Active</a
                          >
                        </td>
                        <td>
                          <a
                            href=""
                            @click="openmd(subuser.id)"
                            :data-id="subuser.id"
                            class="badge badge-primary text-white"
                            data-toggle="modal"
                            data-target=".editSubUser"
                            ><i class="fas fa-edit mr-2"></i>Edit</a
                          >
                          <a
                            href=""
                            class="badge badge-danger text-white"
                            v-if="subuser.active == 1"
                            @click.prevent="deactivesubuser(subuser.id)"
                            ><i class="fas fa-toggle-off"></i> De-Activate</a
                          >
                          <a
                            href=""
                            class="badge badge-success text-white"
                            v-if="subuser.active == 0"
                            @click.prevent="activesubuser(subuser.id)"
                            ><i class="fas fa-toggle-on"></i> Activate</a
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- The add sub user start -->
    <div class="modal fade popupForm custom-model-width" id="addSubUser">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            class="popupForm"
            role="form"
            method="post"
            @submit.prevent="addsubuser()"
            id="addUserForm"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Sub-User</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Your First Name"
                    v-model="form.fname"
                    :class="{ 'is-invalid': form.errors.has('fname') }"
                    name="fname"
                  />
                  <has-error :form="form" field="fname"></has-error>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Enter Your Last Name"
                    v-model="form.lname"
                    required
                    :class="{ 'is-invalid': form.errors.has('lname ') }"
                    name="lname "
                    id="lname"
                  />
                  <has-error :form="form" field="lname"></has-error>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact No.</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Your Contact No."
                    v-model="form.contact"
                    maxlength="10"
                    minlength="10"
                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                    :class="{ 'is-invalid': form.errors.has('contact') }"
                    name="contact"
                    id="contact"
                  />
                  <has-error :form="form" field="contact"></has-error>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Designation</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Your Designation"
                    v-model="form.designation"
                    :class="{ 'is-invalid': form.errors.has('designation') }"
                    name="designation"
                  />
                  <has-error :form="form" field="designation"></has-error>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    required
                    placeholder="Enter Your Email"
                    v-model="form.email"
                    @blur="checkEmail($event)"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                    name="email"
                    id="email"
                  />
                  <has-error :form="form" field="email"></has-error>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Gender</label>
                  <select
                    name="gender"
                    class="form-control"
                    required
                    v-model="form.gender"
                  >
                    <option value="" disabled="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary text-white">
                {{ createStatus ? "Saving..." : "Save" }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
                @click="resetForm()"
              >
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- The add sub user end -->
    <!-- The edit sub user start -->
    <div
      class="modal fade popupForm custom-model-width editSubUser"
      role="dialog"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            class="popupForm"
            role="form"
            method="post"
            @submit.prevent="updatesubuser(demo.id)"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Edit Sub-User</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="demo.fname"
                    :class="{ 'is-invalid': form.errors.has('fname') }"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="demo.lname"
                    :class="{ 'is-invalid': form.errors.has('lname') }"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact No.</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="demo.contact"
                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                    maxlength="10"
                    :class="{ 'is-invalid': form.errors.has('contact') }"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Designation</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="demo.designation"
                    :class="{ 'is-invalid': form.errors.has('designation') }"
                  />
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="demo.email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Gender</label>
                  <select
                    name="gender"
                    class="form-control"
                    required
                    v-model="demo.gender"
                  >
                    <option value="" disabled="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary text-white">
                {{ updateStatus ? "Updating..." : "Update" }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
                @click="resetForm()"
              >
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- The edit sub user end -->
    <main-footer></main-footer>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  name: "Subuserlist",

  data() {
    return {
      createStatus: false,
      updateStatus: false,
      form: new Form({
        fname: "",
        lname: "",
        email: "",
        contact: "",
        designation: "",
        gender: "",
      }),
      demo: new Form({
        id: "",
        fname: "",
        lname: "",
        email: "",
        contact: "",
        designation: "",
        gender: "",
      }),
      name1: "",
      mydata: [],
      subUserLists: [],
    };
  },
  mounted() {
    if (localStorage.getItem("reloaded")) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem("reloaded");
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem("reloaded", "1");
      location.reload();
    }
  },
  methods: {
    getSubUsers() {
      axios.get("subuser").then((response) => {
        this.subUserLists = response.data.data;
        setTimeout(() => $("#example1").DataTable(), 1000);
      });
    },
    openmd: function (id) {
      axios.get("/get-subuserdata/" + id).then((response) => {
        this.demo.id = response.data.id;
        this.demo.fname = response.data.fname;
        this.demo.lname = response.data.lname;
        this.demo.email = response.data.email;
        this.demo.contact = response.data.contact;
        this.demo.designation = response.data.designation;
        this.demo.gender = response.data.gender;
      });
    },
    addsubuser() {
      this.createStatus = true;
      this.form.post("/add-subuser").then(() => {
        this.$router.push("/subuserlist");
        toast({
          type: "success",
          title: "Sub user added successfully",
        });
        Fire.$emit("afterUpdate");
        window.location.reload();
        this.createStatus = false;
      });
    },
    updatesubuser: function (id) {
      this.updateStatus = true;
      this.demo.post("/update-subuser/" + id).then((response) => {
        this.$router.push("/subuserlist");
        Fire.$emit("afterUpdate");
        toast({
          type: "success",
          title: "Sub-User updated successfully",
        });
        window.location.reload();
        this.updateStatus = false;
      });
    },
    activesubuser(id) {
      var uri = "/active-subuser/" + id;
      $("body").css("cursor", "wait");
      axios.get(uri).then((response) => {
        swal.fire(
          "Change status!",
          "Sub-User activate successfully.",
          "success"
        );
        this.$router.push("/subuserlist");
        Fire.$emit("afterUpdate");
        $("body").css("cursor", "default");
      });
    },
    deactivesubuser(id) {
      var uri = "/deactive-subuser/" + id;
      $("body").css("cursor", "wait");
      axios.get(uri).then((response) => {
        swal.fire(
          "Change status!",
          "Sub user deactivate successfully.",
          "success"
        );
        this.$router.push("/subuserlist");
        Fire.$emit("afterUpdate");
        $("body").css("cursor", "default");
      });
    },
    resetForm() {
      // Reset Form on Click
    },
    checkEmail(event) {
      let email = event.target.value;
      axios
        .get("/checkemail/" + email)
        .then((response) => {
          if (response.data.data.email) {
            this.form.email = "";
            toast({
              type: "error",
              title: "Email ID. Already Exist",
            });
          }
        })
        .catch(() => {});
    },
  },
  created: function () {
    this.getSubUsers();
    Fire.$on("afterUpdate", () => {
      this.getSubUsers();
    });
  },
};
</script>

<style scoped>
</style>