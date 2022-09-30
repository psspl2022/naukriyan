<!-- login form start -->
<!-- Modal -->

<div class="modal fade popupForm " id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">log in to Naukriyan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                @if (session('update'))
                    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ session('update') }} </strong>
                    </div>
                @endif
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personalAcc">Login</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#businessAcc">Sign Up</a></li> -->
                </ul>
                <div class="tab-content">
                    <div id="personalAcc" class="tab-pane fade show active">
                        <form method="post" accept-charset="utf-8" action="{{ route('jobseekerlogin') }}" >
                            @csrf
                            <div class="form-group inputBox">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <div class="input text">
                                    <select name="user_type" class="form-control" required="">
                                        <option value="">---Select User type---</option>
                                        <option value="Employer">Employer</option>
                                        <option value="Jobseeker">Jobseeker</option>
                                        <option value="Consultant">Consultant</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group inputBox">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <div class="input text"><input type="text" name="email" class="form-control" placeholder="Enter Email" required="required"  /></div>

                            </div>
                            <div class="form-group inputBox">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <div class="input password"><input type="password" name="password" class="form-control" placeholder="Enter Password" required="required"  /></div>

                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="my-checkbox">
                                        <label class="checkbox-inline" for="remember_me">
                                            <input type="checkbox" class="custom-control-input" id="remember_me">
                                            <span class="checkbox-icon"><i class="fa fa-square-o" aria-hidden="true"></i>
                                                        <span class="check-icon">
                                                            <i class="fa fa-check" aria-hidden="true"></i>
                                                        </span>
                                                    </span> Remember me
                                        </label> </div>
                                    <!-- <router-link :to="`/forget-password`">
                                    <a href="" data-dismiss="modal" class="forgot-link fw-700">Forgot
                                    Password?</a></router-link> -->
                                    <a href="/forget" class="forgot-link fw-700">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="signText text-center">
                    <p class="mb-0 fs-16">Don't have an account? <a href="" data-toggle="modal" data-target="#myModal1" data-dismiss="modal" class="fw-700">Sign up</a>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-muted text-center mb-0 fs-13">By logging in, I agree to Naukriyan <a href="">Terms of Service</a>, <a href="">Cookie Policy </a>,
                    <a href="">Privacy Policy</a> and
                    <a href="">Cancellation</a>.</p>
            </div>
        </div>

    </div>
</div>

<!--  end login -->


<!-- Modal -->
<div class="modal fade popupForm " id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title">Sign up in to Naukriyan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ session('message') }} </strong>
                    </div>
                @endif
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Candidate">Jobseeker</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Employeer">Employer</a></li>

                </ul>
                <div class="tab-content">


                    <div id="Candidate" class="tab-pane fade show active">
                        <form method="post" accept-charset="utf-8"  action="{{ route('jobseekerregister') }}">
                            @csrf

                            <div class="form-group row inputBox">
                                <input type="hidden" name="user_type" value="Jobseeker">
                                <div class="col-sm-6">
                                    <label>First Name<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="fname" class="form-control" placeholder="Enter First Name" required="required"  /></div>

                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required="required"  /></div>

                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Contact No.<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="number" name="contact" id="cand_contact" class="form-control" placeholder="Enter Contact No." required="required"  /></div>
                                    <span id="c_contact_err" style="color: red; font-size: 12px;"></span>

                                </div>
                                <div class="col-sm-6">
                                    <label>Email<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="email" name="email" id="cand_email" onkeyup="check_cand_contact()"  class="form-control" placeholder="Enter Email" required="required"  /></div>
                                    <span id="c_email_err" style="color: red; font-size: 12px;"></span>

                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Password<span style="color: red"> * </span></label>
                                    <div class="input password"><input type="password" name="password" id="cand_password" onkeyup="check_cand_email()" class="form-control" placeholder="Enter Password" required="required" /></div>

                                </div>
                                <div class="col-sm-6">
                                    <label>Select Gender<span style="color: red"> * </span></label>
                                    <div class="input password">
                                        <select name="gender" class="form-control" required="">
                                            <option>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- <div class="col-sm-6">
                                    <label>Designation<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="designation" class="form-control" placeholder="Enter Designation" required="required" /></div>

                                </div> -->

                            </div>
                            <div class="form-group row inputBox">

                                <!-- <div class="col-sm-6">
                                    <label>Aadhar No.</label>
                                    <div class="input text"><input type="text" name="aadhar_no" data-type="adhaar-number" onkeyup="aadhar_pan()" id="aadhar" maxLength="14" class="form-control" placeholder="Enter Adhaar No." min="0" /></div>

                                </div> -->

                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="my-checkbox">
                                        <label class="checkbox-inline" for="remember_me3">
                                            <input type="checkbox" class="custom-control-input" id="remember_me3">
                                            <span class="checkbox-icon"><i class="fa fa-square-o" aria-hidden="true"></i>
                                                    <span class="check-icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </span>
                                                </span>All (<span style="color: red">*</span>) fields are mandatory.
                                        </label> </div>
                                    <!-- <a href=""  class="forgot-link fw-700">Forgot
                                Password?</a> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit"class="btn btn-block btn-lg btn-primary">Signup</button>
                            </div>

                        </form>
                    </div>
                    <div id="Employeer" class="tab-pane fade">
                        <form method="post" accept-charset="utf-8" action="{{ route('employerregister') }}">
                            @csrf
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>First Name<span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="emp_fname" class="form-control" placeholder="Enter First Name" required="required"  /></div>

                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name <span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="emp_lname" class="form-control" placeholder="Enter Last Name" required="required"  /></div>

                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Contact No. <span style="color: red"> * </span></label>
                                    <div class="input text"><input type="number" name="emp_contact" class="form-control" id="emp_contact" placeholder="Enter Contact No." required="required"  /></div>
                                    <span id="e_contact_err" style="color: red; font-size: 12px;"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label>Email <span style="color: red"> * </span></label>
                                    <div class="input text"><input type="email" name="emp_email" class="form-control" id="emp_email" onkeyup="check_emp_contact()" placeholder="Enter Email" required="required"  /></div>
                                    <span id="e_email_err" style="color: red; font-size: 12px;"></span>

                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Password <span style="color: red"> * </span></label>
                                    <div class="input password"><input type="password" name="emp_password" id="emp_password" onkeyup="check_emp_email()" class="form-control" placeholder="Enter Password" required="required"  /></div>


                                </div>
                                <div class="col-sm-6">
                                    <label>Designation <span style="color: red"> * </span></label>
                                    <div class="input text"><input type="text" name="emp_designation" class="form-control" placeholder="Enter Designation" required="required"  /></div>

                                </div>
                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-6">
                                    <label>Select Gender <span style="color: red"> * </span></label>
                                    <div class="input password">
                                        <select name="emp_gender" class="form-control" required>
                                            <option>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <label>Select User <span style="color: red"> * </span></label>
                                    <div class="input password">
                                        <select name="user_type" class="form-control" required>
                                            <option>Select User Type</option>
                                            <option value="Employer">Employer</option>
                                            {{-- <option value="Consultant">Consultant</option> --}}

                                        </select>
                                    </div>

                                </div>
                                <!-- <div class="col-sm-6">
                                     <label>Aadhar No.</label>
                                    <div class="input text"><input type="text" data-type="adhaar-number" onkeyup="aadhar_pan()" id="aadhar" maxLength="14" min="0" name="emp_aadhar" class="form-control" placeholder="Enter Adhaar No." /></div>

                                </div> -->

                            </div>
                            <div class="form-group row inputBox">

                                <div class="col-sm-6">
                                    <label>Select Company <span style="color: red"> * * </span></label>
                                    <div class="input password">
                                        <select name="company_id"  style="width: 100%" id="com_search" class="select-box" onchange="others(this.value);" required>
                                            <option value="">Select Company</option>

                                            @foreach ($companies as $com)
                                                <option value="{{ $com->id }}">{{ $com->company_name }}</option>
                                            @endforeach
                                            <option value="{{$last_company_id->id+1}}">Others</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6" id="other">
                                    <label>Input Company </label>
                                    <div class="input text" >
                                        <input type="text" name="other" class="form-control" placeholder="Enter Company Name(if not in list)" />
                                    </div>

                                </div>

                            </div>



                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="my-checkbox">
                                        <label class="checkbox-inline" for="remember_me2">
                                            <input type="checkbox" class="custom-control-input" id="remember_me2">
                                            <span class="checkbox-icon"><i class="fa fa-square-o" aria-hidden="true"></i>
                                                    <span class="check-icon">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </span>
                                                </span>
                                            All (<span style="color: red">*</span>) fields are mandatory.
                                        </label> </div>
                                    <router-link :to="`/forget-password`">
                                        <a href="" data-dismiss="modal" class="forgot-link fw-700">Forgot
                                            Password?</a></router-link>
                                </div>

                                <div class="d-flex justify-content-between" style="font-family: sans-serif;">
                                    <em> (<span style="color: red">* *</span>)- If Your company name is not in your list then you can input your company name by selecting others options in this list.</em>


                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="signText text-center">
                    <p class="mb-0 fs-16">You have already account? <a href="" data-toggle="modal" data-target="#myModal" data-dismiss="modal" class="fw-700">Login</a>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <p class="text-muted text-center mb-0 fs-13">By logging in, I agree to Naukriyan <a href="">Terms of Service</a>, <a href="">Cookie Policy </a>,
                    <a href="">Privacy Policy</a> and
                    <a href="">Cancellation</a>.</p>
            </div>
        </div>

    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $('#other').hide();
    function others(val){
        if(val=="{{$last_company_id->id+1}}")
        {
            $('#other').show();
        }
        else if(val!=="{{$last_company_id->id+1}}"){

            $('#other').hide();

        }
    }

</script>
<script>
    $('[data-type="adhaar-number"]').keyup(function() {

        var value = $(this).val();

        value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");

        $(this).val(value);

    });
    function check_cand_contact() {
        var x = document.getElementById("cand_contact").value;

        $.ajax({
            url: "/check-cand-contact/"+x,
            type: "get",
            success: function(d) {

                if(d>0)
                {
                    document.getElementById("cand_contact").value="";
                    document.getElementById("c_contact_err").innerHTML="Contact No. already exist !";
                    document.getElementById("cand_contact").focus();

                }
            }
        });
    }

    function check_cand_email() {
        var x = document.getElementById("cand_email").value;

        $.ajax({
            url: "/check-cand-email/"+x,
            type: "get",
            success: function(d) {
                if(d>0)
                {
                    document.getElementById("cand_email").value="";
                    document.getElementById("c_email_err").innerHTML="Email already exist !";
                    document.getElementById("cand_email").focus();

                }
            }
        });
    }
    function check_emp_contact() {
        var x = document.getElementById("emp_contact").value;

        $.ajax({
            url: "/check-emp-contact/"+x,
            type: "get",
            success: function(d) {

                if(d>0)
                {
                    document.getElementById("emp_contact").value="";
                    document.getElementById("e_contact_err").innerHTML="Contact No. already exist !";
                    document.getElementById("emp_contact").focus();

                }
            }
        });
    }

    function check_emp_email() {
        var x = document.getElementById("emp_email").value;

        $.ajax({
            url: "/check-emp-email/"+x,
            type: "get",
            success: function(d) {
                if(d>0)
                {
                    document.getElementById("emp_email").value="";
                    document.getElementById("e_email_err").innerHTML="Email already exist !";
                    document.getElementById("emp_email").focus();

                }
            }
        });
    }
</script>
