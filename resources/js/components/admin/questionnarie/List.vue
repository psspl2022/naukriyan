<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Questionnarie</h3>

              <div class="search-bar">
                <div class="form-group row">
                  <div class="col-sm-4">

                    <select class="form-control custom-select" id="tag">
                      <option disabled="">Select Questionnarie</option>
                      <option v-for="(tag,index) in allTag" :value="tag.id">{{ tag.name }}</option>
                    </select>
                  </div>
                  <div class="col-sm-4">

                    <button type="button" @click="getResume()" class="btn btn-danger text-white">Search</button>
                  </div>

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Questionnarie Name</th>
                  <th>Question Title/Category</th>
                  <th>Question Name</th>
                  <th>Options</th>
                  <th>Marks</th>


                </tr>
                </thead>
                <tbody>
                <tr v-for="(res,index) in res_list">
                  <td>{{ index + 1 }}</td>
                  <td>{{ res.name }}</td>
                  <td>{{ res.title }} / {{ res.question_category }}</td>
                  <td>{{ res.question_name }}</td>
                  <td>{{ res.option1 }}/{{ res.option2 }}/{{ res.option3 }}/{{ res.option4 }}</td>
                  <td>{{ res.marks }}</td>


                </tr>
                </tbody>
              </table>
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
  name: "List",
  data() {
    return {
      res_list: [],


      demo: new Form({}),


    }
  },
  mounted() {

    this.$store.dispatch('getAllDesignation', '/questionnarie-name')
  },
  computed: {

    allTag() {
      return this.$store.getters.getAllDesignation
    },
  },
  methods: {

    getAllResume() {
      this.loading = true;
      axios.get('getquestionnarie-question').then(response => {
        this.loading = false;
        this.res_list = response.data.data;
      })
    },

    getResume() {

      let tag = document.getElementById("tag").value;
      axios.get('/searchquestionnarie/' + tag)
          .then((response) => {


            this.res_list = response.data.data;
            //alert(response.data.pay_status);


          })

    }

  },
  created: function () {

    this.getAllResume();
  },
}
</script>

<style scoped>
</style>