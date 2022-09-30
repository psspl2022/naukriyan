<template>
    <div>
        <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
              
            </ol>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Broadcast Message</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                  
                  
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Broadcast Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <form role="form" @submit.prevent="addAdvertisement()" action="/add-advertisement" enctype="multipart/form-data"> -->
                        <form role="form" method="post" @submit.prevent="Broadcast()" enctype="multipart/form-data">
                            <div class="card-body">
                                 
                              
                                
                                <div class="form-group" >
                                    <label>From</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('mail_sender') }" v-model="form.mail_sender">
                                        <option disabled value="">Select Mail</option>
                                        <option value="newsletter@naukriyan.com" selected="" >newsletter@naukriyan.com</option>

                                    </select>
                                    <has-error :form="form" field="mail_sender"></has-error>
                                </div>

                                <div class="form-group">
                                	<label>Enter Your Message Here</label>
                               		<ckeditor :editor="editor" v-model="form.editorData"></ckeditor>

                                  <has-error :form="form" field="editorData"></has-error>
                                </div>
                                
                               
                                 
                                  
                              </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ exportStatus ? 'Please wait....' : 'Boroadcast' }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
        <!-- /.content -->
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name: "List",
        data(){
        //let now = new Date()
        return {
        	editor: ClassicEditor,
            exportStatus: false,
               
              form: new Form({
                mail_sender:'',
                editorData: '',
                
             })
         }
     },
        mounted(){
          this.$store.dispatch('getAllData','/newsletter')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
        	Broadcast()
        	{
                this.exportStatus = true;
        		this.form.post('/newsletter-broadcast')
                    .then(()=>{
                        this.$router.push('/newsletter-mailing')
                        this.exportStatus = false;
                        toast({
                            type: 'success',
                            title: 'Message Broadcast To all Newsletter User Successfully'
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