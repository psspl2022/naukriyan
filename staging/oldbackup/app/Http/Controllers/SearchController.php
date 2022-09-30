<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use App\Jobnotice;
use App\Jobs;
use App\Designation;
use App\Joblocation;
use App\Joborganisation;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function joblist()
    {
        $data = DB::table('jobs')
            ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
            ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
            ->leftjoin('recruiters', 'recruiters.id', '=', 'jobs.recruiter_id')
            ->leftjoin('jobtypes', 'jobtypes.id', '=', 'jobs.job_type_id')
            ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
            ->leftjoin('joborganisations', 'joborganisations.id', '=', 'jobs.org_id')
            ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'jobs.location_id', 'joblocations.joblocation', 'joborganisations.organisation', 'designations.designation', 'jobtypes.jobtype', 'recruiters.recruiter', 'advertisements.advertisement_no')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function jobdesc($id)
    {
        $data = DB::table('jobs')
            ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
            ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
            ->leftjoin('recruiters', 'recruiters.id', '=', 'jobs.recruiter_id')
            ->leftjoin('jobtypes', 'jobtypes.id', '=', 'jobs.job_type_id')
            ->leftjoin('jobattachments', 'jobattachments.id', '=', 'jobs.id')
            ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
            ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'joblocations.joblocation', 'designations.designation', 'jobtypes.jobtype', 'recruiters.recruiter', 'advertisements.advertisement_no', 'jobattachments.attachment')
            ->where('jobs.id', $id)
            ->first();

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function jobnotice($id)
    {
        $data = DB::table('jobnotices')
            ->select('jobnotices.notice_heading', 'jobnotices.notice_attachment')
            ->where('jobnotices.adv_id', $id)
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function jobView()
    {
        $data = DB::table('jobs')
            ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
            ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
            ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
            ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'jobs.location_id', 'joblocations.joblocation', 'joblocations.joblocation', 'designations.designation', 'advertisements.advertisement_no')
            ->limit('20')
            ->orderBy('jobs.id', 'DESC')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function jobNoticeView()
    {
        $data = DB::table('jobnotices')
            ->select('jobnotices.adv_id', 'jobnotices.notice_heading', 'jobnotices.notice_attachment')
            ->limit('10')
            ->orderBy('jobnotices.id', 'DESC')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function searchpost()
    {
        $search = \Request::get('s');
        if ($search != null) {
            $data = DB::table('jobs')
                ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
                ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
                ->leftjoin('recruiters', 'recruiters.id', '=', 'jobs.recruiter_id')
                ->leftjoin('jobtypes', 'jobtypes.id', '=', 'jobs.job_type_id')
                ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
                ->leftjoin('joborganisations', 'joborganisations.id', '=', 'jobs.org_id')
                ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'jobs.location_id', 'joblocations.joblocation', 'joborganisations.organisation', 'designations.designation', 'jobtypes.jobtype', 'recruiters.recruiter', 'advertisements.advertisement_no')
                ->where('jobs.location_id', 'LIKE', "%$search%")
                //->orWhere('description','LIKE',"%$search%")
                ->get();
            return response()->json(['data' => $data], 200);
        } else {
            return $this->joblist();
        }
    }

    public function searchclosingdate()
    {
        $search = \Request::get('s');
        if ($search != null) {
            $data = DB::table('jobs')
                ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
                ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
                ->leftjoin('recruiters', 'recruiters.id', '=', 'jobs.recruiter_id')
                ->leftjoin('jobtypes', 'jobtypes.id', '=', 'jobs.job_type_id')
                ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
                ->leftjoin('joborganisations', 'joborganisations.id', '=', 'jobs.org_id')
                ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'jobs.location_id', 'joblocations.joblocation', 'joborganisations.organisation', 'designations.designation', 'jobtypes.jobtype', 'recruiters.recruiter', 'advertisements.advertisement_no')
                ->where('jobs.closing_date', '<=', $search)
                //->orWhere('description','LIKE',"%$search%")
                ->get();
            return response()->json(['data' => $data], 200);
        } else {
            return $this->joblist();
        }
    }

    public function searchorg()
    {
        $search = \Request::get('s');
        if ($search != null) {
            $data = DB::table('jobs')
                ->leftjoin('advertisements', 'advertisements.id', '=', 'jobs.adv_id')
                ->leftjoin('designations', 'designations.id', '=', 'jobs.designation_id')
                ->leftjoin('recruiters', 'recruiters.id', '=', 'jobs.recruiter_id')
                ->leftjoin('jobtypes', 'jobtypes.id', '=', 'jobs.job_type_id')
                ->leftjoin('joblocations', 'joblocations.id', '=', 'jobs.location_id')
                ->leftjoin('joborganisations', 'joborganisations.id', '=', 'jobs.org_id')
                ->select('jobs.id', 'jobs.no_of_vacancy', 'jobs.description', 'jobs.opening_date', 'jobs.closing_date', 'jobs.location_id', 'joblocations.joblocation', 'joborganisations.organisation', 'designations.designation', 'jobtypes.jobtype', 'recruiters.recruiter', 'advertisements.advertisement_no')
                ->where('jobs.org_id', 'LIKE', "%$search%")
                //->orWhere('description','LIKE',"%$search%")
                ->get();
            return response()->json(['data' => $data], 200);
        } else {
            return $this->joblist();
        }
    }

    public function location()
    {
        $data = Joblocation::all();
        return response()->json(['data' => $data], 200);
    }

    public function organisation()
    {
        $data = Joborganisation::all();
        return response()->json(['data' => $data], 200);
    }

}
