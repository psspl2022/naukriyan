<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Job Fair</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Job Fair</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Jobfair()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="events_name"> Job Fair Name</label>
                                  <input type="text" class="form-control" id="events_name" placeholder="Add Job Fair Name" v-model="form.events_name" name="events_name" :class="{ 'is-invalid': form.errors.has('events_name') }">
                                    <has-error :form="form" field="events_name"></has-error>
                                </div>   

                                <div class="form-group mb-3">
                                  <label for="event_start_date">Events Start Date</label> 
                                 <input type="date" class="form-control" id="event_start_date" placeholder=" event_start_date" v-model="form.event_start_date" name="event_start_date" :class="{ 'is-invalid': form.errors.has('event_start_date') }" autocomplete="off">
                                  <has-error :form="form" field="event_start_date"></has-error>
                                </div>

                                <div class="form-group mb-3">
                                  <label for="event_end_date">Events End date</label> 
                                 <input type="date" class="form-control" id="event_end_date" placeholder=" event_end_date" v-model="form.event_end_date" name="event_start_date" :class="{ 'is-invalid': form.errors.has('event_end_date') }" autocomplete="off">
                                  <has-error :form="form" field="event_end_date"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="event_no_of_company"> No.of Company</label>
                                  <input type="number" class="form-control" id="event_no_of_company" placeholder="Add No.of Company" min="0" v-model="form.event_no_of_company" name="event_no_of_company" :class="{ 'is-invalid': form.errors.has('event_no_of_company') }">
                                    <has-error :form="form" field="event_no_of_company"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="event_companies_name"> Companies List</label>
                                  <textarea class="form-control" rows="5" id="event_companies_name" placeholder="Add Companies List with comma(,)"v-model="form.event_companies_name" name="event_companies_name" :class="{ 'is-invalid': form.errors.has('event_companies_name') }"></textarea>
                                    <has-error :form="form" field="event_companies_name"></has-error>
                                </div>

                                <!-- <div class="form-group">
                                  <label for="event_companies_name"> Companies List</label>
                                  <input type="test" class="form-control" id="event_companies_name" placeholder="Companies List"v-model="form.event_companies_name" name="event_companies_name" :class="{ 'is-invalid': form.errors.has('event_companies_name') }">
                                    <has-error :form="form" field="event_companies_name"></has-error>
                                </div> -->
                              
                                  
                              </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name: "New",
     data(){
        //let now = new Date()
        return {
              form: new Form({
                events_name:'',
                event_start_date:'',
                event_end_date:'',
                event_no_of_company:'',
                event_companies_name:'',
               
             })
         }
     },
      
        methods:{
          
            Jobfair(){
                this.form.post('/add-jobfair')
                    .then(()=>{
                        this.$router.push('/jobfair-list')
                        toast({
                            type: 'success',
                            title: 'Job Benefit Added successfully'
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