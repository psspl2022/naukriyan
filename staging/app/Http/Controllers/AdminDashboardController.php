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
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

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

        return response()->json(['data' => $data], 200);
    }
}
