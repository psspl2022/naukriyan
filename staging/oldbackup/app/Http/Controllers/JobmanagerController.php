<?php

namespace App\Http\Controllers;

use App\AllUser;
use App\JobSector;
use App\Mail\InterviewScheduled;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobmanager;
use App\ApplyJob;
use App\EmployerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\Activejobmanager;
use App\Mail\Deactivejobmanager;
use App\Mail\Updatejobmanager;
use App\Notification;
use App\Jobseeker;
use Illuminate\Support\Facades\Redirect;

class JobmanagerController extends Controller
{
    public function index()
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
            ->select('jobmanagers.*', 'empcompaniesdetails.company_name')
            ->get();
        // $data = Jobmanager::all();
        return response()->json(['data' => $data], 200);
    }

    public function count_applyjob($id)
    {
        $data = ApplyJob::where('job_id', $id)->count();
        return response($data);
    }

    public function count_interview($id)
    {
        $data = ApplyJob::where('job_id', $id)->where('status', '2')->count();
        return response($data);
    }

    public function count_shortlist($id)
    {
        $data = ApplyJob::where('job_id', $id)->where('status', '3')->count();
        return response($data);
    }

    public function count_offer($id)
    {
        $data = ApplyJob::where('job_id', $id)->where('status', '5')->count();
        return response($data);
    }

    public function count_save($id)
    {
        $data = ApplyJob::where('job_id', $id)->where('status', '7')->count();
        return response($data);
    }

    public function sharejob($id)
    {
        return Redirect::to('/#/edit-viewjobs/' . $id);
    }

    public function jobapplication($id)
    {
        $uid = Session::get('user')['id'];
        $jid = $id;
        $data = DB::table('apply_jobs')
            ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'apply_jobs.jsuser_id')
            ->where('apply_jobs.job_id', $jid)
            ->where('jobmanagers.userid', $uid)
            ->select('apply_jobs.*', 'jobmanagers.title as applied_for', 'js_resumes.resume', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.email', 'jobseekers.contact', 'jobseekers.designation', 'jobseekers.expected_salary', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.current_salary', 'jobseekers.expected_salary', 'jobseekers.notice_period', 'jobseekers.preferred_location')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function getScheduledInterviewLists()
    {
        $uid = Session::get('user')['id'];
        $data = DB::table('apply_jobs')
            ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
            ->where('jobmanagers.userid', $uid)
            ->where('apply_jobs.status', '2')
            ->select('apply_jobs.*', 'jobmanagers.title as applied_for', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.email', 'jobseekers.contact', 'jobseekers.designation', 'jobseekers.expected_salary', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.current_salary', 'jobseekers.expected_salary', 'jobseekers.notice_period', 'jobseekers.preferred_location')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function interview_scheduled(Request $request)
    {
        $id = intval($request->id);
        $interview_date = $request->interview_schedule_date;
        $interview_info = $request->interview_info;

        $data = ApplyJob::find($id);
        $data->status = '2';
        $afterinterview = $data->save();

        if ($afterinterview) {
            $data1 = DB::table('apply_jobs')
                ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
                ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
                ->select('apply_jobs.*', 'jobseekers.fname', 'jobseekers.contact', 'jobseekers.email', 'jobmanagers.title')
                ->where('apply_jobs.id', $id)
                ->get();

            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $data1;
            $notification->status = 2;
            $notification->save();

            //send mail
            //for candidate
            $getDetails = DB::table('apply_jobs')
                ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
                ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
                ->select('apply_jobs.application_id', 'jobseekers.fname', 'jobseekers.email', 'jobmanagers.title')
                ->where('apply_jobs.id', $id)
                ->first();

            //for employer
            $emp_id = Session::get('user')['id'];
            $getempDetail = DB::table('all_users')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
                ->select(
                    'all_users.fname',
                    'all_users.lname',
                    'all_users.email',
                    'all_users.contact',
                    'all_users.designation',
                    'empcompaniesdetails.company_name',
                    'empcompaniesdetails.company_logo',
                    'empcompaniesdetails.com_email',
                    'empcompaniesdetails.com_contact',
                    'empcompaniesdetails.address',
                    'empcompaniesdetails.website'
                )
                ->where('all_users.id', $emp_id)
                ->first();


            $data = [
                'jsname' => $getDetails->fname,
                'jobtitle' => $getDetails->title,
                'jsemail' => $getDetails->email,
                'empfname' => $getempDetail->fname,
                'emplname' => $getempDetail->lname,
                'empemail' => $getempDetail->email,
                'empdesignation' => $getempDetail->designation,
                'empcontact' => $getempDetail->contact,
                'companyname' => $getempDetail->company_name,
                'companylogo' => $getempDetail->company_logo,
                'companyemail' => $getempDetail->com_email,
                'companycontact' => $getempDetail->com_contact,
                'companyaddress' => $getempDetail->address,
                'companywebsite' => $getempDetail->website,
                'jsapplicationid' => $getDetails->application_id,
                'interview_date' => $interview_date,
                'interview_info' => $interview_info
            ];

            $email = $getDetails->email;
            Mail::send('SendMail.interview-scheduled', ['jsdata' => $data], function ($message) use ($email) {
                $message->to($email)
                    ->subject("Interview Scheduled");
                //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
                $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
            });
        }
        return response()->json(['data' => $data1], 200);
    }

    public function shortlist($id)
    {
        $data = ApplyJob::find($id);
        $data->status = '3';
        $afterShortlist = $data->save();

        if ($afterShortlist) {
            $jsonData = DB::table('apply_jobs')
                ->join('jobmanagers', 'jobmanagers.id', 'apply_jobs.job_id')
                ->where('apply_jobs.id', $id)
                ->select('apply_jobs.*', 'jobmanagers.title')
                ->get();

            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $jsonData;
            $notification->status = 3;
            $notification->save();
            //send mail

            //for candidate
            $getDetails = DB::table('apply_jobs')
                ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
                ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
                ->select('apply_jobs.application_id', 'jobseekers.fname', 'jobseekers.email', 'jobmanagers.title')
                ->where('apply_jobs.id', $id)
                ->first();
            //for employer
            $emp_id = Session::get('user')['id'];
            $getempDetail = DB::table('all_users')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
                ->select(
                    'all_users.fname',
                    'all_users.lname',
                    'all_users.email',
                    'all_users.contact',
                    'all_users.designation',
                    'empcompaniesdetails.company_name',
                    'empcompaniesdetails.company_logo',
                    'empcompaniesdetails.com_email',
                    'empcompaniesdetails.com_contact',
                    'empcompaniesdetails.address',
                    'empcompaniesdetails.website'
                )
                ->where('all_users.id', $emp_id)
                ->first();


            $data = [
                'jsname' => $getDetails->fname,
                'jobtitle' => $getDetails->title,
                'jsemail' => $getDetails->email,
                'empfname' => $getempDetail->fname,
                'emplname' => $getempDetail->lname,
                'empemail' => $getempDetail->email,
                'empdesignation' => $getempDetail->designation,
                'empcontact' => $getempDetail->contact,
                'companyname' => $getempDetail->company_name,
                'companylogo' => $getempDetail->company_logo,
                'companyemail' => $getempDetail->com_email,
                'companycontact' => $getempDetail->com_contact,
                'companyaddress' => $getempDetail->address,
                'companywebsite' => $getempDetail->website
            ];
            $email = $getDetails->email;
            Mail::send('SendMail.shortlist', ['jsdata' => $data], function ($message) use ($email) {
                $message->to($email)
                    ->subject("Shortlisted");
                //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
                $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
            });
        }
    }

    public function reject($id)
    {
        $data = ApplyJob::find($id);
        $data->status = '4';
        $afterReject = $data->save();

        if ($afterReject) {
            $jsonData = DB::table('apply_jobs')
                ->join('jobmanagers', 'jobmanagers.id', 'apply_jobs.job_id')
                ->where('apply_jobs.id', $id)
                ->select('apply_jobs.*', 'jobmanagers.title')
                ->get();
            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $jsonData;
            $notification->status = 4;
            $notification->save();
            //send mail
            //for candidate
            $getDetails = DB::table('apply_jobs')
                ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
                ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
                ->select('apply_jobs.application_id', 'jobseekers.fname', 'jobseekers.email', 'jobmanagers.title')
                ->where('apply_jobs.id', $id)
                ->first();
            //for employer
            $emp_id = Session::get('user')['id'];
            $getempDetail = DB::table('all_users')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
                ->select(
                    'all_users.fname',
                    'all_users.lname',
                    'all_users.email',
                    'all_users.contact',
                    'all_users.designation',
                    'empcompaniesdetails.company_name',
                    'empcompaniesdetails.company_logo',
                    'empcompaniesdetails.com_email',
                    'empcompaniesdetails.com_contact',
                    'empcompaniesdetails.address',
                    'empcompaniesdetails.website'
                )
                ->where('all_users.id', $emp_id)
                ->first();


            $data = [
                'jsname' => $getDetails->fname,
                'jobtitle' => $getDetails->title,
                'jsemail' => $getDetails->email,
                'empfname' => $getempDetail->fname,
                'emplname' => $getempDetail->lname,
                'empemail' => $getempDetail->email,
                'empdesignation' => $getempDetail->designation,
                'empcontact' => $getempDetail->contact,
                'companyname' => $getempDetail->company_name,
                'companylogo' => $getempDetail->company_logo,
                'companyemail' => $getempDetail->com_email,
                'companycontact' => $getempDetail->com_contact,
                'companyaddress' => $getempDetail->address,
                'companywebsite' => $getempDetail->website
            ];
            $email = $getDetails->email;
            Mail::send('SendMail.rejected', ['jsdata' => $data], function ($message) use ($email) {
                $message->to($email)
                    ->subject("Rejected");
                //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
                $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
            });
        }
    }

    public function offer($id)
    {
        $data = ApplyJob::find($id);
        $data->status = '5';
        $afterOffer = $data->save();

        if ($afterOffer) {
            $jsonData = DB::table('apply_jobs')
                ->join('jobmanagers', 'jobmanagers.id', 'apply_jobs.job_id')
                ->where('apply_jobs.id', $id)
                ->select('apply_jobs.*', 'jobmanagers.title')
                ->get();
            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $jsonData;
            $notification->status = 5;
            $notification->save();
            //send mail
            //for candidate
            $getDetails = DB::table('apply_jobs')
                ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
                ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
                ->select('apply_jobs.application_id', 'jobseekers.fname', 'jobseekers.email', 'jobmanagers.title')
                ->where('apply_jobs.id', $id)
                ->first();
            //for employer
            $emp_id = Session::get('user')['id'];
            $getempDetail = DB::table('all_users')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
                ->select(
                    'all_users.fname',
                    'all_users.lname',
                    'all_users.email',
                    'all_users.contact',
                    'all_users.designation',
                    'empcompaniesdetails.company_name',
                    'empcompaniesdetails.company_logo',
                    'empcompaniesdetails.com_email',
                    'empcompaniesdetails.com_contact',
                    'empcompaniesdetails.address',
                    'empcompaniesdetails.website'
                )
                ->where('all_users.id', $emp_id)
                ->first();


            $data = [
                'jsname' => $getDetails->fname,
                'jobtitle' => $getDetails->title,
                'jsemail' => $getDetails->email,
                'empfname' => $getempDetail->fname,
                'emplname' => $getempDetail->lname,
                'empemail' => $getempDetail->email,
                'empdesignation' => $getempDetail->designation,
                'empcontact' => $getempDetail->contact,
                'companyname' => $getempDetail->company_name,
                'companylogo' => $getempDetail->company_logo,
                'companyemail' => $getempDetail->com_email,
                'companycontact' => $getempDetail->com_contact,
                'companyaddress' => $getempDetail->address,
                'companywebsite' => $getempDetail->website
            ];
            $email = $getDetails->email;
            Mail::send('SendMail.offer-letter', ['jsdata' => $data], function ($message) use ($email) {
                $message->to($email)
                    ->subject("Offer Letter");
                //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
                $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
            });
        }
    }

    public function hire($id)
    {
        $data = ApplyJob::find($id);
        $data->status = '6';
        $afterHire = $data->save();

        if ($afterHire) {
            $jsonData = DB::table('apply_jobs')
                ->join('jobmanagers', 'jobmanagers.id', 'apply_jobs.job_id')
                ->where('apply_jobs.id', $id)
                ->select('apply_jobs.*', 'jobmanagers.title')
                ->get();
            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $jsonData;
            $notification->status = 6;
            $notification->save();
        }
    }

    public function save($id)
    {
        $data = ApplyJob::find($id);
        $data->status = '7';
        $afterSave = $data->save();

        if ($afterSave) {
            $jsonData = DB::table('apply_jobs')
                ->join('jobmanagers', 'jobmanagers.id', 'apply_jobs.job_id')
                ->where('apply_jobs.id', $id)
                ->select('apply_jobs.*', 'jobmanagers.title')
                ->get();
            $notification = new Notification();
            $notification->jobseeker_id = $data->jsuser_id;
            $notification->data = $jsonData;
            $notification->status = 7;
            $notification->save();
        }
    }

    public function userNotifications()
    {
        $uid = Session::get('user')['id'];

        $notification = Jobseeker::with(['notifications' => function ($query) {
            $query->take(3)->latest();
        }])->select('id')->where('id', $uid)->first();

        return response()->json(['data' => $notification], 200);
    }

    public function sessionuser()
    {
        $uid = Session::get('user')['id'];
        $data = DB::table('jobmanagers')
            ->leftjoin('job_categories', 'job_categories.id', 'jobmanagers.job_category_id')
            ->select('jobmanagers.id', 'jobmanagers.title', 'jobmanagers.status', 'jobmanagers.last_apply_date', 'job_categories.job_category')
            ->where('jobmanagers.userid', $uid)
            ->orderBy('jobmanagers.created_at', 'DESC')
            ->paginate(12);

        return response()->json(['data' => $data], 200);
    }

    public function browsejob(Request $request)
    {
        $searchTerm = $request->q;

        if (isset($searchTerm) && $searchTerm != '') {
            $data = DB::table('jobmanagers')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
                ->leftjoin('industries', 'industries.id', '=', 'jobmanagers.job_industry_id')
                ->where('jobmanagers.title', 'like', "%$searchTerm%")
                ->where('jobmanagers.job_for', '!=', 'Consultant')
                ->where('jobmanagers.status', 'Active')
                ->where('empcompaniesdetails.status', '1')
                ->orWhere('jobmanagers.responsibility', 'like', "%$searchTerm%")
                ->orWhere('jobmanagers.job_keywords', 'like', "%$searchTerm%")
                ->orWhere('jobmanagers.job_skills', 'like', "%$searchTerm%")
                ->orWhere('jobmanagers.job_preference', 'like', "%$searchTerm%")
                ->orWhere('jobmanagers.job_exp', 'like', "%$searchTerm%")
                ->orWhere('jobmanagers.job_for', 'like', "%$searchTerm%")
                ->select(
                    'jobmanagers.id',
                    'jobmanagers.title',
                    'jobmanagers.job_exp',
                    'jobmanagers.job_skills',
                    'jobmanagers.main_exp',
                    'jobmanagers.max_exp',
                    'empcompaniesdetails.company_name',
                    'jobmanagers.job_industry_id',
                    'industries.category_name'
                )
                ->orderBy('jobmanagers.created_at', 'DESC')
                ->get();
        } else {
            $data = DB::table('jobmanagers')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
                ->leftjoin('industries', 'industries.id', '=', 'jobmanagers.job_industry_id')
                ->select(
                    'jobmanagers.id',
                    'jobmanagers.title',
                    'jobmanagers.job_exp',
                    'jobmanagers.job_skills',
                    'jobmanagers.main_exp',
                    'jobmanagers.max_exp',
                    'empcompaniesdetails.company_name',
                    'jobmanagers.job_industry_id',
                    'industries.category_name'
                )
                ->where('jobmanagers.job_for', '!=', 'Consultant')
                ->where('jobmanagers.status', 'Active')
                ->where('empcompaniesdetails.status', '1')
                ->orderBy('jobmanagers.created_at', 'DESC')
                ->get();
        }

        return response()->json(['data' => $data], 200);
    }

    public function searchjob(Request $request)
    {
        $searchTerm = $request->q;
        $location = $request->l;
        $exp = $request->e;
        $jobtype = $request->j;

        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
            ->leftjoin('industries', 'industries.id', '=', 'jobmanagers.job_industry_id')
            ->select(
                'jobmanagers.id',
                'jobmanagers.status',
                'jobmanagers.title',
                'jobmanagers.job_exp',
                'jobmanagers.job_skills',
                'jobmanagers.main_exp',
                'jobmanagers.max_exp',
                'empcompaniesdetails.company_name',
                'jobmanagers.job_industry_id',
                'industries.category_name'
            )
            ->where('jobmanagers.job_for', '!=', 'Consultant')
            ->where('jobmanagers.status', 'Active')
            ->where('jobmanagers.title', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.responsibility', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.job_keywords', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.job_skills', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.job_preference', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.job_exp', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.job_exp', 'like', "%$location%")
            ->orWhere('jobmanagers.job_for', 'like', "%$searchTerm%")
            ->orWhere('jobmanagers.main_exp', '<=', $exp)
            ->orWhere('jobmanagers.job_type_id', '=', $jobtype)
            ->get();


        return response()->json(['data' => $data], 200);
    }

    public function checkUserApplyJob()
    {
        if (!session()->has('user')) {
            $appliedJobs = ['status' => 'error', 'message' => 'Please login first'];
        } else {
            $userId = Session::get('user')['id'];
            $appliedJobs = ApplyJob::select('job_id')->where('jsuser_id', $userId)->get();
        }

        return response()->json($appliedJobs, 200);
    }

    public function store(Request $request)
    {
        $job = new Jobmanager();
        $uid = Session::get('user')['id'];
        $job->company_id = $request->company_id;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->job_sector_id = $request->job_sector_id;
        $job->is_deleted = $request->is_deleted;
        $job->job_address = $request->job_address;
        $job->job_city_id = $request->job_city_id;
        $job->job_state_id = $request->job_state_id;

        $job->job_posted_type_id = $request->job_posted_type_id;
        $job->last_apply_date = $request->last_apply_date;
        $job->job_questionnarie_id = $request->job_questionnarie_id;
        $job->job_keywords = $request->job_keywords;
        $job->job_benefits_id = $request->job_benefits_id;
        $job->job_skills = $request->job_skills;
        $job->job_preference = $request->job_preference;
        $job->job_shift = $request->job_shift;
        $job->job_role = $request->job_role;
        $job->job_carreer_level = $request->job_carreer_level;
        $job->grad_start_year = $request->grad_start_year;
        $job->grad_end_year = $request->grad_end_year;
        $job->job_vaccancy = $request->job_vaccancy;
        $job->job_qualification = $request->job_qualification;
        $job->job_exp = $request->job_exp;
        $job->sal_disclosed = $request->sal_disclosed;
        $job->offered_sal_min = $request->offered_sal_min;
        $job->offered_sal_max = $request->offered_sal_max;
        $job->job_industry_id = $request->job_industry_id;
        $job->job_functional_role_id = $request->job_functional_role_id;
        $job->job_position = $request->job_position;
        $job->main_exp = $request->main_exp;
        $job->max_exp = $request->max_exp;
        $job->job_ctc = $request->job_ctc;
        $job->job_for = $request->job_for;
        $job->counstraint_payment = $request->counstraint_payment;
        $job->reject_reason = $request->reject_reason;
        $job->userid = $uid;

        //for admin
        $job->add_by = Auth::user()->id;
        //for admin
        $to = Auth::user()->email;
        $name = Auth::user()->name;
        $job_title = Auth::user()->job_title;
        $mobile = Auth::user()->mobile;

        /* if($to!="")
         {
         Mail::to($to)->send(new Addjobmanager($name,$mobile,$job_title));
         }*/

        $job->save();
    }

    public function store_front(Request $request)
    {

        $job = new Jobmanager();
        $uid = Session::get('user')['id'];
        $session_company_id = Session::get('user')['company_id'];
        $members = implode(",", $request->job_benefits_id);
        $job->job_benefits_id = $members;
        $job->title = $request->title;
        $job->job_category_id = $request->job_category_id;
        $job->job_type_id = $request->job_type_id;
        $job->company_id = $session_company_id;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->job_sector_id = $request->job_sector_id;
        $job->is_deleted = $request->is_deleted;
        $job->job_address = $request->job_address;
        $job->job_city_id = $request->job_city_id;
        $job->job_state_id = $request->job_state_id;
        $job->job_posted_type_id = $request->job_posted_type_id;
        $job->last_apply_date = $request->last_apply_date;
        $job->job_questionnarie_id = $request->job_questionnarie_id;
        $job->job_keywords = $request->job_keywords;
        $job->job_skills = $request->job_skills;
        $job->job_preference = $request->job_preference;
        $job->job_shift_id = $request->job_shift_id;
        $job->job_role = $request->job_role;
        $job->job_carreer_level = $request->job_carreer_level;
        $job->grad_start_year = $request->grad_start_year;
        $job->grad_end_year = $request->grad_end_year;
        $job->job_vaccancy = $request->job_vaccancy;
        $job->job_qualification_id = $request->job_qualification_id;
        $job->job_exp = $request->job_exp;
        $job->sal_disclosed = $request->sal_disclosed;
        $job->offered_sal_min = $request->offered_sal_min;
        $job->offered_sal_max = $request->offered_sal_max;
        $job->job_industry_id = $request->job_industry_id;
        $job->job_functional_role_id = $request->job_functional_role_id;
        $job->job_position = $request->job_position;
        $job->main_exp = $request->main_exp;
        $job->max_exp = $request->max_exp;
        $job->job_ctc = $request->job_ctc;
        $job->job_for = $request->job_for;
        $job->counstraint_payment = $request->counstraint_payment;
        $job->reject_reason = $request->reject_reason;
        $job->add_questionnarie = $request->questionnarie_add;
        $job->job_questionnarie_id = $request->questionnarie_name;
        $job->userid = $uid;
        $job->start_apply_date = $request->start_apply_date;
        $job->save();
    }

    public function edit($id)
    {
        $data = Jobmanager::find($id);
        return response()->json(['data' => $data], 200);
    }

    public function update_front(Request $request, $id)
    {
        $job = Jobmanager::find($id);

        $uid = Session::get('user')['id'];
        $session_company_id = Session::get('user')['company_id'];
        $job->title = $request->title;
        $job->job_category_id = $request->job_category_id;
        $job->job_type_id = $request->job_type_id;
        $job->company_id = $session_company_id;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->job_sector_id = $request->job_sector_id;
        $job->is_deleted = $request->is_deleted;
        $job->job_address = $request->job_address;
        $job->job_city_id = $request->job_city_id;
        $job->job_state_id = $request->job_state_id;

        $job->job_posted_type_id = $request->job_posted_type_id;
        $job->expiry_date = $request->expiry_date;
        $job->last_apply_date = $request->last_apply_date;
        $job->job_questionnarie_id = $request->job_questionnarie_id;
        $job->job_keywords = $request->job_keywords;
        $job->job_benefits_id = $request->job_benefits_id;
        $job->job_skills = $request->job_skills;
        $job->job_preference = $request->job_preference;
        $job->job_shift_id = $request->job_shift_id;
        $job->job_role = $request->job_role;
        $job->job_carreer_level = $request->job_carreer_level;
        $job->grad_start_year = $request->grad_start_year;
        $job->grad_end_year = $request->grad_end_year;
        $job->job_vaccancy = $request->job_vaccancy;
        $job->job_qualification_id = $request->job_qualification_id;
        $job->job_exp = $request->job_exp;
        $job->sal_disclosed = $request->sal_disclosed;
        $job->offered_sal_min = $request->offered_sal_min;
        $job->offered_sal_max = $request->offered_sal_max;
        $job->job_industry_id = $request->job_industry_id;
        $job->job_functional_role_id = $request->job_functional_role_id;
        $job->job_position = $request->job_position;
        $job->main_exp = $request->main_exp;
        $job->max_exp = $request->max_exp;
        $job->job_ctc = $request->job_ctc;
        $job->job_for = $request->job_for;
        $job->counstraint_payment = $request->counstraint_payment;
        $job->reject_reason = $request->reject_reason;
        $job->add_questionnarie = $request->add_questionnarie;
        $job->job_questionnarie_id = $request->job_questionnarie_id;
        $job->userid = $uid;
        $job->start_apply_date = $request->start_apply_date;
        $job->save();
    }

    public function update(Request $request, $id)
    {
        $job = Jobmanager::find($id);

        $job->company_id = $request->company_id;
        $job->description = $request->description;
        $job->responsibility = $request->responsibility;
        $job->job_sector_id = $request->job_sector_id;
        $job->is_deleted = $request->is_deleted;
        $job->job_address = $request->job_address;
        $job->job_city_id = $request->job_city_id;
        $job->job_state_id = $request->job_state_id;

        $job->job_posted_type_id = $request->job_posted_type_id;
        $job->expiry_date = $request->expiry_date;
        $job->last_apply_date = $request->last_apply_date;
        $job->job_questionnarie_id = $request->job_questionnarie_id;
        $job->job_keywords = $request->job_keywords;
        $job->job_benefits_id = $request->job_benefits_id;
        $job->job_skills = $request->job_skills;
        $job->job_preference = $request->job_preference;
        $job->job_shift = $request->job_shift;
        $job->job_role = $request->job_role;
        $job->job_carreer_level = $request->job_carreer_level;
        $job->grad_start_year = $request->grad_start_year;
        $job->grad_end_year = $request->grad_end_year;
        $job->job_vaccancy = $request->job_vaccancy;
        $job->job_qualification = $request->job_qualification;
        $job->job_exp = $request->job_exp;
        $job->sal_disclosed = $request->sal_disclosed;
        $job->offered_sal_min = $request->offered_sal_min;
        $job->offered_sal_max = $request->offered_sal_max;
        $job->job_industry_id = $request->job_industry_id;
        $job->job_functional_role_id = $request->job_functional_role_id;
        $job->job_position = $request->job_position;
        $job->main_exp = $request->main_exp;
        $job->max_exp = $request->max_exp;
        $job->job_ctc = $request->job_ctc;
        $job->job_for = $request->job_for;
        $job->counstraint_payment = $request->counstraint_payment;
        $job->reject_reason = $request->reject_reason;

        $job->add_by = Auth::user()->id;
        $job->add_by = Auth::user()->id;
        $to = Auth::user()->email;
        $name = Auth::user()->name;
        $job_title = Auth::user()->job_title;
        $mobile = Auth::user()->mobile;

        // if ($to != "") {
        //     Mail::to($to)->send(new Updatejobmanager($name, $mobile, $job_title));
        // }

        $job->save();
    }

    public function deactive($id)
    {
        $job = Jobmanager::find($id);
        $job->status = "Deactive";

        //send mail
        $to = Auth::user()->email;
        $name = Auth::user()->name;
        $job_title = Auth::user()->job_title;
        $mobile = Auth::user()->mobile;

        // if ($to != "") {
        //     Mail::to($to)->send(new Deactivejobmanager($name, $mobile, $job_title));
        // }

        $job->save();
    }

    public function active($id)
    {
        $job = Jobmanager::find($id);
        $job->status = "Active";
        //send mail
        $to = Auth::user()->email;
        $name = Auth::user()->name;
        $job_title = Auth::user()->job_title;
        $mobile = Auth::user()->mobile;

        // if ($to != "") {
        //     Mail::to($to)->send(new Activejobmanager($name, $mobile, $job_title));
        // }

        $job->save();
    }

    public function destroy($id)
    {
        $job = Jobmanager::find($id);
        $job->delete();
    }

    // FRONT JOBS BY CATEGORIES
    public function getSectors()
    {

        $sectors = DB::table('jobmanagers')
            ->select('jobmanagers.job_sector_id', 'job_sectors.job_sector')
            ->leftjoin('job_sectors', 'job_sectors.id', 'jobmanagers.job_sector_id')
            ->leftjoin('empcompaniesdetails', 'jobmanagers.company_id', 'empcompaniesdetails.id')
            ->distinct()
            ->where('job_sectors.status', '1')
            ->where('empcompaniesdetails.status', '1')
            ->orderBy('job_sectors.job_sector', 'ASC')
            ->get();

        return response()->json(['sectors' => $sectors], 200);
    }

    public function getJobSectors(Request $request)
    {

        $callback = function ($query) {
            $query->select('id', 'title', 'job_sector_id', 'status')->where('status', 'Active');
        };

        $jobs = JobSector::whereHas('jobmanagers', $callback)
            ->with(['jobmanagers' => $callback])
            ->select('id', 'job_sector')->get();

        return response()->json($jobs, 200);
    }

    public function getJobsByCategory(Request $request)
    {
        $id = $request->sector_id;

        $jobs = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'jobmanagers.company_id', 'empcompaniesdetails.id')
            ->leftjoin('job_sectors', 'job_sectors.id', 'jobmanagers.job_sector_id')
            ->select('jobmanagers.id', 'jobmanagers.job_sector_id', 'jobmanagers.last_apply_date', 'jobmanagers.location', 'jobmanagers.job_exp', 'jobmanagers.title', 'jobmanagers.main_exp', 'jobmanagers.max_exp', 'empcompaniesdetails.company_name')
            ->where('jobmanagers.job_sector_id', $id)
            ->where('jobmanagers.job_for', '!=', 'Consultant')
            ->where('job_sectors.status', '1')
            ->where('jobmanagers.status', 'Active')
            ->orderBy('jobmanagers.created_at', 'DESC')
            ->get();

        // $callback = function($query) {
        //     $query->select('id', 'title', 'job_sector_id', 'job_exp', 'main_exp', 'max_exp', 'company_id', 'status')->where('status', 'Active');
        // };

        // $companyCallback = function($query) {
        //     $query->select('id', 'company_name');
        // };

        // $jobs = JobSector::whereHas('jobmanagers', $callback)
        //     ->with(['jobmanagers' => $callback, 'jobmanagers.companies' => $companyCallback])
        //     ->select('id', 'job_sector');

        // if($id && $id !='') {
        //     $jobs->where('id', $id);
        // }

        // $jobs = $jobs->get();

        return response()->json($jobs, 200);
    }

    public function showSingleJob($id)
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'jobmanagers.company_id', 'empcompaniesdetails.id')
            ->leftjoin('career_levels', 'career_levels.id', 'jobmanagers.job_carreer_level')
            ->leftjoin('qualifications', 'qualifications.id', 'jobmanagers.job_qualification_id')
            ->leftjoin('industries', 'industries.id', 'jobmanagers.job_industry_id')
            ->leftjoin('cities', 'cities.id', 'jobmanagers.job_city_id')
            ->leftjoin('states', 'states.id', 'jobmanagers.job_state_id')
            ->leftjoin('job_sectors', 'job_sectors.id', 'jobmanagers.job_sector_id')
            ->select(
                'jobmanagers.id',
                'jobmanagers.qualification_for_gov',
                'jobmanagers.location',
                'jobmanagers.department',
                'jobmanagers.attachment',
                'jobmanagers.company_id',
                'jobmanagers.job_preference',
                'jobmanagers.job_exp',
                'jobmanagers.title',
                'jobmanagers.responsibility',
                'jobmanagers.job_skills',
                'jobmanagers.job_address',
                'jobmanagers.description',
                'jobmanagers.offered_sal_min',
                'jobmanagers.offered_sal_max',
                'jobmanagers.main_exp',
                'jobmanagers.max_exp',
                'empcompaniesdetails.company_name',
                'empcompaniesdetails.com_email',
                'empcompaniesdetails.com_contact',
                'empcompaniesdetails.facebook_url',
                'empcompaniesdetails.twitter_url',
                'empcompaniesdetails.linkedin_url',
                'empcompaniesdetails.about',
                'empcompaniesdetails.website',
                'career_levels.career_level',
                'qualifications.qualification',
                'industries.category_name',
                'jobmanagers.add_questionnarie',
                'cities.cities_name',
                'states.states_name',
                'job_sectors.job_sector',
                'jobmanagers.government_apply_link',
                'jobmanagers.start_apply_date',
                'jobmanagers.last_apply_date'
            )
            ->where('jobmanagers.id', $id)
            ->first();

        return response()->json(['data' => $data], 200);
    }

    public function showjobdetailOnly($id)
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'jobmanagers.company_id', 'empcompaniesdetails.id')
            ->leftjoin('career_levels', 'career_levels.id', 'jobmanagers.job_carreer_level')
            ->leftjoin('qualifications', 'qualifications.id', 'jobmanagers.job_qualification_id')
            ->leftjoin('industries', 'industries.id', 'jobmanagers.job_industry_id')
            ->select('jobmanagers.id', 'jobmanagers.company_id', 'jobmanagers.job_exp', 'jobmanagers.title', 'jobmanagers.job_skills', 'jobmanagers.description', 'jobmanagers.offered_sal_min', 'jobmanagers.add_questionnarie', 'jobmanagers.job_questionnarie_id', 'jobmanagers.offered_sal_max', 'jobmanagers.main_exp', 'jobmanagers.max_exp', 'empcompaniesdetails.company_name', 'empcompaniesdetails.com_email', 'empcompaniesdetails.com_contact', 'career_levels.career_level', 'qualifications.qualification', 'industries.category_name')
            ->where('jobmanagers.id', $id)
            ->first();


        return response()->json(['data' => $data], 200);
    }

    public function showQuestions($id)
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('questionnarie_questions', 'jobmanagers.job_questionnarie_id', 'questionnarie_questions.questionnarie_id')
            ->leftjoin('questions', 'questionnarie_questions.question_id', 'questions.id')
            ->select('questionnarie_questions.*', 'questions.*')
            ->where('jobmanagers.id', $id)
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function deactiveme($id)
    {
        $job = Jobmanager::find($id);
        $job->status = "Deactive";
        $job->save();
    }

    public function activeme($id)
    {
        $job = Jobmanager::find($id);
        $job->status = "Active";
        $job->save();
    }

    public function filterjob(Request $request)
    {

        $searchTerm = $request->q;
        //$arr = explode(",",$searchTerm);
        $parts = explode('**', $searchTerm);
        $size = sizeof($parts);
        $a = explode(",", $parts[5]);
        $se = explode(",", $parts[3]);
        $exp_max = $se[sizeof($se) - 2];
        if (sizeof($a) > 1) {
            $sal_max = $a[sizeof($a) - 1];
            $sal_min = $a[sizeof($a) - 2];
            $data = DB::table('jobmanagers')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
                ->leftjoin('industries', 'industries.id', '=', 'jobmanagers.job_industry_id')
                ->where('jobmanagers.offered_sal_min', '>=', $sal_min)
                ->where('jobmanagers.offered_sal_max', '<=', $sal_max)
                ->orwhere('jobmanagers.status', 'Active')
                ->orWhere('jobmanagers.max_exp', '<=', $exp_max)
                ->orwhereIn('jobmanagers.job_industry_id', explode(",", $parts[0]))
                ->orwhereIn('jobmanagers.job_functional_role_id', explode(",", $parts[1]))
                ->orwhereIn('jobmanagers.job_type_id', explode(",", $parts[2]))
                ->orwhereIn('jobmanagers.job_qualification_id', explode(",", $parts[4]))
                ->select(
                    'jobmanagers.id',
                    'jobmanagers.title',
                    'jobmanagers.job_exp',
                    'jobmanagers.job_skills',
                    'jobmanagers.main_exp',
                    'jobmanagers.max_exp',
                    'empcompaniesdetails.company_name',
                    'jobmanagers.job_industry_id',
                    'industries.category_name'


                )
                ->get();
        } else {
            $data = DB::table('jobmanagers')
                ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
                ->leftjoin('industries', 'industries.id', '=', 'jobmanagers.job_industry_id')
                ->orWhere('jobmanagers.max_exp', '<=', $exp_max)
                ->orwhere('jobmanagers.status', 'Active')
                ->orwhereIn('jobmanagers.job_industry_id', explode(",", $parts[0]))
                ->orwhereIn('jobmanagers.job_functional_role_id', explode(",", $parts[1]))
                ->orwhereIn('jobmanagers.job_type_id', explode(",", $parts[2]))
                ->orwhereIn('jobmanagers.job_qualification_id', explode(",", $parts[4]))
                ->select(
                    'jobmanagers.id',
                    'jobmanagers.title',
                    'jobmanagers.job_exp',
                    'jobmanagers.job_skills',
                    'jobmanagers.main_exp',
                    'jobmanagers.max_exp',
                    'empcompaniesdetails.company_name',
                    'jobmanagers.job_industry_id',
                    'industries.category_name'


                )
                ->get();
        }

        return response()->json(['data' => $data], 200);
    }
    public function filter(Request $request)
    {
        $data = DB::table('jobmanagers')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
            ->select('jobmanagers.*', 'empcompaniesdetails.company_name');

        if (isset($request->company_id) && $request->company_id != '') {
            $data->Where('jobmanagers.company_id', $request->company_id);
        }
        if (isset($request->status) && $request->status != '') {
            $data->Where('jobmanagers.status', $request->status);
        }

        $data = $data->paginate(15);

        return response()->json(['data' => $data], 200);
    }
    public function getAllAppliedCandidateList($id)
    {
        $getApplied = DB::table('apply_jobs')
            ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'apply_jobs.job_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'apply_jobs.jsuser_id')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'apply_jobs.jsuser_id')
            ->where('apply_jobs.job_id', $id)
            ->select('apply_jobs.id', 'apply_jobs.application_id', 'apply_jobs.jsuser_id', 'apply_jobs.job_id', 'apply_jobs.status as rec_status', 'jobmanagers.title as applied_for', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.email', 'jobseekers.contact', 'jobseekers.designation', 'jobseekers.expected_salary', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.current_salary', 'jobseekers.expected_salary', 'jobseekers.notice_period', 'jobseekers.preferred_location', 'js_resumes.*')
            ->get();

        return response()->json(['data' => $getApplied], 200);
    }

    public function saveGovtJob(Request $request)
    {
        $attachment = $request->data['attachment'];

        //        if (!$attachment) {
        //            $fileName = null;
        //        } else {
        //
        //            $extension = explode('/', explode(':', substr($attachment, 0, strpos($attachment, ';')))[1])[1];
        //            $validExtension = ['pdf'];
        //
        //            if (in_array($extension, $validExtension)) {
        //                $base64 = explode(',', $attachment)[1];
        //                $fileName = rand(10000000, 999999999) . "." . $extension;
        //                $path = public_path() . '/govt_jobs/docs/';
        //                if (!file_exists($path)) {
        //                    mkdir($path, 0755, true);
        //                }
        //                $filePath = $path . $fileName;
        //                file_put_contents($filePath, $base64);
        //            } else {
        //                return response()->json(['error' => 'Please upload only pdf file'], 201);
        //            }
        //        }

        $apply_last_date = $request->data['apply_last_date'];
        $apply_starting_date = $request->data['apply_starting_date'];
        $department = $request->data['department'];
        $educational_qualification = $request->data['educational_qualification'];
        $experience = $request->data['experience'];
        $fees = $request->data['fees'];
        $job_description = $request->data['job_description'];
        $job_link = $request->data['job_link'];
        $job_title = $request->data['job_title'];
        $location = $request->data['location'];
        $max_age = $request->data['max_age'];
        $min_age = $request->data['min_age'];
        $total_post = $request->data['total_post'];

        $jobManager = new Jobmanager();
        $jobManager->last_apply_date = $apply_last_date;
        $jobManager->start_apply_date = $apply_starting_date;
        $jobManager->department = $department;
        $jobManager->qualification_for_gov = $educational_qualification;
        $jobManager->attachment = $attachment;
        $jobManager->main_exp = $experience;
        $jobManager->fees = $fees;
        $jobManager->description = $job_description;
        $jobManager->government_apply_link = $job_link;
        $jobManager->title = $job_title;
        $jobManager->location = $location;
        $jobManager->max_age = $max_age;
        $jobManager->min_age = $min_age;
        $jobManager->job_vaccancy = $total_post;
        $jobManager->status = 'Active';
        $jobManager->job_for = 'Jobseeker';
        $jobManager->job_sector_id = 3; // Job Sector ID for Government

        $isStore = $jobManager->save();

        if (!$isStore) {
            return response()->json(['status' => 'error', 'message' => 'Job not created.'], 204);
        }

        return response()->json(['status' => 'success', 'message' => 'Job created successfully.'], 201);
    }

    public function uploadBulkGovtJob(Request $request)
    {
        $imageName = time() . '.' . $request->csvFile->getClientOriginalExtension();

        $request->csvFile->move(public_path('/govt_jobs/csv_file/'), $imageName);

        $counter = 0;
        $totalRecords = 0;

        if (($handle = fopen(public_path('/govt_jobs/csv_file/') . $imageName, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {

                //saving to db logic goes here
                if (!$counter == 0) {
                    $totalRecords = $counter;

                    $requestData = [
                        'title' => $data[0],
                        'department' => $data[1] ? $data[1] : null,
                        'government_apply_link' => $data[2] ? $data[2] : null,
                        'location' => $data[3] ? $data[3] : null,
                        'main_exp' => $data[4] ? $data[4] : null,
                        'min_age' => $data[5] ? $data[5] : null,
                        'max_age' => $data[6] ? $data[6] : null,
                        'job_vaccancy' => $data[7] ?? null,
                        'attachment' => $data[8] ? $data[8] : null,
                        'start_apply_date' => $data[9] ? $data[9] : null,
                        'last_apply_date' => $data[10] ? $data[10] : null,
                        'description' => $data[11] ? $data[11] : null,
                        'status' => 'Active',
                        'job_sector_id' => 3,
                        'job_for' => 'Jobseeker',
                        'fees' => $data[12] ? $data[12] : null,
                        'qualification_for_gov' => $data[13] ? $data[13] : null,
                        'created_at' => Carbon::now(),
                    ];

                    DB::table('jobmanagers')->insert($requestData);
                }

                $counter++;
            }

            fclose($handle);

            unlink(public_path('/govt_jobs/csv_file/') . $imageName);
        }

        return response()->json(['status' => 'success', 'message' => 'You have successfully upload interview result.', 'total record' => $totalRecords], 201);
    }

    public function getGovtJob()
    {
        return Jobmanager::where('job_sector_id', 3)->where('status', 'Active')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function deleteGovtJob(Request $request)
    {
        $id = $request->id;

        $govtJob = Jobmanager::where('id', $id)->first();

        if (!$govtJob) {
            return response()->json(['status' => 'error', 'message' => 'Data not found'], 404);
        }

        $govtJob->update(['status' => 'Deactive']);

        return response()->json(['status' => 'success', 'message' => 'job deleted successfully'], 200);
    }

    public function editGovtJob(Request $request)
    {
        $job_id = $request->id;

        $job = Jobmanager::where('id', $job_id)->first();

        if (!$job) {
            return response()->json(['status' => 'success', 'message' => 'Data not found'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $job], 200);
    }

    public function updateGovtJob(Request $request)
    {
        $id = $request->data['job_id'];
        $job_title = $request->data['job_title'];
        $department = $request->data['department'];
        $job_link = $request->data['job_link'];
        $educational_qualification = $request->data['educational_qualification'];
        $experience = $request->data['experience'];
        $min_age = $request->data['min_age'];
        $max_age = $request->data['max_age'];
        $total_post = $request->data['total_post'];
        $location = $request->data['location'];
        $apply_starting_date = $request->data['apply_starting_date'];
        $apply_last_date = $request->data['apply_last_date'];
        $fees = $request->data['fees'];
        $job_description = $request->data['job_description'];

        $jobManager = Jobmanager::where('id', $id)->first();

        $jobManager->last_apply_date = $apply_last_date;
        $jobManager->start_apply_date = $apply_starting_date;
        $jobManager->department = $department;
        $jobManager->qualification_for_gov = $educational_qualification;
        $jobManager->main_exp = $experience;
        $jobManager->fees = $fees;
        $jobManager->description = $job_description;
        $jobManager->government_apply_link = $job_link;
        $jobManager->title = $job_title;
        $jobManager->location = $location;
        $jobManager->max_age = $max_age;
        $jobManager->min_age = $min_age;
        $jobManager->job_vaccancy = $total_post;

        $isStore = $jobManager->save();

        if (!$isStore) {
            return response()->json(['status' => 'error', 'message' => 'Job not updated.'], 204);
        }

        return response()->json(['status' => 'success', 'message' => 'Job updated successfully.'], 201);
    }

    public function employerNotification()
    {
        $uid = Session::get('user')['id'];

        return DB::table('all_users')
            ->join('employer_notifications', 'employer_notifications.employer_id', 'all_users.id')
            ->join('jobmanagers', 'jobmanagers.id', 'employer_notifications.job_id')
            ->join('jobseekers', 'jobseekers.id', 'employer_notifications.jobseeker_id')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', 'jobseekers.id')
            ->select('employer_notifications.*', 'jobmanagers.title', 'jobseekers.fname as jobseeker_fname', 'jobseekers.lname as jobseeker_lname', 'jobseekers.email', 'jobseekers.contact', 'jobseekers.profile_pic_thumb', 'js_resumes.resume', 'js_resumes.resume_video_link', 'js_resumes.linkedin_resume_link')
            ->where('employer_notifications.employer_id', $uid)
            ->get();
    }

    // PLEASE DO NOT REMOVE IT
    //    public function testingHomepage() {
    //        return JobSector::has('jobmanagers')->with('jobmanagers')->get();
    //    }
}
