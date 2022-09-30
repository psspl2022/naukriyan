<template>
    <div id="comingsoon">

      <section>
            <canvas></canvas>
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
                <a class="btn" href="http://naukriyan.com/#/">Go back to our Homepage</a>
            </div>
        </div>
      </section>
    </div>
</template>

<script>
    export default {
        name: "Comingsoon",

    }
</script>

<style scoped>

</style>
