<template>
  <div id="changepasswordconsultant">
      <consultant-header></consultant-header>
    <section class="section" id="forget">
            <div class="container-center">
                <form action=""class="form" role="form" @submit.prevent="updatePasswordConsultant()">
                    <center>
                        <img :src="'assets/public/asset/img/naukriyana1.png'" width="40%">

                    </center>
                    <h2>Don't Worry!</h2>
                    <h4>
                        Just enter your new and confirm password
                        and we can do the rest
                    </h4>
                    <div class="formgroup">
                        <input type="password" id="new_password"  v-model="form.new_password" name="new_password" :class="{ 'form-control is-invalid': form.errors.has('new_password') }" />
                        <label for="new_password"><br>New Password</label>
                        <span>enter your new password</span>
						<has-error :form="form" field="new_password"></has-error>

                    </div>
                    <div class="formgroup">   
                        <input type="password" id="confirm_password"  v-model="form.confirm_password" name="confirm_password" :class="{ 'form-control is-invalid': form.errors.has('confirm_password') }" />
                        <label for="confirm_password"><br> Confirm New Password</label>
                        <span>confirm new password</span>
                        <has-error :form="form" field="confirm_password"></has-error>
                    </div>

                    <button id="login-btn" type="submit">Change Password</button>

                </form>

                <!-- <p class="text-center text-white pt-3">Did you remember? <a href="" class="text-white">Sign In</a></p> -->
            </div>
        </section>
        <consultant-footer></consultant-footer>
  </div>
</template>

<script>
export default {
  name: "ChangePasswordConsultant",
  data() {
    //let now = new Date()
    return {
        form: new Form({
                    new_password:'',
                	confirm_password:'',
                })
    };
  },
  mounted() {},
  computed: {},
  methods: {
      updatePasswordConsultant(){

                this.form.post(`/update-password-consultant`)
                    .then((response)=>{
                        if(response.status === 200) {
                            axios.get('/consultant-logout').then(response => {
                                this.$router.push('/consultant-login?success=true&ref=change-password')
                                //window.location.reload();
                                toast({
                                    type: 'success',
                                    title: 'Password has been updated.'
                                })
                            })
                        }
                    })
                    .catch(()=>{

                    })

            }
  },
};
</script>

<style scoped>
</style>