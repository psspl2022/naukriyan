<template>
  <div id="consultantDashboard">
    <consultant-header></consultant-header>
    <section class="top-adjust pt-5 pb-5">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                  <li class="active">Consultant Dashboard</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line"><i class="fa fa-headphones mr-1 Phone is-animating"
                                       aria-hidden="true"></i> <a href="tel:919711999999">Hot Line: +91 9711 99 99
                  99</a></p>
              </div>

            </div>

          </div>

        </div>
      </div>
    </section>
    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <!-- <div class="cms-pg-header">
                <h2 class="hk-pg-title">Account Executive</h2>
            </div> -->


            <div class="card mt-3 card-dashboard">

              <div class="card-body">

                <div class="app-sidebar__user clearfix active">
                  <div class="dropdown user-pro-body">
                    <div class="" v-if="user.profile_img">
                      <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded"
                           :src="'/storage/consultant_profile_image/'+ user.profile_img">
                      <span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="" v-else>
                      <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded"
                           :src="'assets/public/asset/img/profile-img.jpg'">
                      <span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                      <h4 class="font-weight-semibold mt-3 mb-0">{{ user.first_name }} {{ user.last_name }}</h4> <span
                        class="mb-0 text-muted">{{ user.designation }}</span>
                    </div>

                  </div>
                </div>
                <hr>
                <div class="row progress-r">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center pb-2">
                      <p class="mb-0">Screening Ratio</p>
                    </div>
                    <h4 class="font-weight-bold mb-2">{{ countData.screening_ratio_in_percentage }}</h4>
                    <div class="progress progress-style progress-sm">
                      <div class="progress-bar bg-primary-gradient wd-80p" role="progressbar"
                           aria-valuenow="" aria-valuemin="0" aria-valuemax=""></div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-4 mt-md-0">
                    <div class="d-flex align-items-center pb-2">
                      <p class="mb-0">Shortlisting Ratio
                      </p>
                    </div>
                    <h4 class="font-weight-bold mb-2">{{ countData.shortlisting_ratio_in_percentage }}</h4>
                    <div class="progress progress-style progress-sm">
                      <div class="progress-bar bg-danger-gradient wd-75" role="progressbar"
                           aria-valuenow="45" aria-valuemin="0" aria-valuemax="45"></div>
                    </div>
                  </div>
                </div>
                <hr>
                <h6 class="card-title">Here are your actions for the day</h6>

                <div class="list-group mt-3">
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Uploaded CV</p><span class="badge badge-primary">{{ countData.pending }}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Screening Pending</p><span class="badge badge-primary">{{ countData.screening_pending }}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Post Interview Follow Up</p><span class="badge badge-primary">{{ countData.interview }}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Interview Done</p><span
                        class="badge badge-secondary">{{ countData.interview_scheduled }}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Shortlisted</p><span class="badge badge-success">{{ countData.shortlisted }}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Joined</p><span class="badge badge-secondary">{{ countData.joined }}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Rejected</p><span class="badge badge-danger">{{ countData.cv_rejected }}</span>
                    </div>
                  </a></router-link>

                </div>
              </div>
            </div>

          
          </div>
<div id="chartdiv"></div>
        </div>

      </div>
      <!-- /.row -->
    </section>
    <consultant-footer></consultant-footer>
  </div>
</template>

<script>
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);
export default {
  name: "ConsultantDashboard",
  data() {
    return {
      user: [],
      countData: [],
    };
  },
  mounted(){
      //this.getRecruitmentGraph();
  },

  created() {
    this.getSessionUser();
    this.getCountData();
  },

  methods: {
    getSessionUser() {
      axios.get("/get-consultant-profile").then((response) => {
        if (response.data) {
          this.user = response.data.data;
        }
      });
    },

    getCountData() {
      axios.get("/count-data").then((response) => {
        if (response.status === 200) {
          this.countData = response.data.data;
        }
      });
    },
    //graph start
    getRecruitmentGraph(){
      am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv", am4charts.XYChart);

chart.data = [{
 "country": "Selected",
 "visits": 2025
}, {
 "country": "Rejected",
 "visits": 1882
}, {
 "country": "Japan",
 "visits": 1809
}, {
 "country": "Germany",
 "visits": 1322
}, {
 "country": "UK",
 "visits": 1122
}, {
 "country": "France",
 "visits": 1114
}, {
 "country": "India",
 "visits": 984
}, {
 "country": "Spain",
 "visits": 711
}, {
 "country": "Netherlands",
 "visits": 665
}, {
 "country": "Russia",
 "visits": 580
}, {
 "country": "South Korea",
 "visits": 443
}, {
 "country": "Canada",
 "visits": 441
}];

chart.padding(40, 40, 40, 40);

var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "country";
categoryAxis.renderer.minGridDistance = 60;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;
valueAxis.extraMax = 0.1;
//valueAxis.rangeChangeEasing = am4core.ease.linear;
//valueAxis.rangeChangeDuration = 1500;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryX = "country";
series.dataFields.valueY = "visits";
series.tooltipText = "{valueY.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusTopRight = 10;
series.columns.template.column.cornerRadiusTopLeft = 10;
//series.interpolationDuration = 1500;
//series.interpolationEasing = am4core.ease.linear;
var labelBullet = series.bullets.push(new am4charts.LabelBullet());
labelBullet.label.verticalCenter = "bottom";
labelBullet.label.dy = -10;
labelBullet.label.text = "{values.valueY.workingValue.formatNumber('#.')}";

chart.zoomOutButton.disabled = true;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function (fill, target) {
 return chart.colors.getIndex(target.dataItem.index);
});

setInterval(function () {
 am4core.array.each(chart.data, function (item) {
   item.visits += Math.round(Math.random() * 200 - 100);
   item.visits = Math.abs(item.visits);
 })
 chart.invalidateRawData();
}, 2000)

categoryAxis.sortBySeries = series;

}); // end am4core.ready()
    }
    //graph close
  },
};


</script>

<style >
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>
