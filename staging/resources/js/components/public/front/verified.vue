<template>
    <div id="faq">
      <main-header></main-header>
        <header class="masthead1 text-center text-white mt-5">



        </header>

        <section class="section mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto">
                      <div class="verified">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                          <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                          <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                        </svg>
                        <h3>Thank you !</h3>
                        <p>Your Email has been Successfully verified.</p>
                        <a href="/"><button class="btn btn-primary"><i class="fas fa-undo-alt"></i> Go to Home</button></a>

                      </div>
                    </div>
                </div>
            </div>
        </section>
        <main-footer></main-footer>

    </div>
</template>

<script>
    export default {
        name: "Verified",
        
    }
</script>

<style scoped>
.verified{
  background-color: #fff;
  padding: 45px;
  text-align: center;
  border: 1px solid #f1f1f1;
  box-shadow: 1px 2px 20px #f5f5f5;
}
.verified h3{
  font-size: 40px;
  margin-top: 1rem;
}
.verified p{
  margin-top: 15px;
}
svg {
  width: 100px;
  display: block;
  margin: 10px auto 0;
}
.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 0;
}
.path.circle {
  -webkit-animation: dash .9s ease-in-out;
  animation: dash .9s ease-in-out;
}
.path.line {
  stroke-dashoffset: 1000;
  -webkit-animation: dash .9s .35s ease-in-out forwards;
  animation: dash .9s .35s ease-in-out forwards;
}
.path.check {
  stroke-dashoffset: -100;
  -webkit-animation: dash-check .9s .35s ease-in-out forwards;
  animation: dash-check .9s .35s ease-in-out forwards;
}

@-webkit-keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes dash {
  0% {
    stroke-dashoffset: 1000;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@-webkit-keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}
@keyframes dash-check {
  0% {
    stroke-dashoffset: -100;
  }
  100% {
    stroke-dashoffset: 900;
  }
}

</style>