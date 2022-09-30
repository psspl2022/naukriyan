<template>
    <div id="something">
    
        <main-header></main-header>
      <section>
           <div id="particles-js"></div>
       <div class="container">
         <div id="triangles">

           <div class="content">
             <img :src="'assets/public/asset/img/job-clipart-job-seeker.png'"
                  class="img-circle img-fluid coming-logo mb-5">

             <h2>Coming Soon</h2>
             <div class="progress">
               <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
             </div>
             <p>We are working on premium services for our clients and subscribers and will be launching them soon . Till then Stay in touch with us . If you have any suggestions you can write to us and we will feel delighted to incorporate them . </p>
             <!-- <a class="btn" href="http://naukriyan.com">Go back to our Homepage</a> -->
           </div>
         </div>
       </div>
      </section>
      <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "something",
        mounted(){
            this.$store.dispatch('getAllProfile','/userprofile')
           /* if (localStorage.getItem('reloaded')) {
                // The page was just reloaded. Clear the value from local storage
                // so that it will reload the next time this page is visited.
                localStorage.removeItem('reloaded');
            } else {
                // Set a flag so that we know not to reload the page twice.
                localStorage.setItem('reloaded', '1');
                location.reload();
            }*/
        },
        computed:{
            allProfile(){
                return this.$store.getters.getAllProfile
            }
        },

    }
</script>

<style scoped>

</style>
