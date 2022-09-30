<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
              <button class="btn btn-primary">
                <router-link to="/adminuser-role-list" style="color:#fff">Role List</router-link>
              </button>
            </ol>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Assign Role</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Assign User Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="adduser()">
                            <div class="card-body">
                                
                              
                                
                                <div class="form-group" >
                                <label>Select User Name</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.user_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="user.id" v-for="user in allUser"> {{user.name}}</option>
                                    </select>
                                    <has-error :form="form" field="name"></has-error>
                                    </div>

                                    <h5>Assign Role</h5>
                                    <div class="form-group" v-for="(menu,index) in allMenu">
                                    <input type="checkbox" name="menu" v-bind:value="menu['id']" v-model="form.roles_assigned"> <label> {{menu['menu']}}</label> <span v-if="menu.submenu"> <b> -> </b> </span> {{menu['submenu']}}
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
               user_id:'',
               roles_assigned:[],
             })
         }
     },
     mounted(){
          this.$store.dispatch('getAllDesignation','/adminuser-name')
          this.$store.dispatch('getAllData','/getMenu')
        },
        computed:{
          allUser(){
            return this.$store.getters.getAllDesignation
          },

          allMenu(){
            return this.$store.getters.getAllData
          },
          
        },
      
        methods:{
          
            adduser(){
                this.form.post('/add-role')
                    .then(()=>{
                        this.$router.push('/adminuser-role-list')
                        toast({
                            type: 'success',
                            title: 'Role Assign successfully'
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