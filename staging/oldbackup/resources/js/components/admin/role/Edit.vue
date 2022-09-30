<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Admin User</li>
                    </ol>
                </div>
            </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Admin User {{roles_assigned}}</h3>

                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateAdminRole()">
                            <div class="card-body">{{editData}}

                                {{role_arr}}

                                <div class="form-group" >
                                    <label>Select User Name</label>
                                    <select class="form-control" disabled :class="{ 'is-invalid': form.errors.has('name') }" v-model="form.user_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="user.id" v-for="user in allUser"> {{user.name}}</option>

                                    </select>
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <h5>Assign Role</h5>
                                <div class="form-group" v-for="(menu,index) in allMenu">
                                    <div>
                                        <input type="checkbox" name="menu" :checked="roleArray.includes(menu.id) == true" v-bind:value="menu.id"> <label>  {{menu['menu']}}</label><span v-if="menu.submenu"> <b> -> </b> </span> {{menu['submenu']}}
                                    </div>
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
        name: "Edit",
        data(){
            return {
                roleId: this.$route.params.roleid,
                roleArray: [],
                demo123: [],
                form: new Form({
                    user_id:'',
                    //roles_assigned:[],
                    roles_assigned:'',
                })
            }
        },

        mounted(){
            this.$store.dispatch('getAllDesignation','/adminuser-nameall')
            this.$store.dispatch('getAllData','/getMenu')
            this.$store.dispatch('getEditData',`/edit-role/${this.$route.params.roleid}`)
            //this.getAssignData();
        },
        computed:{
            allUser(){
                return this.$store.getters.getAllDesignation
            },
            allMenu(){
                return this.$store.getters.getAllData
            },
            editData(){
                this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
            }



        },
        methods:{
            // isExist : function(){
            //   for(var i=0; i < this.countries.length; i++){
            //     if( this.countries[i].country_name == this.country_name){
            //       return true
            //     }
            //   }
            //   return false
            // },
            getAssignData() {
                const self = this;
                axios.get('/assign-role/'+this.roleId).then(response => {
                    console.log(response.data);
                    //this.roleArray = response.data;
                    if (response.data) {
                        $.each(response.data, function(key,value) {
                            self.roleArray.push(parseInt(value));
                        });
                    } else {
                        this.roleArray.push(0);
                    }
                })
            },


            updateAdminRole(){
                var array = []
                var checkedBoxes = document.querySelectorAll('input[name=menu]:checked');
                for (var i = 0; i < checkedBoxes.length; i++) {
                    array.push(checkedBoxes[i].value)
                }
                var roles_assigned=array.toString();
                //document.getElementById("as_role").value = roles_assigned;
                //updateRole();
                this.form.post(`/update-role/${this.$route.params.roleid}/${roles_assigned}`)
                    .then((response)=>{
                        this.$router.push('/adminuser-role-list')

                        toast({
                            type: 'success',
                            title: 'Admin User Role Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })


            }


        },
        created: function() {
            this.getAssignData();

        },
    }
</script>

<style scoped>

</style>