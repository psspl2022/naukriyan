<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Question List</h3>

              <div class="card-tools">

                <button class="btn btn-primary">
                  <router-link to="/add-question" style="color:#fff"> Add Question</router-link>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Question Mode</th>
                  <th>Question Title/Category</th>
                  <th>Industry</th>
                  <th>Functional role</th>
                  <th>Options</th>
                  <th>Marks</th>

                  <th>Active</th>
                  <th>Add to Questionnarie</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(question,index) in alldata" :key="question.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ question.question_mode }}</td>
                  <td>{{ question.title }}/{{ question.question_category }}</td>

                  <td>{{ question.category_name }}</td>
                  <td>{{ question.subcategory_name }}</td>
                  <td>
                    {{ question.option1 }},{{ question.option2 }},{{ question.option3 }},{{ question.option4 }}
                  </td>
                  <td>{{ question.marks }}</td>

                  <td>{{ question.active }}</td>
                  <td>
                    <button name="questionnnarie" type="button" value="" data-toggle="modal"
                            data-target="#basicExampleModal" class="btn btn-primary btn-sm">Add to
                    </button>
                  </td>
                  <td>

                    <router-link :to="`/edit-question/${question.id}`"><i class="far fa-edit"></i></router-link>
                    <a href="" @click.prevent="deletequestion(question.id)"><i class="far fa-trash-alt"></i></a>

                    <a href="" @click.prevent="deactivequestion(question.id)" v-if="question.active=='Yes'">
                      <button name="active" type="button" value="" class="btn btn-danger btn-xs">De-Active
                      </button>
                    </a>

                    <a href="" @click.prevent="activequestion(question.id)" v-if="question.active=='No'">
                      <button name="active" type="button" value="" class="btn btn-success btn-xs">Active</button>
                    </a>

                  </td>
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
      <!-- Modal -->
      <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
           aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!--  modal close -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: "List",
  mounted() {
    this.$store.dispatch('getAllData', '/question')
  },
  computed: {
    alldata() {
      setTimeout(() => $('#example1').DataTable(), 1000);
      return this.$store.getters.getAllData
    }
  },
  methods: {
    addQuestionnarie($id) {
      alert('Testing');
      /* var uri = '/question/'+id;
       Swal.mixin({
             input: 'text',
             confirmButtonText: 'Next &rarr;',
             showCancelButton: true,
             progressSteps: ['1', '2', '3']
           }).queue([
             {
               title: 'Question 1',
               text: 'Chaining swal2 modals is easy'
             },
             'Question 2',
             'Question 3'
           ]).then((result) => {
             if (result.value) {
               const answers = JSON.stringify(result.value)
               Swal.fire({
                 title: 'All done!',
                 html: `
                   Your answers:
                   <pre><code>${answers}</code></pre>
                 `,
                 confirmButtonText: 'Lovely!'
               })
             }
           })*/
    },
    deletequestion(id) {
      var uri = '/question/' + id;
      swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
          )
          axios.get(uri).then(response => {
            this.$store.dispatch('getAllData', '/question')
          });
        }
      });
    },
    deactivequestion(id) {
      var uri = '/deactive-question/' + id;
      swal.fire({
        title: 'Are you sure want to change?',
        text: "You would be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
      }).then((result) => {
        if (result.value) {
          swal.fire(
              'Change status!',
              'Your status has been changed.',
              'success'
          )
          axios.get(uri).then(response => {
            this.$store.dispatch('getAllData', '/question')
          });
        }
      });
    },
    activequestion(id) {
      var uri = '/active-question/' + id;
      swal.fire({
        title: 'Are you sure want to change?',
        text: "You would be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
      }).then((result) => {
        if (result.value) {
          swal.fire(
              'Change status!',
              'Your status has been changed.',
              'success'
          )
          axios.get(uri).then(response => {
            this.$store.dispatch('getAllData', '/question')
          });
        }
      });
    }
  }
}
</script>

<style scoped>
</style>