<template>
    <div id="resetpassword">
        <section class="section" id="forget">
            <div class="container-center">

                <form action="" class="form">
                    <center>
                        <img :src="'assets/public/asset/img/naukriyana1.png'" width="40%">
                    </center>
                    <h2>Don't Worry!</h2>
                    <h4>
                        Just provide your email
                        and we can do the rest
                    </h4>
                    <div class="formgroup">
                        <input type="password" id="password" />
                        <label for="password"><br>New Password</label>
                        <span>enter your new password</span>


                    </div>
                    <div class="formgroup">
                        <input type="password" id="confirm_password" />
                        <label for="confirm_password"><br> Confirm New Password</label>
                        <span>confirm new password</span>
                    </div>

                    <button id="login-btn">Reset</button>



                </form>

                <!-- <p class="text-center text-white pt-3">Did you remember? <a href="" class="text-white">Sign In</a></p> -->
            </div>
        </section>

    </div>
</template>

<script>
    export default {
        name: "Resetpassword",

    }
</script>

<style scoped>

</style>
