<template>
    <div id="comingsoon">
    
        <main-header></main-header>
      <section>
           <div id="particles-js"></div>
        <div id="triangles">
            <header class="coming-header">
                <a href="http://naukriyan.com/#/">
                    <img :src="'assets/public/asset/img/naukriyana1.png'">
                </a>

            </header>

            <div class="content">
                <img :src="'assets/public/asset/img/job-clipart-job-seeker.png'"
                    class="img-circle img-fluid coming-logo mb-5">
                <h2>Something Big Is Coming Soon</h2>
                <!-- <a class="btn" href="http://naukriyan.com">Go back to our Homepage</a> -->
            </div>
        </div>
      </section>
      <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "Comingsoon",
        mounted(){
            this.$store.dispatch('getAllProfile','/userprofile')
            if (localStorage.getItem('reloaded')) {
                // The page was just reloaded. Clear the value from local storage
                // so that it will reload the next time this page is visited.
                localStorage.removeItem('reloaded');
            } else {
                // Set a flag so that we know not to reload the page twice.
                localStorage.setItem('reloaded', '1');
                location.reload();
            }
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
