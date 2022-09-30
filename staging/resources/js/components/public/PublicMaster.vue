<template>
    <div id="publimain">
    	<router-view :key="this.$route.fullPath"></router-view>
    </div>
</template>

<script>
    export default {
        name: "PublicMaster"
    }
</script>

<style scoped>

</style>