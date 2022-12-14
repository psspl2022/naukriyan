<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Feedback with Naukriyan.com, it is best job portal in India. Naukriyan helps you find jobs and apply for jobs easily. Create your profile now. Best Skill Development Course, Best Drone Pilot Course"/>
  <meta name="keywords" content="Feedback, Best Skill Development Course, Best Drone Pilot Course, Best Job Portal in India, Best Job in India, Best Job Consultancy, Career, Job Search, Apply Jobs">
  <title>Feedback for Naukriyan.com| Best Job Portal in India | Best Skill Development Course | Best Drone Pilot Course</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:45px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }

    .breadcrumb-item +  .breadcrumb-item::before {
       color: #fff;
   }
   td{
     color:black;
     font-weight: 500;
   }
   #loading {
     position: fixed;
     display: flex;
     justify-content: center;
     align-items: center;
     width: 100%;
     height: 100%;
     top: 0;
     left: 0;
     opacity: 0.7;
     background-color: #fff;
     z-index: 99;
   }
 
   #loading-image {
     z-index: 100;
   }

   .btn{
     color: white!important;
     padding: 8px 16px!important;
   }
   thead > tr > th::before, thead > tr > th::after{
     content: none!important;
   }
   thead{
     background-color: #1E283D !important;
     color: #ffffff !important;
   }
   .dataTables_wrapper .dataTables_length select{
     background-color: #fff;
   }
   .dataTables_wrapper .dataTables_filter input{
     background-color: #fff;
   }
 </style>
</head>
<body>


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      


        <div class="container mx-auto">
          <div class="row ">
            <div class="col-sm-10 mx-auto">
            <div class="home-tab">
                  
                <div class="container col-sm-12">

                    <div class="logo mx-auto">
                        <div class="container text-center d-flex justify-content-between mt-3">
                            <div class="col-5 col-md-3">
                                <img src="{{asset('default_images/prakhar_logo.png')}}" class="img-fluid" style="max-height: 110px;" alt="logo">
                            </div>
                            <div class="col-5 col-md-3 mt-3">
                                <img src="{{asset('default_images/naukriyan_logo.png')}}" class="img-fluid" style="max-height: 79px;" alt="logo">
                            </div>
                        </div>
                    </div>
              
                    <h3 class="text-center mt-5" >FEEDBACK</h3><br>
                    <form action="{{ route('post-feedback') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mx-3 ">  
                          @if (session('alert_success'))
                              <h6 class="alert alert-success">Thank you!</br></br>{{ session('alert_success') }}</h6>
                          @endif 
                          @if ($errors->any())
                            <div class="alert alert-danger mt-2 mx-1">{{ $errors->first() }}</div>
                          @endif     
                        </div>                  
                        <div class="row">   
                        <span style="font-size: 14px;font-weight: 600;color: #ee1201;">* Mandatory(required) Fields</span>
                            <div class="col-md-12">
                                <label for="" class="m-2 fw-bold">Name <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label>
                                <input name ="name" type="text" class="form-control" placeholder="Enter Name" required >
                            </div>
                            <div class="col-md-12">
                              <label for="" class="m-2 fw-bold">Email <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                              <input type="email" class="form-control" name="email" id="" placeholder="Enter Email" required>
                            </div>  
                            <div class="col-md-12">
                              <label for="" class="m-2 fw-bold">Contact <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                              <input type="text" class="form-control number_validation" maxlength="10" name="contact" id="" placeholder="Enter Contact" required>
                            </div> 
                              
                        </div>       
                        <div class="row">
                          <div class="col-md-12">
                            <label for="" class="m-2 fw-bold">Remark <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                            <textarea name="remark" class="form-control" placeholder="Enter you valuable remark" required></textarea>
                          </div>
 
                          <div class="col-md-12 mb-3">
                            <label for="" class="m-2 fw-bold">Rating <span style="font-size: 14px;font-weight: 600;color: #ee1201;">*</span></label><br>
                            <div class="form-group row">
                               <div class="col">
                                  <div class="rate">
                                     <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                     <label for="star5" title="5 stars">5 stars</label>
                                     <input type="radio" id="star4" class="rate" name="rating" value="4"/>
                                     <label for="star4" title="4 stars">4 stars</label>
                                     <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                     <label for="star3" title="3 stars">3 stars</label>
                                     <input type="radio" id="star2" class="rate" name="rating" value="2">
                                     <label for="star2" title="2 stars">2 stars</label>
                                     <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                     <label for="star1" title="1 star">1 star</label>
                                  </div>
                               </div>
                            </div>
                          </div>
                        </div><br>
                        
                    
                        {{-- <div class="row">
                            <span class="fw-bold"><input type="checkbox" id="checkbox" name="checkbox" required > <span style="font-size: 14px;font-weight: 600;color: #ee1201;">**</span> I here by declare that the information provided is true and correct.</span><br>                
                        </div><br>
                            <br> --}}
                        <button type="submit" id="submit" class="text-light btn btn-success btn-icon-text" id="reg_submit">
                                    <i class="fa fa-arrow-circle-right fa-lg"></i>
                                    &nbsp;Submit
                            </button>
                    </form>
                </div> 
            </div>


         
        
      
        <footer class="footer d-print-none mt-5">
          <div class=" d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © {{ date('Y') }} <a href="">{{ env('APP_NAME') }}</a> All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
</div>
</div>
      <div id="loading">
        <img id="loading-image" src="{{ asset('images/processing.gif') }}" alt="Loading..."/>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

             
            $(document).ready(function () {

                   

                    $('.number_validation').on('keyup', function () {
                        if (/\D/g.test(this.value))
                        this.value = this.value.replace(/\D/g,'')
                    });    
                    
                    // $('#checkbox').on('click', function () {
                    //     if($('#checkbox').prop("checked")){
                    //         $('#submit').prop('disabled', false);
                    //     } else{
                    //         $('#submit').prop('disabled', true);
                    //     }
                    // });  

                    // $('#state_id').on('change', function () {
                    //     var idState = this.value;
                    //     // alert(idState);
                    //     $("#district_id").html('');
                    //     $.ajax({
                    //         url: "{{url('fetch_district')}}",
                    //         type: "POST",
                    //         data: {
                    //             state_id: idState,
                    //             _token: '{{csrf_token()}}'
                    //         },
                    //         dataType: 'json',
                    //         success: function (result) {
                    //             $('#district_id').html('<option value="">Select District</option>');
                    //             $.each(result, function (key, value) {
                    //                 $("#district_id").append('<option value="' + value
                    //                     .id + '">' + value.district_name + '</option>');
                    //             });
                    //         }
                    //     });
                    // });
               
            });
        </script>

      <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("form").on("submit", function(){
    $("#loading").show();
  });
  $(window).on('load', function() {
    $('#loading').hide();
  })
  </script>

