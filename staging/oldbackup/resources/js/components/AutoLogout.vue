<template>
  <div v-if="warningZone" class="warning">
<!--    We detecting you dont have any activity since 15 minutes .So you will be automatically logout in next 60 seconds?-->
  </div>
</template>

<script>
export default {
  name: "AutoLogout",
  data() {
    return {
      events: ['click', 'mousemove', 'mousedown', 'scroll', 'load', 'keypress'],
      warningTimer: null,
      logoutTimer: null,
      warningZone: false,

    };
  },
  mounted() {
    this.events.forEach(function (event) {
      window.addEventListener(event, this.resetTimer);
    }, this);

    this.setTimers();


  },
  destroyed() {
    this.events.forEach(function (event) {
      window.removeEventListener(event, this.resetTimer);
    }, this);

    this.resetTimer();

  },
  methods: {
    setTimers: function () {
      //both start at same time
      this.warningTimer = setTimeout(this.warningMessage, 15 * 60 * 1000);//14 minutes = 14*60*1000
      this.logoutTimer = setTimeout(this.logoutUser, 16 * 60 * 1000);//15 minutes = 15*60*1000
      this.warningZone = false;
    },

    warningMessage: function () {
      this.warningZone = true;
      this.showAlert()
    },

    showAlert() {
      if (this.warningZone === true) {
        swal({
          title: "Auto Logout Warning",
          html: "<p>We detecting you dont have any activity since 15 minutes.</p><p>So you will be automatically logout in next 60 seconds?</p>",
          type: "warning"
        });
      } else {
        return false;
      }
    },

    logoutUser: function () {
      document.getElementById('logout-form').submit();
    },

    resetTimer: function () {
      clearTimeout(this.warningTimer);
      clearTimeout(this.logoutTimer);
      this.setTimers();
    }

  }

}
</script>

<style scoped>

</style>