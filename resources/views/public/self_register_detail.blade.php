<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Registration Details on Naukriyan.com| Best Job Portal in India | Best Skill Development Course | Best Drone Pilot Course</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
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
              
                    <h3 class="text-center mt-5" >Candidate Registration Details</h3><br>
                        <div class="row mx-3 ">  
                          @if (session('alert_success'))
                              <h6 class="alert alert-success">Thank you!</br></br>{{ session('alert_success') }}</h6>
                          @endif 
                          @if ($errors->any())
                            <div class="alert alert-danger mt-2 mx-1">{{ $errors->first() }}</div>
                          @endif     
                        </div>                  
                        <div class="row">   
                          <span style="font-size: 14px;font-weight: 600;color: #ee1201;">All the Details below</span>
                          <div id="Candidate" class="tab-pane fade show active">
                            <?php dd($self) ?>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Registration Code</label>
                                    <div class="input text" id="can_self_code">{{ $self['self_code'] }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Name</label>
                                    <div class="input text" id="can_name">{{ $self->name }}</div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Email</label>
                                    <div class="input text" id="can_email">{{ $self->email }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Contact No.</label>
                                    <div class="input text" id="can_contact">{{ $self->contact ? $self->contact : 'Not Filled' }}</div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Category</label>
                                    <div class="input text" id="can_category">{{ $self->category }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="margin-bottom:5px;">Gender</label>
                                    <div class="input text" id="can_gender">{{ $self->gender }}</div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Qualification</label>
                                    <div class="input password" id="can_qualification">{{ $self->qualification }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="margin-bottom:5px;">State
                                    </label>
                                    <div class="input text" id="can_state">{{ $self->get_state_name->states_name; }}</div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>District</label>
                                    <div class="input password" id="can_district">{{ $self->get_district_name->district_name; }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="margin-bottom:5px;">City
                                    </label>
                                    <div class="input text" id="can_city">{{ $self->city ? $self->city : 'Not Filled' }}</div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Pincode</label>
                                    <div class="input password" id="can_pincode">{{ $self->pincode ? $self->pincode : 'Not Filled' }}</div>
                                </div>
                                <div class="col-sm-6">
                                    <label style="margin-bottom:5px;">Resume
                                    </label>
                                    <div class="input text" id="can_resume">
                                      @if(!empty($self->resume))
                                        <a href="{{url('self_register/'.$self->resume)}}" target="_blank" class="btn btn-sm btn-primary" style="padding: 2px 16px!important;">View document</a>
                                      @else
                                        <span class="text-danger fw-bold">Document Not Uploaded</span>
                                      @endif 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-12">
                                    <label style="margin-bottom:5px;">Address
                                    </label>
                                    <div class="input text" id="can_address">{{ $self->address ? $self->address : 'Not Filled' }}</div>
                                </div>
                            </div>
                          </div>
                              
                        </div>    
                        
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

                 function districtDropdown(idState){
                    var district_id = {{ $self_data[0]->district}}
                    console.log(district_id);
                    $.ajax({
                            url: "{{url('fetch_district')}}",
                            type: "POST",
                            data: {
                                state_id: idState,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: 'json',
                            success: function (result) {
                                $('#district_id').html('<option value="">Select District</option>');
                                $.each(result, function (key, value) {
                                  if(district_id == value.id){
                                    $("#district_id").append('<option value="' + value
                                        .id + '" selected>' + value.district_name + '</option>');
                                  }
                                  else{
                                    $("#district_id").append('<option value="' + value
                                        .id + '">' + value.district_name + '</option>');
                                  }
                                });
                            }
                        });
                   }

                    $('.number_validation').on('keyup', function () {
                        if (/\D/g.test(this.value))
                        this.value = this.value.replace(/\D/g,'')
                    });    
                    
                    $('#checkbox').on('click', function () {
                        if($('#checkbox').prop("checked")){
                            $('#submit').prop('disabled', false);
                        } else{
                            $('#submit').prop('disabled', true);
                        }
                    });  

                    $('#state_id').on('change', function () {
                        var idState = this.value;
                        $("#district_id").html('');
                        districtDropdown(idState);
                    });

                    $idState = $("#state_id").val();
                    districtDropdown({{ $self_data[0]->state }});

               
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

