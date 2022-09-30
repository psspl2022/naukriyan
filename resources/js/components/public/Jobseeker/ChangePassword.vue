<template>
  <div id="changepassword">
    <section class="section" id="forget">
      <div class="container-center">
        <form action="" class="form" role="form" @submit.prevent="updatePassword()">
          <center>
            <img :src="'assets/public/asset/img/naukriyana1.png'" width="40%">

          </center>
          <h2>Don't Worry!</h2>
          <h4>
            Just enter your new and confirm password
            and we can do the rest
          </h4>
          <div class="formgroup">
            <input type="password" id="old_password" class="" v-model="form.old_password" name="old_password"
                   :class="{ 'form-control is-invalid': form.errors.has('old_password') }"/>
            <label for="old_password"><br>Old Password</label>
            <span>Enter your Old password</span>
            <has-error :form="form" field="old_password"></has-error>
          </div>
          <div class="formgroup">
            <input type="password" id="new_password" v-model="form.new_password" name="new_password"
                   :class="{ 'form-control is-invalid': form.errors.has('new_password') }"/>
            <label for="new_password"><br>New Password</label>
            <span>enter your new password</span>
            <has-error :form="form" field="new_password"></has-error>

          </div>
          <div class="formgroup">
            <input type="password" id="confirm_password" v-model="form.confirm_password" name="confirm_password"
                   :class="{ 'form-control form-control-error is-invalid': form.errors.has('confirm_password') }"/>
            <label for="confirm_password"><br> Confirm New Password</label>
            <span>confirm new password</span>
            <has-error :form="form" field="confirm_password"></has-error>
          </div>
          <button id="login-btn" type="submit">Change Password</button>

          <p class="text-center pt-3">
            <i class="fa fa-arrow-left"></i> Back to
            <router-link to="/dashboard">Dashboard</router-link>
          </p>

        </form>
      </div>
    </section>

  </div>
</template>

<script>

export default {
  name: "ChangePassword",
  data() {
    return {
      form: new Form({
        new_password: '',
        confirm_password: '',
        old_password: '',
      })
    }
  },
  methods: {
    updatePassword() {
      this.form.post(`/update-password-jobseeker`)
          .then((response) => {
            if (response.status === 200) {
              axios.get('/jobseeker-logout').then(response => {
                this.$router.push('/?success=true&ref=change-password')
                window.location.reload();
                toast({
                  type: 'success',
                  title: 'Password has been updated.'
                })
              })
            }
            if (response.status === 201) {
              toast({
                type: 'warning',
                title: 'Old password not matched.'
              })
            }

          })
    }
  }
}

</script>

<style scoped>

</style>
