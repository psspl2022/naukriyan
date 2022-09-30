<template>
    <div id="not_found">
        <jobseeker-header v-if="allProfile.user_type === 'Jobseeker'"></jobseeker-header>
        <Emp-header v-if="allProfile.user_type === 'Employer'"></Emp-header>
        <main-header v-if=""></main-header>

        <section class="not__found mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                        <img src="https://via.placeholder.com/350x350" alt="">
                        <h2>Page not found</h2>
                    </div>
                </div>
            </div>
        </section>

        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "NotFound.vue",
        mounted() {
            this.$store.dispatch('getAllProfile', '/userprofile')
        },
        computed: {
            allProfile() {
                return this.$store.getters.getAllProfile
            }
        }
    }
</script>

<style scoped>

</style>