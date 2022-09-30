<template>
    <div id="questionnaires">
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
                     <button type="button"  data-toggle="modal" data-target="#addQuestionnarie" class="btn btn-success text-white mr-2">Add Question to Questionnarie</button>
                    
                </div>
              
          
             <div class="card mt-3">
               
                 <div class="card-body">
                  
                      <div class="table-responsive custom-height">
              <table class="table custom-table mt-2" id="example1">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Question Mode</th>
                      <th>Question Title/Category</th>
                      <th>Question Name</th>
                      <th>Industry</th>
                      <th>Functional role</th>
                      <th>Options</th>
                      <th>Marks</th>
                      
                      <th>Active</th>
                      <th>Actions</th>
    
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(question,index) in alldata" :key="question.id">
                      <td><input type="checkbox" id="check" name="check[]" :value="question.id">{{index+1}}</td>
                      <td>{{question.question_mode}}</td>
                      <td>{{question.title}}/{{question.question_category}}</td>
                       <td>{{question.question_name}}</td>
                      <td>{{question.category_name}}</td>
                       <td>{{question.subcategory_name}}</td>
                      <td>{{question.option1}},{{question.option2}},{{question.option3}},{{question.option4}}</td>
                      <td>{{question.marks}}</td>
                      
                      <td>{{question.active}}</td>
                      <td>
                        <a class="btn btn-sm btn-primary text-white" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-edit"></i></a>
                       
                        
                        
                       
                      </td>
                      
                      
                    </tr>
                  
                  </tbody>
                </table>
     
              </div>

      
                 </div>
             </div>
             
              <!-- /.card-body -->
              </div>
           </div>
        </div>
        <!-- /.row -->
                         <!-- Modal -->
              <!-----------Tag Modal------------------------------>
<div class="modal fade popupForm custom-model-width" id="addQuestionnarie">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Questionnarie </h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <!-- form start -->
        <div class="form-group row">

                <div class="col-sm-8">
               <select name="tag" id="tag" class="form-control">
                <option>Select Questionnarie</option>
                   <option v-for="(tag,index) in allTag" :value="tag.id">{{tag.name}}</option>
               </select>
             </div>

             <div class="col-sm-4">
               <button type="button"  @click="addnew()" data-dismiss="modal" data-toggle="modal" data-target="#addnewTag" class="btn btn-info">Add New</button>  
             </div>
      </div>
        

    </div>
           
      <!-- Modal footer -->
     <div class="modal-footer justify-content-center">
         <button type="button" @click="addQuestionnarie()" class="btn btn-danger">Submit</button>  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- add new questionnarie -->
      </section>
      
         <!-- The add Questionnaires start -->
<div class="modal fade popupForm custom-model-width" id="addQuestionnaires">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Questionnaires</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>   
      </div>

      <!-- Modal body -->
        <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-4">
                <label class="col-form-label" for=""> Questionnaires</label>
                <input type="text" class="form-control" placeholder="Enter Your Questionnaires" id="" />
            </div>
             <div class="col-sm-4">
                 <label class="col-form-label" for="">Submition Days</label>
                <input type="email" class="form-control" placeholder="Enter Your Submition Days" id="" />
            </div>
              <div class="col-sm-4">
                 <label class="col-form-label" for="">Questions</label>
               <input type="email" class="form-control" placeholder="Enter Questions" id="" />
            </div>
        </div>
       
       
      </div>

      <!-- Modal footer -->
     <div class="modal-footer justify-content-center">
           <button type="button" class="btn btn-primary text-white">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- The add Questionnaires end -->
<!-- add new questionnarie -->
<!-----------Add New Tag Modal------------------------------>
<div class="modal fade popupForm custom-model-width" id="addnewTag">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add New Questionnarie </h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <!-- form start -->
        

                <div class="col-sm-12">
               <input type="text" name="newquestionnarie" id="newquestionnarie" class="form-control" placeholder="Input New Questionnarie title">
             </div>

             
        

    </div>
           
      <!-- Modal footer -->
     <div class="modal-footer justify-content-center">
         <button type="button" @click="savequestionnarie()" class="btn btn-danger">Submit</button>  
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "List",
        data() {
            return {
                
                
              
            }
        },
        mounted(){
          
          this.$store.dispatch('getAllData','/question-emp')
          this.$store.dispatch('getAllDesignation','/questionnarie-name_emp')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          },
          allTag(){
            return this.$store.getters.getAllDesignation
          },
          
        },
        methods:{
             savequestionnarie() 
              {
                
                var x = document.getElementById('newquestionnarie').value;
                
                
                axios.post('add-new-questionnarie_emp/'+x).then(response => {
                  if(response)
                  {
                    
                    toast({
                            type: 'success',
                            title: 'New Created Successfully'   
                        })
                    this.$router.push('/view-question-emp')
                  }

              })
                
              },
              addQuestionnarie() 
              {
                var x = "";
                var tag = $('#tag').val();
                var cboxes = document.getElementsByName('check[]');
                var len = cboxes.length;
                for (var i=0; i<len; i++) 
                {
                //alert(i + (cboxes[i].checked?' checked ':' unchecked ') + cboxes[i].value);
                    if(cboxes[i].checked)
                    {
                     x = x + ","+cboxes[i].value;
                    }
                }
                axios.post('add-questionnarie_emp/'+tag+'/'+x).then(response => {
                  if(response)
                  {
                    this.$router.push('/view-question-emp')
                    toast({
                            type: 'success',
                            title: 'Questionnarie Added Successfully'   
                        })
                  }

              })
                
              },
              
              
          
        },
        created: function() {
            
            
        },

    }


</script>

<style scoped>

</style>