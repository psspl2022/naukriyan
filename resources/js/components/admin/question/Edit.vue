<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Question</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Question</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateQuestion()">
                            <div class="card-body">
                                <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="question"> Question Name</label>
                                  <input type="text" class="form-control" id="question" placeholder="Question Name" v-model="form.question" name="question" :class="{ 'is-invalid': form.errors.has('question') }">
                                    <has-error :form="form" field="question"></has-error>
                                </div>
                                
                                <div class="form-group col-md-4 mb-3">
                                    <label>Select Company</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('company_name') }" v-model="form.company_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="company.id" v-for="company in allStates"> {{company.company_name}}</option>

                                    </select>
                                    <has-error :form="form" field="company_name"></has-error>
                                  </div>
                                 
                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Industry</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('industry_name') }" v-model="form.industry_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="industry.id" v-for="industry in allIndustry"> {{industry.category_name}}</option>

                                    </select>
                                    <has-error :form="form" field="industry_name"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Functional Role </label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('functionalrole_name') }" v-model="form.functionalrole_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="functional.id" v-for="functional in allDesignation"> {{functional.subcategory_name}}</option>

                                    </select>
                                    <has-error :form="form" field="functionalrole_name"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="marks">Marks</label>
                                  <input type="number" class="form-control" id="marks" placeholder="Enter marks" v-model="form.marks" name="marks" :class="{ 'is-invalid': form.errors.has('marks') }" min="0" >
                                    <has-error :form="form" field="marks"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="options">Option 1</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" v-model="form.options1"  :class="{ 'is-invalid': form.errors.has('options1') }"  placeholder="Select Options 1">
                                          
                                       <has-error :form="form" field="options1"></has-error>
                                      </div>
                                    
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="options">Option 2</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" v-model="form.options2"  :class="{ 'is-invalid': form.errors.has('options2') }"placeholder="Select Options 2">
                                          
                                       <has-error :form="form" field="options2"></has-error>
                                      </div>
                                    
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="options">Option 3</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" v-model="form.options3"  :class="{ 'is-invalid': form.errors.has('options3') }" placeholder="Select Options 3">
                                          
                                       <has-error :form="form" field="options3"></has-error>
                                      </div>
                                    
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="options">Option 4</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" v-model="form.options4"  :class="{ 'is-invalid': form.errors.has('options4') }"  placeholder="Select Options 4">
                                          
                                       <has-error :form="form" field="options4"></has-error>
                                      </div>
                                    
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="marks">Select Answer</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('answer') }" v-model="form.answer" v-if="form.options1=='' && form.options2=='' && form.options3=='' && form.options4==''">
                                        <option disabled value="">Select One</option> 
                                        

                                    </select>

                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('answer') }" v-model="form.answer" v-else>
                                        <option disabled value="">Select One</option> 
                                        <option v-model="form.options1">{{form.options1}}</option>
                                        <option v-model="form.options2">{{form.options2}}</option>
                                        <option v-model="form.options3">{{form.options3}}</option>
                                        <option v-model="form.options4">{{form.options4}}</option>

                                    </select>
                                    <has-error :form="form" field="marks"></has-error>
                                  </div>

                                

                              </div><!-- form row -->

                                

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
                industry_name:[],
            functionalrole_name:[],
            company_name:[],
                form: new Form({
                question:'',
                marks:'',
                options1:'',
                options2:'',
                options3:'',
                options4:'',
                industry_name:'',
                functionalrole_name:'',
                answer:'',
                company_name:'',	
                })
            }
        },
        mounted(){
           this.$store.dispatch('getAllData','/industry')
           this.$store.dispatch('getAllDesignation','/functionalrole')
          this.$store.dispatch('getAllState','/companies')
            this.$store.dispatch('getEditData',`/edit-question/${this.$route.params.questionid}`)
            
       },
        computed:{
          allIndustry(){
            return this.$store.getters.getAllData
          },
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          },
          allDesignation(){
            return this.$store.getters.getAllDesignation
          },
          allStates(){
            return this.$store.getters.getAllState
          },
          
        },
        methods:{
           
            updateQuestion(){
                this.form.post(`/update-question/${this.$route.params.questionid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/question-list')
                        toast({
                            type: 'success',
                            title: 'Question Updated successfully'
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