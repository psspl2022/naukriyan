<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;
use App\Jobseeker;
use App\Jobmanager;
use App\ApplyJob;
use App\Follower;
use App\Empcompaniesdetail;
use App\PackageSubscription;
use App\SavedJob;
use App\JsResume;
use App\SelfRegister;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use App\ConsolidateData;
use App\Tracker;
use DB;

class AdminDashboardController extends Controller
{
    
    public function countDataAdmin()
    {

        $data['today_jobseeker'] = Jobseeker::whereDate('created_at', Carbon::today())
            ->count();

        $data['today_employer'] = AllUser::whereDate('created_at', Carbon::today())
            ->count();

        $data['today_job_posted'] = Jobmanager::whereDate('created_at', Carbon::today())
            ->count();

        $data['today_resume_uploaded'] = JsResume::whereDate('created_at', Carbon::today())
            ->count();

        $data['total_companies'] = Empcompaniesdetail::select('id')
            ->count();

        $data['total_jobseeker'] = Jobseeker::select('id')
            ->count();

        $data['total_employer'] = AllUser::select('id')
            ->count();

        $data['today_application'] = ApplyJob::whereDate('created_at', Carbon::today())
            ->count();

        $data['total_active_jobs'] = Jobmanager::select('id')
            ->where('status', 'Active')
            ->count();
        $data['consolidateData']=ConsolidateData::select('id')
        ->count();
        
        $data['tracker']=Tracker::select('id')
        ->count();
        
        $data['total_application']=ApplyJob::select('id')
        ->count();

        $data['total_video_resume']= DB::table('apply_jobs')
        ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'apply_jobs.jsuser_id')
        ->where('js_resumes.resume_video_link', '<>', null)
        ->count();

        $data['total_online_registration']=SelfRegister::select('id')
        ->count();

        return response()->json(['data' => $data], 200);
    }
}
