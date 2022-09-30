<template>
    <div id="profile-percentage">
        <div class="corner-div" v-if="percentage">
             <small>Profile Complete - {{ percentage + '%'}}</small>
             <small style="float:right">Last Modified - {{getHumanDate(jsdata.last_modified)}}</small>
               <div class="progress mb-1 mt-1" v-if="percentage == 100">
                    <div class="progress-bar progress-bar-striped bg-success" :style="{'width': percentage + '%'}">{{ percentage }}%</div>
                  </div>
                  <div class="progress mb-1 mt-1" v-if="percentage > 60 && percentage <= 99">
                    <div class="progress-bar progress-bar-striped bg-primary" :style="{'width': percentage + '%'}">{{ percentage }}%</div>
                  </div>
                  <div class="progress mb-1 mt-1" v-if="percentage > 40 && percentage <= 60">
                    <div class="progress-bar progress-bar-striped bg-secondary" :style="{'width': percentage + '%'}">{{ percentage }}%</div>
                  </div>
                  <div class="progress mb-1 mt-1" v-if="percentage > 20 && percentage <= 40">
                    <div class="progress-bar progress-bar-striped bg-warning" :style="{'width': percentage + '%'}">{{ percentage }}%</div>
                  </div>
                  <div class="progress mb-1 mt-1" v-if="percentage <= 20">
                    <div class="progress-bar progress-bar-striped bg-danger" :style="{'width': percentage + '%'}">{{ percentage }}%</div>
                  </div>
              <small>Complete your profile to get notified by Recruiters</small>
           </div>
           <div class="corner-div" v-else>
                  Performance Loading...
            </div>
    </div>
</template>
<script>
var moment = require("moment");
export default {
  name: "ProfileCompletePercentage",
  data() {
    return {
      percentage:'',
      jsdata:'',
       moment: moment
    };
  },
  computed: {

  },
  mounted() {
    this.getProfilePercentage();
    this.getJobseekerData();
  },
  methods:{
      getProfilePercentage(){
          axios.get("/profile/percentage").then((response) => {
        this.percentage = response.data.percentage;
      });
      },
      getJobseekerData(){
    axios.get("/jobseeker-profile").then((response) => {
        this.jsdata = response.data.data;
      });
  },
  getHumanDate: function (date) {
      return moment(date).fromNow();
    },
  },
  
};
</script>

<style scoped>
.corner-div{
  background-color: #fff;
    padding: 1rem;
    margin-top: 1rem;
}
</style>