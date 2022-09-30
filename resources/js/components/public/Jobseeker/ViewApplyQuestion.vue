<template>
    <div id="ViewApplyQuestion">
      <jobseeker-header></jobseeker-header>
        <section class="top-adjust pt-5 pb-5">
            <div id="breadcrumb">
                <div class="breadcrumb-wrapper">

                    <div class="container">

                        <div class="row">

                            <div class="col-xs-12 col-sm-8">
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                                    <li class="active">Confirm Before Apply</li>
                                </ol>
                            </div>

                            <div class="col-xs-12 col-sm-4 hidden-xs">
                                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
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
                    <h2 class="hk-pg-title">View Apply Question</h2>
                    <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addEnquiry"><i class="fas fa-plus mr-2"></i>Add Enquiry</a> -->
                </div>
              
          
             <div class="card mt-3">
                 <div class="card-body">
                  <form method="post" action="" @submit.prevent="ApplyJob(allIndustry.id)">
                    <div class="row mb-3">
                            <div class="col-sm-12">
                              <fieldset>
                                    <legend> General Information </legend>
                                    <div class="form-group row mb-2">
                                            <div class="col-sm-6">
                                                <label class="col-form-label" for=""> Job Title :</label>
                                                  {{allIndustry.title}}
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label" for="">Company Name :</label>
                                                {{allIndustry.company_name}}
                                            </div>
                                           
                                            
                                        
                                    </div>
                               </fieldset>     
                            </div>

                            <div class="col-sm-12">
                              <fieldset>
                                    <legend> Questions </legend>
                                    <div class="form-group row mb-2" v-for="(ques,index) in allRecruiter":key="ques.id">
                                            <div class="col-sm-12">
                                                <label class="col-form-label" for="">Q. {{index+1}} :</label>
                                                <label class="col-form-label" for=""> {{ques.question_name}} :</label>
                                                
                                                  
                                            </div>
                                            <div class="col-sm-12" v-if="ques.question_mode=='Yes/No'">
                                                  <div class="col-sm-3>">
                                                    <input type="radio" name="yes"> Yes
                                                  </div>
                                                  <div class="col-sm-3>">
                                                    <input type="radio" name="yes"> No
                                                  </div>
                                                
                                            </div>
                                            <div class="col-sm-12" v-else-if="ques.question_mode=='Descriptive'">
                                             
                                                <textarea placeholder="Description" class="form-control"></textarea>
                                                
                                            </div>
                                            <div class="col-sm-12" v-else-if="ques.question_mode=='MCQ'">
                                              
                                              <div class="col-sm-3>"><input type="radio" name="yes"> {{ques.option1}}</div>
                                              <div class="col-sm-3>"><input type="radio" name="yes"> {{ques.option2}}</div>
                                              <div class="col-sm-3>"><input type="radio" name="yes"> {{ques.option3}}</div>
                                              <div class="col-sm-3>"><input type="radio" name="yes"> {{ques.option4}}</div>
                                            </div>
                                          
                                    </div>
                               </fieldset>     
                            </div>
                            <button type="submit" class="btn btn-success">{{ applyStatus ? 'Applying...' : 'Apply' }}</button>
                            <button type="button" class="btn btn-danger">Reset</button>
                      </div>        
                </form>
                 </div>
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
        name: "ViewApplyQuestion",
        data() {
            return {
                applyStatus: false,
            }
        },
        mounted(){
            this.$store.dispatch('getAllData',`/view-job-only/${this.$route.params.jbsid}`)
            this.$store.dispatch('getAllRecruiter',`/view-question-only/${this.$route.params.jbsid}`)
        },
        computed:{
            allIndustry(){
				return this.$store.getters.getAllData
            },
            allRecruiter(){
                return this.$store.getters.getAllRecruiter
            },
        },
         methods:{
          ApplyJob(id) {
            this.applyStatus = true;
            axios.post('/apply-job/'+id).then((response)=>{
                this.applyStatus = false;
                this.$router.push('/appliedjob')
                toast({
                    type: 'success',
                    title: 'Job Applied Successfully'
                })
            })
          },

         }
    }
</script>

<style scoped>

</style>