<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;
use App\States;
use App\Cities;
use App\Industry;
use App\Empcompaniesdetail;
use App\FunctionalRole;
use App\Jobseeker;
use Image;
use Hash;
use Auth;
use Session;
use DB;
use Mail;
use App\JsResume;
use App\Mail\AddJobseeker;
use App\Mail\UpdateJobseeker;
use App\Mail\DeactiveJobseeker;
use App\Mail\ActiveJobseeker;
use App\Exports\JobseekerExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Response;

class FrontJobseekerController extends Controller
{
    public function viewjob()
    {
        $companies = Empcompaniesdetail::all();
        $last_company_id = Empcompaniesdetail::all()->last();
        return view('public.Jobseeker.viewjob', compact('companies', 'last_company_id'));
    }

    public function viewjobsingle($id)
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'jobmanagers.company_id', 'empcompaniesdetails.id')
            ->leftjoin('career_levels', 'career_levels.id', 'jobmanagers.job_carreer_level')
            ->leftjoin('qualifications', 'qualifications.id', 'jobmanagers.job_qualification_id')
            ->leftjoin('industries', 'industries.id', 'jobmanagers.job_industry_id')
            ->select('jobmanagers.id', 'jobmanagers.job_exp', 'jobmanagers.title', 'jobmanagers.responsibility', 'jobmanagers.job_skills', 'jobmanagers.description', 'jobmanagers.offered_sal_min', 'jobmanagers.offered_sal_max', 'jobmanagers.main_exp', 'jobmanagers.max_exp', 'empcompaniesdetails.id as company_id', 'empcompaniesdetails.company_name', 'empcompaniesdetails.com_email', 'empcompaniesdetails.com_contact', 'career_levels.career_level', 'qualifications.qualification', 'industries.category_name')
            ->where('jobmanagers.id', $id)
            ->first();
        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request)
    {
       //dd($request->firstname);
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'mobile' => 'required|unique:jobseekers,contact',
            'gender' => 'required',
            'candidate_type' => 'required',
            'email' => 'required|unique:jobseekers,email',
            'resume' => 'required|mimes:pdf|max:1048',
            'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/']
        ],
        [
                'email.required' => 'Email Cannot be empty!',
                'email.unique' => 'Email is already registered.Use different email',
                'mobile.unique' => 'Mobile is already registered.Use different Contact No.!',
                
            ]
        );

        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }

        $jobseeker = new Jobseeker();

        $jobseeker->fname = $request->firstname;
        $jobseeker->lname = $request->lastname;
        $jobseeker->email = $request->email;
        $enc_password = $request->password;
        $jobseeker->password = Hash::make($enc_password);
        $jobseeker->contact = $request->mobile;
        $jobseeker->gender = $request->gender;
        //$jobseeker->user_type = $request->user_type;
        $jobseeker->candidate_type = $request->candidate_type;
        // $jobseeker->designation = $request->designation;
        $jobseeker->industry_id = $request->industry_id;
        $jobseeker->user_type="Jobseeker";

        $email = $request->email;
        $name = $request->firstname;
        $password = Hash::make($enc_password);
        $user_type ="Jobseeker";

        if ($jobseeker->save()) {

        $filename = time().'.'.$request->resume->extension();
        $path=public_path().'/resume/';
        $upload = $request->resume->move($path,$filename);

        $addressData = [
            'js_userid' => $jobseeker->id,
            'resume' => $filename,
        ];

        JsResume::updateOrCreate($addressData);
            $data = [
                'token' => Crypt::encryptString($request->email),
                'emailId' => $email,
                'name' => $name
            ];

            Mail::send(
                'SendMail.email-verification-link-jobseeker',
                ['userData' => $data],
                function ($message) use ($email) {
                    $message->to($email)
                        ->subject("Email Verification Link");
                    $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
                    //$message->from(env('MAIL_USERNAME'), "Naukriyan.com");
                }
            );
        }
        $user_type = "Jobseeker";
        
        if ($user_type == "Jobseeker") {
            $data = DB::table('jobseekers')
                ->where('email', $request->email)
                ->where('user_type', $user_type)
                ->first();

                if (Auth::guard('jobseeker')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

                   
                        if ($data->active == 'Yes') {
    
                            Session::put('user', ['id' => $data->id, 'fname' => $data->fname, 'lname' => $data->lname, 'email' => $data->email, 'user_type' => $data->user_type, 'last_login' => $data->last_login, 'profile_pic_thumb' => $data->profile_pic_thumb]);
                            return response()->json(['data' => $data, 'status' => 'success'], 200);
                        } else {
                            $errors = 'Your account is not activated by admin. Please contact.';
                            //log mail table
                            return response()->json(['error' => $errors, 'status' => 'failed'], 200);
                        }
                     
                }
            }
                else{
                    $errors = 'Username or password is invalid';
                    return response()->json(['error' => $errors, 'status' => 'failed'], 200);
                }
        
        
        return response()->json(['status' => 'success', 'message' => 'Account Created Successfully'], 200);
    }


    public function EmailVerifyJobseeker($token)
    {
        $email = Crypt::decryptString($token);
        $checkEmail = Jobseeker::where('email', $email)->update(['email_verified' => 'Yes']);

        if ($checkEmail) {
            return redirect('/#/Verified');
        }
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $id = Session::get('user')['id'];
        $email = Session::get('user')['email'];
        $currentpassword = $request->old_password;

        $getpassword = Jobseeker::find($id)->password;

        if (Hash::check($currentpassword, $getpassword)) {
            var_dump('password matches and allowed for new password');
            $change = Jobseeker::find($id);
            $change->password = Hash::make($request->confirm_password);
            $change->save();
        } else {
            var_dump('old password is not match');
            return response()->json(['warning' => 'Old Password Not Matched'], 201);
        }

        if ($change) {
            return response()->json(['success' => 'Password Changed'], 200);
        } else {
            return response()->json(['error' => 'Something went wrong'], 200);
        }
    }
}
