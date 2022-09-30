<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Contact Us List</h3>

                            <div class="card-tools">
                              
                                
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email/Contact No-</th>
                                        <th>Remarks</th>
                                        <th>Date and Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(question,index) in alldata" :key="question.id">
                                        <td>{{index+1}}</td>
                                        <td>{{question.name}}</td>
                                        <td>{{question.email}} / {{question.contact_no}}</td>
                                        <td>{{question.remarks}}</td>
                                        <td>{{question.created_at | timeformat}}</td>
                                        
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
        data() {
          return {
              alldata: [],
          }
        },
        mounted(){
          axios.get('/contact-us-list').then(response => {
              this.alldata = response.data;
          })
        }
    }
</script>

<style scoped>
</style>