<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplyJob;
use App\SavedJob;
use App\Follower;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SavedJobController extends Controller
{

    public function index()
    {
        $uid = Session::get('user')['id'];
        $applyJobID = array();
        $applyJobs = ApplyJob::where('jsuser_id', $uid)->select('job_id')->get();
        foreach ($applyJobs as $applyJob) {
            $applyJobID[] = $applyJob->job_id;
        }

        $saved = DB::table('saved_jobs')
            ->leftjoin('jobmanagers', 'jobmanagers.id', '=', 'saved_jobs.job_id')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'jobmanagers.company_id')
            ->leftjoin('job_types', 'job_types.id', '=', 'jobmanagers.job_type_id')
            ->select('saved_jobs.*', 'empcompaniesdetails.company_name', 'job_types.job_type', 'jobmanagers.*')
            ->where('jsuser_id', $uid)
            ->whereNotIn('job_id', $applyJobID)
            ->orWhere('job_id', 'saved_jobs.id')
            ->orderBy('saved_jobs.created_at', 'DESC')
            ->get();

        return response()->json(['data' => $saved], 200);
    }

    public function store($id)
    {
        $userid = Session::get('user')['id'];
        $savedjob = new SavedJob();
        $savedjob->jsuser_id = Session::get('user')['id'];
        $savedjob->job_id = $id;
        $savedjob->username = Session::get('user')['email'];
        $savedjob->save();
    }

    public function checkUserSavedJob()
    {
        $userId = Session::get('user')['id'];
        $appliedJobs = SavedJob::select('job_id')->where('jsuser_id', $userId)->get();
        return response()->json($appliedJobs, 200);
    }

    public function unfollow($comp_id, $job_id)
    {
        $userid = Session::get('user')['id'];
        $follower = Follower::where('user_id', $userid)->where('job_id', $job_id)->where('employer_id', $comp_id)->delete();
    }

    public function follow($comp_id, $job_id)
    {
        $userid = Session::get('user')['id'];
        $follow = new Follower();
        $follow->user_id = $userid;
        $follow->employer_id = $comp_id;
        $follow->job_id = $job_id;
        $follow->user_type = Session::get('user')['user_type'];
        $followSuccess = $follow->save();
        if ($followSuccess) {
            return response()->json(['success' => 'Company followed successfully'], 200);
        }
        return response()->json(['error' => 'Something went wrong'], 201);
    }

    public function checkfollow()
    {
        $userId = Session::get('user')['id'];
        $follow = Follower::select('id', 'employer_id')->where('user_id', $userId)->get();

        return response()->json($follow, 200);
    }

    public function follow_list()
    {
        $userId = Session::get('user')['id'];

        $followlist = DB::table('followers')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'followers.employer_id')
            ->select('followers.*', 'empcompaniesdetails.*')
            ->where('user_id', $userId)
            ->get();
        //$follow = Follower::select('id','employer_id')->where('user_id', $userId)->get();

        return response()->json([
            'data' => $followlist], 200);
    }

    public function unfollow_companies($job_id, $comp_id)
    {
        $userid = Session::get('user')['id'];

        $follower = Follower::where('user_id', $userid)->where('job_id', $job_id)->where('employer_id', $comp_id)->delete();
    }

    public function follower_list()
    {
        //$userId = Session::get('user')['id'];
        $company_id = Session::get('user')['company_id'];

        $followlist = DB::table('followers')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'followers.employer_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'followers.user_id')
            ->select('followers.*', 'empcompaniesdetails.company_name', 'empcompaniesdetails.com_email', 'empcompaniesdetails.establish_date', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.email', 'jobseekers.aadhar_no', 'jobseekers.contact', 'jobseekers.designation')
            ->where('employer_id', $company_id)
            ->orderBy('followers.created_at', 'DESC')
            ->get();
        //$follow = Follower::select('id','employer_id')->where('user_id', $userId)->get();

        return response()->json([
            'data' => $followlist], 200);
    }
}
