<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Job Walkins</li>  
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Job Walkins</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatejobwalkins()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="walking_name"> Job Walkins Name</label>
                                  <input type="text" class="form-control" id="walking_name" placeholder="Add Job Walkins Name" v-model="form.walking_name" name="walking_name" :class="{ 'is-invalid': form.errors.has('walking_name') }">
                                    <has-error :form="form" field="walking_name"></has-error>
                                </div>   

                                <div class="form-group mb-3">
                                  <label for="start_date">Events Start Date</label> 
                                 <input type="date" class="form-control" id="start_date" placeholder=" start_date" v-model="form.start_date" name="start_date" :class="{ 'is-invalid': form.errors.has('start_date') }" autocomplete="off">
                                  <has-error :form="form" field="start_date"></has-error>
                                </div>

                                <div class="form-group mb-3">
                                  <label for="end_date">Events End date</label> 
                                 <input type="date" class="form-control" id="end_date" placeholder=" end_date" v-model="form.end_date" name="start_date" :class="{ 'is-invalid': form.errors.has('end_date') }" autocomplete="off">
                                  <has-error :form="form" field="end_date"></has-error>
                                </div>

                                <div class="form-group mb-3">
                                  <label for="time_from">Start Time</label> 
                                 <input type="time" class="form-control" id="time_from" placeholder=" time_from" v-model="form.time_from" name="time_from" :class="{ 'is-invalid': form.errors.has('time_from') }" autocomplete="off">
                                  <has-error :form="form" field="time_from"></has-error>
                                </div>

                                <div class="form-group mb-3">
                                  <label for="time_to">End Time</label> 
                                 <input type="time" class="form-control" id="time_to" placeholder=" time_to" v-model="form.time_to" name="start_date" :class="{ 'is-invalid': form.errors.has('time_to') }" autocomplete="off">
                                  <has-error :form="form" field="time_from"></has-error>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "Edit",
        data(){
            return {
                form: new Form({
                    walking_name:'',
                start_date:'',
                end_date:'',
                time_from:'',
                time_to:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-jobwalkins/${this.$route.params.jobwalkinsid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
        methods:{
            updatejobwalkins(){
                this.form.post(`/update-jobwalkins/${this.$route.params.jobwalkinsid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/jobwalkins-list')
                        toast({
                            type: 'success',
                            title: 'Job Walkins Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })

            }
            
        }
    }
</script>

<style scoped>
textarea, input {
 
  -webkit-appearance: textfield; 
}
</style>