<template>
  <div>
    <div id="app" style="width: 90vw !important">
      <img
        style="object-fit: contain"
        src="http://127.0.0.1:8000/jobseeker_profile_image/1668062160.png"
      />
      hhello
    </div>
    <button @click="download">Download</button>
    <div id="pdf"></div>
  </div>
</template>

<script>
import html2canvas from "html2canvas";
import jsPDF from "jspdf";
export default {
  name: "resumepdf",
  methods: {
    download() {
      html2canvas(document.querySelector("#app"), {
        imageTimeout: 5000,
        useCORS: true,
      }).then((canvas) => {
        document.getElementById("pdf").appendChild(canvas);
        let img = canvas.toDataURL("image/png");
        var pdf = new jsPDF("p", "mm", [274, 210]);
        pdf.addImage(img, "jpeg", 5, 5, 100, 100);
        var new2 = "hello";
        pdf.save(new2 + ".pdf");
        // document.getElementById("pdf").innerHTML = "";
      });
    },
  },
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
