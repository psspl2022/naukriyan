<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Salary</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Salary</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Salary()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="salary">Salary in per Month</label>
                                  <input type="text" class="form-control" id="salary" @change="updatesal" placeholder="Add Salary in per month" v-model="form.salary" name="salary" :class="{ 'is-invalid': form.errors.has('salary') }" min="0">
                                    <has-error :form="form" field="salary"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="salary_in_annum">Salary in per Annum (Auto Calculate)</label>
                                  <input type="" class="form-control" id="salary_in_annum" @change="updatesalmon" value="form.salary_in_annum" placeholder="Add Salary in Annum" v-model="form.salary_in_annum" name="salary_in_annum" :class="{ 'is-invalid': form.errors.has('salary_in_annum') }" min="0">
                                    <has-error :form="form" field="salary_in_annum"></has-error>
                                </div>
                              
                                  
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
                salary:'',
                salary_in_annum:'',
                
                
                
               
             })
         }
     },
      
        methods:{
            updatesal(event) {
        this.form.salary = event.target.value
        this.form.salary_in_annum = this.form.salary * 12
    },
    updatesalmon(event) {
        this.form.salary_in_annum = event.target.value
        this.form.salary = this.form.salary_in_annum / 12
    },
          
            Salary(){
                this.form.post('/add-salary')
                    .then(()=>{
                        this.$router.push('/salary-list')
                        toast({
                            type: 'success',
                            title: 'Salary Added successfully'
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