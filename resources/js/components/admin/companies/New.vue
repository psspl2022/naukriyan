<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
              <button class="btn btn-primary">
                <router-link to="/companies-list" style="color:#fff">Company List</router-link>
              </button>
            </ol>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Company</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                  
                  
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Company</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <!-- <form role="form" @submit.prevent="addAdvertisement()" action="/add-advertisement" enctype="multipart/form-data"> -->
                        <form role="form" method="post" @submit.prevent="addCompany()" enctype="multipart/form-data">
                            <div class="card-body">
                                 
                              
                                <div class="form-group">
                                  <label for="company_name"> Company name</label>
                                  <input type="text" class="form-control" id="company_name" placeholder="Add Company Name" v-model="form.company_name" name="company_name" :class="{ 'is-invalid': form.errors.has('company_name') }">
                                    <has-error :form="form" field="company_name"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="owner_name"> Owner name</label>
                                  <input type="text" class="form-control" id="owner_name" placeholder="Owner name" v-model="form.owner_name" name="owner_name" :class="{ 'is-invalid': form.errors.has('owner_name') }">
                                    <has-error :form="form" field="owner_name"></has-error>
                                </div>
                                <div class="form-group" >
                                    <label>Select Industry</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('company_industry') }" v-model="form.company_industry">
                                        <option disabled value="">Select Industry</option>
                                        <option :value="industry.id" v-for="industry in allIndustry"> {{industry.category_name}}</option>

                                    </select>
                                    <has-error :form="form" field="company_industry"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select State</label>
                                    <select @change="StateId($event)" class="form-control" :class="{ 'is-invalid': form.errors.has('company_state') }" v-model="form.company_state">
                                        <option disabled value="">Select State</option>
                                        <option :value="state.id" v-for="state in allStates"> {{state.states_name}}</option>

                                    </select>
                                    <has-error :form="form" field="company_state"></has-error>
                                </div>
                                <div class="form-group" >
                                    <label>Select City</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('p_city_id') }" v-model="form.p_city_id">
                                       <option disabled value="">Select City</option>
                                      <option :value="city.id" v-for="city in percity"> {{city.cities_name}}</option>
                                     </select>
                                    <has-error :form="form" field="p_city_id"></has-error>
                                </div>
                                <div class="form-group" >
                                    <label>No.Of Employee</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('no_of_employee') }" v-model="form.no_of_employee">
                                        <option disabled value="">Select One</option>
                                        <option value="1-10">1-10</option>
                                        <option value="11-100">11-100</option>
                                        <option value="101-1000">101-1000</option>
                                        <option value="1001-10000">1001-10000</option>

                                    </select>
                                    <has-error :form="form" field="no_of_employee"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="address"> Address</label>
                                  <textarea class="form-control" id="address" placeholder="Add Address" v-model="form.address" name="address" :class="{ 'is-invalid': form.errors.has('address') }"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="cin_no"> CIN Number</label>
                                  <input type="text" class="form-control" id="cin_no" placeholder="Add CIN Number" v-model="form.cin_no" name="cin_no" :class="{ 'is-invalid': form.errors.has('cin_no') }">
                                    <has-error :form="form" field="cin_no"></has-error>
                                </div>
                                <div class="form-group">   
                                <label for="establish_date">Establish date</label> 
                                 <input type="date" class="form-control" id="establish_date" placeholder=" Establish Date" v-model="form.establish_date" name="establish_date" :class="{ 'is-invalid': form.errors.has('establish_date') }" autocomplete="off">
                                  <has-error :form="form" field="establish_date"></has-error>
                                </div>

                                 <div class="form-group">
                                  <label for="titleId">Upload Company Logo</label>
                                  <input type="file"  class="form-control" name="company_logo" @change="changePhoto($event)">
                                    <has-error :form="form" field="title"></has-error>
                                </div> 

                                <div class="form-group">
                                  <label for="company_email"> Company Email</label>
                                  <input type="email" class="form-control"  placeholder="Company Email" v-model="form.company_email" name="company_email" :class="{ 'is-invalid': form.errors.has('company_email') }">
                                    <has-error :form="form" field="company_email"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="company_contact"> Company Contact</label>
                                  <input type="text" class="form-control"  placeholder="Company Contact" v-model="form.company_contact" name="company_contact" :class="{ 'is-invalid': form.errors.has('company_contact') }">
                                    <has-error :form="form" field="company_contact"></has-error>
                                </div>
                                  <div class="form-group">
                                  <label for="titleId">Upload Company Cover</label>
                                  <input type="file"  class="form-control" name="cover_image" @change="changecover($event)">
                                    <has-error :form="form" field="title"></has-error>
                                </div>  
                                <div class="form-group">
                                  <label for="website"> Website</label>
                                  <input type="text" class="form-control"  placeholder="Website" v-model="form.website" name="website" :class="{ 'is-invalid': form.errors.has('website') }">
                                    <has-error :form="form" field="website"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="about"> About</label>
                                  <textarea class="form-control" placeholder="Add About" v-model="form.about" name="about" :class="{ 'is-invalid': form.errors.has('about') }"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="company_capital"> Company capital <i class="fas fa-rupee-sign"></i></label>
                                  <textarea class="form-control" placeholder="Company capital" v-model="form.company_capital" name="company_capital" :class="{ 'is-invalid': form.errors.has('company_capital') }"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="tagline"> Tagline</label>
                                  <textarea class="form-control"  placeholder="Tagline" v-model="form.tagline" name="tagline" :class="{ 'is-invalid': form.errors.has('tagline') }"></textarea>
                                </div>
                                 <!--  <div class="form-group">
                                  <label for="titleId">Upload Company Video</label>
                                  <input type="file"  class="form-control" name="company_video" @change="changevideo($event)">
                                    <has-error :form="form" field="title"></has-error>
                                </div>  -->

                                 
                                  
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
        	company_industry:[],
           company_state:[],
            percity: [],
              form: new Form({
                company_name:'',
                company_industry:'',
                company_state:'',
                p_city_id:'',
                no_of_employee:'',
                address:'',
                cin_no:'',
                establish_date:'',
                company_logo:'',
                company_email:'',
                company_contact:'',
                cover_image:'',
                website:'',
                about:'',
                company_capital:'',
                tagline:'',
                owner_name:'',
                company_capital:''
                //company_video:''
                
             })
         }
     },
      mounted(){
          
          this.$store.dispatch('getAllData','/industry')
          this.$store.dispatch('getAllState','/states')
        },
        computed:{
          
          allIndustry(){
            return this.$store.getters.getAllData
          },
          allStates(){
            return this.$store.getters.getAllState
          },
        },
        methods:{
          // changePdf(event){
          //       let file = event.target.files[0];

          //        if(file.size>8388608){
          //            swal({
          //                type: 'error',
          //                title: 'Oops...',
          //                text: 'Something went wrong!',
          //                footer: '<a href>Why do I have this issue?</a>'
          //            })
          //        } else {
          //            let reader = new FileReader();
          //            reader.onload = event => {
          //                this.form.attachment = event.target.result
          //                //console.log(event.target.result)
          //            };
          //            reader.readAsDataURL(file);
          //        }

          //   },
          changePhoto(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'File size too large!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.company_logo = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },
            changecover(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'File size too large!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.cover_image = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },
            /*changevideo(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'File size too large!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.company_video = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },*/
          StateId(event){
             let stateId = event.target.value;
             console.log(stateId);
               axios.get('/get-city/'+stateId)
                   .then((response)=>{
                    console.log(response);
                      if(response){
                         this.percity = response.data.data;  
                      }
                   })
                   .catch(()=>{

                   })
            },
            addCompany(){
                this.form.post('/add-companies')
                    .then(()=>{
                        this.$router.push('/companies-list')
                        toast({
                            type: 'success',
                            title: 'Company Details Added successfully'
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