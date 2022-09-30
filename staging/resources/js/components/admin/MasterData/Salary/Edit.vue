<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Salary</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Salary</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatesalary()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="salary">Salary In Per month</label>
                                  <input type="text" class="form-control" id="salary"  @change="updatesal" placeholder="Add salary Name" v-model="form.salary" name="salary" :class="{ 'is-invalid': form.errors.has('salary') }" min="0" required="">
                                    <has-error :form="form" field="salary"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="salary_in_annum">Salary in Per Anuum</label>
                                  <input type="number" class="form-control" id="salary_in_annum" @change="updatesalmon" placeholder="Add Salary in Per Annum" v-model="form.salary_in_annum" name="salary_in_annum" :class="{ 'is-invalid': form.errors.has('salary_in_annum') }" min="0" required="">
                                    <has-error :form="form" field="salary_in_annum"></has-error>
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
                    salary:'',
                    salary_in_annum:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-salary/${this.$route.params.salaryid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
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
            updatesalary(){
                this.form.post(`/update-salary/${this.$route.params.salaryid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/salary-list')
                        toast({
                            type: 'success',
                            title: 'Salary Updated Successfully'
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