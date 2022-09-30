<template>
    <div id="new">
      <Emp-header></Emp-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Question</li>
                                </ol>
                            </div>

                            <div class="col-xs-12 col-sm-4 hidden-xs">
                                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:919711999999">Hot Line: +91 9711 99 99
                                        99</a> </p>
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
                    <h2 class="hk-pg-title">Question</h2> 
                  <router-link :to="`/view-question-emp`">
                                <a href="" class="btn btn-primary text-white"><i class="fas fa-eye mr-2"></i>View Question</a>
                            </router-link>
                    
                </div>
              
          
             <div class="card mt-3">
               
                 <div class="card-body">
                    <div class="search-bar">
                           <div class="form-group row">
                               <div class="col-sm-4">
                                 <label>Select Question Mode</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('question_mode') }" v-model="form.question_mode" @change="cascade">
                                        <option disabled value="">Select Question mode</option>
                                        <option value="MCQ">Multiple Choice Question (MCQ) Type</option>
                                        <option value="YES/NO">Yes/No Type</option>
                                        <option value="DESCRIPTIVE">Descriptive Type</option>

                                    </select>  
                                
                               </div>
                               
                               
                                
                           </div>
                       </div>
                      

      
                 </div>
                 <!-- MCQ Mode -->
                            <div class="card-body" v-if="mcq_mode">
                              For MCQ
                             <form role="form" method="post" @submit.prevent="addmcq()" enctype="multipart/form-data">
                              <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="question_category"> Question Category</label>
                                  <input type="text" class="form-control" id="question_category" placeholder="Question Category" v-model="form.question_category" name="question_category" :class="{ 'is-invalid': form.errors.has('question_category') }">
                                    <has-error :form="form" field="question_category"></has-error>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="title">Title</label>
                                  <input type="text" class="form-control" id="title" placeholder="Enter Title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }" min="0" >
                                    <has-error :form="form" field="title"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="question_name">Question Name</label>
                                  <input type="text" class="form-control" id="question_name" placeholder="Enter Question" v-model="form.question_name" name="question_name" :class="{ 'is-invalid': form.errors.has('question_name') }" min="0" >
                                    <has-error :form="form" field="question_name"></has-error>
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
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                            </div><!-- card body -->
                            <!-- Yes/No Mode -->
                            <div class="card-body"v-if="yes_no_mode">
                              For Yes/No
                              <form role="form" method="post" @submit.prevent="addyesno()" enctype="multipart/form-data">
                              <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="yes_no_question_category"> Question Category</label>
                                  <input type="text" class="form-control" id="yes_no_question_category" placeholder="Question Category" v-model="form.yes_no_question_category" name="yes_no_question_category" :class="{ 'is-invalid': form.errors.has('yes_no_question_category') }">
                                    <has-error :form="form" field="yes_no_question_category"></has-error>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="yes_no_title">Title</label>
                                  <input type="text" class="form-control" id="yes_no_title" placeholder="Enter Title" v-model="form.yes_no_title" name="yes_no_title" :class="{ 'is-invalid': form.errors.has('yes_no_title') }" min="0" >
                                    <has-error :form="form" field="yes_no_title"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="yes_no_question_name">Question Name</label>
                                  <input type="text" class="form-control" id="yes_no_question_name" placeholder="Enter Question" v-model="form.yes_no_question_name" name="yes_no_question_name" :class="{ 'is-invalid': form.errors.has('yes_no_question_name') }" min="0" >
                                    <has-error :form="form" field="yes_no_question_name"></has-error>
                                  </div>
                                
                                
                                 
                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Industry</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('yes_no_industry_name') }" v-model="form.yes_no_industry_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="industry.id" v-for="industry in allIndustry"> {{industry.category_name}}</option>

                                    </select>
                                    <has-error :form="form" field="yes_no_industry_name"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Functional Role </label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('yes_no_functional') }" v-model="form.yes_no_functional">
                                        <option disabled value="">Select One</option>
                                        <option :value="functional.id" v-for="functional in allDesignation"> {{functional.subcategory_name}}</option>

                                    </select>
                                    <has-error :form="form" field="yes_no_functional"></has-error>
                                  </div>
                                  

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="yes_no_marks">Marks (optional)</label>
                                  <input type="number" class="form-control" id="yes_no_marks" placeholder="Enter Marks" v-model="form.yes_no_marks" name="yes_no_marks" :class="{ 'is-invalid': form.errors.has('yes_no_marks') }" min="0" >
                                    <has-error :form="form" field="yes_no_marks"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="yes_no_answer">Answer (optional)</label>
                                  <input type="text" class="form-control" id="yes_no_answer" placeholder="Enter Answer" v-model="form.yes_no_answer" name="yes_no_answer" :class="{ 'is-invalid': form.errors.has('yes_no_answer') }" min="0" >
                                    <has-error :form="form" field="yes_no_answer"></has-error>
                                  </div>
                                 

                            

                                

                              </div><!-- form row -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                            </div><!--  card body -->
                            <!-- Descriptive Mode -->
                            <div class="card-body" v-if="descriptive_mode">
                              <form role="form" method="post" @submit.prevent="adddescriptive()" enctype="multipart/form-data">
                              For Descriptive
                              <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="descriptive_question_category"> Question Category</label>
                                  <input type="text" class="form-control" id="descriptive_question_category" placeholder="Question Category" v-model="form.descriptive_question_category" name="descriptive_question_category" :class="{ 'is-invalid': form.errors.has('descriptive_question_category') }">
                                    <has-error :form="form" field="descriptive_question_category"></has-error>
                                </div>
                                <div class="form-group col-md-4 mb-3">
                                    <label for="descriptive_title">Title</label>
                                  <input type="text" class="form-control" id="descriptive_title" placeholder="Enter Title" v-model="form.descriptive_title" name="descriptive_title" :class="{ 'is-invalid': form.errors.has('descriptive_title') }" min="0" >
                                    <has-error :form="form" field="descriptive_title"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="descriptive_question_name">Question Name</label>
                                  <input type="text" class="form-control" id="descriptive_question_name" placeholder="Enter Question" v-model="form.descriptive_question_name" name="descriptive_question_name" :class="{ 'is-invalid': form.errors.has('descriptive_question_name') }" min="0" >
                                    <has-error :form="form" field="descriptive_question_name"></has-error>
                                  </div>
                                
                                
                                 
                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Industry</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('descriptive_industry_name') }" v-model="form.descriptive_industry_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="industry.id" v-for="industry in allIndustry"> {{industry.category_name}}</option>

                                    </select>
                                    <has-error :form="form" field="descriptive_industry_name"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label>Select Functional Role </label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('descriptive_functional') }" v-model="form.descriptive_functional">
                                        <option disabled value="">Select One</option>
                                        <option :value="functional.id" v-for="functional in allDesignation"> {{functional.subcategory_name}}</option>

                                    </select>
                                    <has-error :form="form" field="descriptive_functional"></has-error>
                                  </div>
                                  

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="descriptive_marks">Marks (optional)</label>
                                  <input type="number" class="form-control" id="descriptive_marks" placeholder="Enter Marks" v-model="form.descriptive_marks" name="descriptive_marks" :class="{ 'is-invalid': form.errors.has('descriptive_marks') }" min="0" >
                                    <has-error :form="form" field="descriptive_marks"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="descriptive_answer">Answer (optional)</label>
                                  <input type="text" class="form-control" id="descriptive_answer" placeholder="Enter Answer" v-model="form.descriptive_answer" name="descriptive_answer" :class="{ 'is-invalid': form.errors.has('descriptive_answer') }" min="0" >
                                    <has-error :form="form" field="descriptive_answer"></has-error>
                                  </div>
                                 

                            

                                

                              </div><!-- form row -->
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                            </div> <!-- card body -->
             </div>
             
              <!-- /.card-body -->
              </div>
           </div>
        </div>
        <!-- /.row -->
      </section>
      
         
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "New",
        data(){
      

        return {
          mcq_mode:false,
          yes_no_mode:false,
          descriptive_mode:false,
          
              form: new Form({
                question_category:'',
                question_mode:'',
                question_name:'',
                title:'',
                marks:'',
                options1:'',
                options2:'',
                options3:'',
                options4:'',
                industry_name:'',
                functionalrole_name:'',
                answer:'',
                company_name:'',

                yes_no_question_category:'',
                yes_no_question_mode:'',
                yes_no_question_name:'',
                yes_no_title:'',
                yes_no_marks:'',
                yes_no_industry_name:'',
                yes_no_functional:'',
                yes_no_answer:'',

                descriptive_question_category:'',
                descriptive_question_name:'',
                descriptive_question_mode:'',
                descriptive_title:'',
                descriptive_marks:'',
                descriptive_industry_name:'',
                descriptive_functional:'',
                descriptive_answer:'',
      
                
                
             })
         }
     },
      mounted(){
          
          this.$store.dispatch('getAllData','/getindustry')
          this.$store.dispatch('getAllDesignation','/getfunctionalrole')
          
        },
        computed:{
          
          allIndustry(){
            return this.$store.getters.getAllData
          },
          allDesignation(){
            return this.$store.getters.getAllDesignation
          }
          
        },
        methods:{
        
          cascade: function(e){
            if (e.target.value == 'MCQ'){
              this.mcq_mode = true;
              this.yes_no_mode = false;
              this.descriptive_mode = false;
            }else if(e.target.value == 'YES/NO'){
              this.mcq_mode = false;
              this.yes_no_mode = true;
              this.descriptive_mode = false;
            }

            else if(e.target.value == 'DESCRIPTIVE'){
              this.mcq_mode = false;
              this.yes_no_mode = false;
              this.descriptive_mode = true;
            }
        },
          addyesno(){
              
                this.form.post('/add-question-yesno-emp')
                    .then(()=>{
                        this.$router.push('/add-question-emp')
                        toast({
                            type: 'success',
                            title: 'Question Added Successfully'
                        })
                    })
                    .catch(()=>{

                    })

            },
            adddescriptive(){
                this.form.post('/add-question-descriptive-emp')
                    .then(()=>{
                        this.$router.push('/add-question-emp')
                        toast({
                            type: 'success',
                            title: 'Question Added Successfully'
                        })
                    })
                    .catch(()=>{

                    })

            },
          
            addmcq(){
                this.form.post('/add-question-mcq-emp')
                    .then(()=>{
                        this.$router.push('/add-question-emp')
                        toast({
                            type: 'success',
                            title: 'Question Added Successfully'
                        })
                    })
                    .catch(()=>{

                    })

            }
        }
    }


</script>

<style scoped>

</style>