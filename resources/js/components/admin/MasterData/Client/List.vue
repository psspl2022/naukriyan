<template>
  <div>
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-11">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Client List</h3>

              <div class="card-tools"></div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <table
                      class="
                        table table-bordered table-hover
                        dt-responsive
                        table-striped
                        mt-2
                      "
                      id="example1"
                    >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Client Name</th>
                          <th>Email / Contact</th>
                          <th>Address</th>
                          <th>Created Date</th>
                          <th>Added By</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="(subuser, index) in subUserLists"
                          :key="subuser.id"
                        >
                          <td>{{ index + 1 }}</td>
                          <td class="text-uppercase">
                            <b>{{ subuser.name }}</b>
                          </td>
                          <td>{{ subuser.email }} / {{ subuser.contact }}</td>
                          <td>{{ subuser.address }}</td>
                          <td>{{ subuser.created_at | timeformat }}</td>

                          <td>
                            {{ subuser.emp_fname }} {{ subuser.emp_lname }}({{
                              subuser.emp_email
                            }}) of {{ subuser.company_name }}
                          </td>
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
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: "list",

  data() {
    return {
      createStatus: false,
      updateStatus: false,
      name1: "",
      mydata: [],
      subUserLists: [],
    };
  },
  mounted() {},
  methods: {
    getSubUsers() {
      axios.get("admin/client").then((response) => {
        this.subUserLists = response.data.data;
        setTimeout(() => $("#example1").DataTable(), 1000);
      });
    },
    activesubuser(id) {
      var uri = "/admin/active-client/" + id;
      $("body").css("cursor", "wait");
      axios.get(uri).then((response) => {
        swal.fire(
          "Change status!",
          "Client Activated Successfully.",
          "success"
        );
        this.$router.push("/admin/client/list");
        Fire.$emit("afterUpdate");
        $("body").css("cursor", "default");
      });
    },
    deactivesubuser(id) {
      var uri = "/admin/deactive-client/" + id;
      $("body").css("cursor", "wait");
      axios.get(uri).then((response) => {
        swal.fire(
          "Change status!",
          "Client Deactivated Successfully.",
          "success"
        );
        this.$router.push("/admin/client/list");
        Fire.$emit("afterUpdate");
        $("body").css("cursor", "default");
      });
    },
    resetForm() {
      // Reset Form on Click
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