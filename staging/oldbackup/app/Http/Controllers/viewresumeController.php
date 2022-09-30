<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Jobmanager;
use App\ApplyJob;
use App\JsResume;
use App\Jobseeker;
use App\Tag;
use App\ResumeTag;
use App\JsCertification;
use App\JsSkill;
use App\JsProfessionalDetail;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\SendMail;

class viewresumeController extends Controller
{

    public function filterResume()
    {
        $uid = Session::get('user')['id'];
        $orderBy = request('');
        $keyword = request('keyword');
        $gender = request('gender');
        $salary = request('salary');
        $location = request('location');
        $functionalArea = request('functional_area');
        $industry = request('industry');
        $experienceYear = request('experience_year');
        $profileUpdate = request('profile_update');
        $designation = request('designation');
       
        $today = Carbon::today();

        $dataFilter = DB::table('jobseekers')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'jobseekers.functionalrole_id')
            ->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.designation', 'jobseekers.preferred_location','jobseekers.current_working_location', 
            'jobseekers.gender', 'jobseekers.industry_id', 'jobseekers.functionalrole_id', 'jobseekers.exp_year', 'jobseekers.exp_month', 
            'jobseekers.expected_salary','jobseekers.current_salary', 'functional_roles.subcategory_name', 'industries.category_name', 'js_resumes.resume', 
            'js_resumes.resume_video_link', 'js_resumes.resume_video_link');

        if (isset($keyword) && $keyword !== '') {
            $dataFilter->where(function ($query) use ($keyword) {
                $query->where('jobseekers.fname', 'like', "%$keyword%")
                    ->orWhere('jobseekers.lname', 'like', "%$keyword%");
            });
        }

        if (isset($gender) && $gender !== '') {
            $dataFilter->where('jobseekers.gender', $gender);
        }

        if (isset($salary) && $salary !== '') {
            $dataFilter->where('jobseekers.expected_salary', '<=', $salary);
        }

        if (isset($location) && $location !== '') {
            $dataFilter->where('jobseekers.preferred_location', $location);
        }

        if (isset($industry) && $industry !== '') {
            $dataFilter->where('jobseekers.industry_id', $industry);
        }

        if (isset($functionalArea) && $functionalArea !== '') {
            $dataFilter->where('jobseekers.functionalrole_id', $functionalArea);
        }

        if (isset($experienceYear) && $experienceYear !== '') {
            $dataFilter->where('jobseekers.exp_year', '<=', $experienceYear);
        }

        if (isset($profileUpdate) && $profileUpdate !== '') {
            $dataFilter->where('jobseekers.updated_at', '>', $today->subDay($profileUpdate));
        }

        if (isset($designation) && $designation !== '') {
            $dataFilter->where('jobseekers.designation', $designation);
        }

        $data = $dataFilter->paginate(100);

        return response()->json(['data' => $data], 200);
    }

    public function index()
    {
        $uid = Session::get('user')['id'];
        $data = DB::table('jobseekers')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'jobseekers.functionalrole_id')
            ->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.designation', 'jobseekers.preferred_location', 'jobseekers.gender', 'jobseekers.industry_id', 'jobseekers.functionalrole_id', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.expected_salary', 'functional_roles.subcategory_name', 'industries.category_name', 'js_resumes.resume', 'js_resumes.resume_video_link', 'js_resumes.resume_video_link')
            ->get();


        return response()->json(['data' => $data], 200);
    }

    public function exportResumes($ids)
    {
        $ids = explode(',', $ids);

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=user-export.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = DB::table('jobseekers')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'jobseekers.functionalrole_id')
            ->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.designation', 'jobseekers.preferred_location', 'jobseekers.gender', 'jobseekers.industry_id', 'jobseekers.functionalrole_id', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.expected_salary', 'functional_roles.subcategory_name', 'industries.category_name', 'js_resumes.resume', 'js_resumes.resume_video_link')
            ->whereIn('jobseekers.id', $ids)
            ->get();

        $list = collect($list)->map(function ($x) {
            return [
                'Name' => $x->fname . ' ' . $x->lname,
                'Gender' => $x->gender,
                'Designation' => $x->designation,
                'Experience' => $x->exp_year,
                'Preferred Location' => $x->preferred_location,
                'Expected Salary' => $x->expected_salary,
                'Resume' => $x->resume ? url('resume/' . $x->resume) : 'Not Available',
                'Video Resume' => $x->resume_video_link ? 'https://www.youtube.com/watch?v=' . $x->resume_video_link : 'Not Available'
            ];
        })->toArray();

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function () use ($list) {
            $FH = fopen('php://output', 'w');
            foreach ($list as $row) {
                fputcsv($FH, $row);
            }
            fclose($FH);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function getresume(Request $request, $keyword, $gender, $designation, $location, $industry, $functionalrole, $experience, $salary, $profile_update)
    {
        //        $name = request('name');
        //        $gender = request('gender');
        //        $salary = request('salary');
        //        $location = request('location');
        //        $functionalArea = request('functional_area');
        //        $industry = request('industry');
        //        $experienceYear = request('experience_year');
        //        $profileUpdate = request('profile_update');
        //        $designation = request('designation');

        //        $dataFilter = DB::table('jobseekers')
        //            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
        //            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'jobseekers.functionalrole_id')
        //            ->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
        //            ->select('jobseekers.id as js_id','jobseekers.fname','jobseekers.designation','jobseekers.preferred_location','jobseekers.gender','jobseekers.industry_id','jobseekers.functionalrole_id','jobseekers.exp_year','jobseekers.expected_salary','functional_roles.subcategory_name','industries.category_name','js_resumes.resume');
        //
        //        if (request()->has('name')) {
        //            $dataFilter->where(function($q) use ($name) {
        //                $q->where('jobseekers.fname', 'LIKE', '%' . $name . '%')
        //                    ->orWhere('jobseekers.fname', 'LIKE', '%' . $name . '%');
        //            });
        //        }
        //        if (request()->has('gender')) {
        //            $dataFilter->where(function($q) use ($gender) {
        //                $q->orWhere('jobseekers.gender', $gender);
        //            });
        //        }
        //        if (request()->has('salary')) {
        //            $dataFilter->where(function($q) use ($salary) {
        //                $q->orWhere('jobseekers.expected_salary', $salary);
        //            });
        //        }
        //        if (request()->has('location')) {
        //            $dataFilter->where(function($q) use ($location) {
        //                $q->orWhere('jobseekers.preferred_location', $location);
        //            });
        //        }
        //        if (request()->has('industry')) {
        //            $dataFilter->where(function($q) use ($industry) {
        //                $q->orWhere('jobseekers.industry_id', $industry);
        //            });
        //        }
        //        if (request()->has('functional_area')) {
        //            $dataFilter->where(function($q) use ($functionalArea) {
        //                $q->orWhere('jobseekers.functionalrole_id', $functionalArea);
        //            });
        //        }
        //        if (request()->has('experience_year')) {
        //            $dataFilter->where(function($q) use ($experienceYear) {
        //                $q->orWhere('jobseekers.exp_year', '=', $experienceYear);
        //            });
        //        }
        //        if (request()->has('profile_update')) {
        //            $dataFilter->orWhere('jobseekers.updated_at', '>', now()->subDays($profileUpdate));
        //        }
        //        if (request()->has('designation')) {
        //            $dataFilter->where(function($q) use ($designation) {
        //                $q->orWhere('jobseekers.designation', $designation);
        //            });
        //        }
        //        $data = $dataFilter->get();

        $today = Carbon::today();

        $data = DB::table('jobseekers')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'jobseekers.functionalrole_id')
            ->leftjoin('industries', 'industries.id', '=', 'jobseekers.industry_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.lname', 'jobseekers.designation', 'jobseekers.preferred_location', 'jobseekers.gender', 'jobseekers.industry_id', 'jobseekers.functionalrole_id', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.expected_salary', 'functional_roles.subcategory_name', 'industries.category_name', 'js_resumes.resume', 'js_resumes.resume_video_link')
            ->orWhere('jobseekers.fname', 'like', "%$keyword%")
            ->orWhere('jobseekers.gender', 'like', "%$keyword%")
            ->orWhere('jobseekers.designation', 'like', "%$keyword%")
            ->orWhere('jobseekers.preferred_location', 'like', "%$keyword%")
            ->orWhere('jobseekers.email', 'like', "%$keyword%")
            ->orWhere('jobseekers.contact', 'like', "%$keyword%")
            ->orWhere('jobseekers.gender', $gender)
            ->orWhere('jobseekers.designation', $designation)
            ->orWhere('jobseekers.updated_at', '>', $today->subDay($profile_update))
            ->orWhere('jobseekers.preferred_location', $location)
            ->orWhere('jobseekers.industry_id', $industry)
            ->orWhere('jobseekers.functionalrole_id', $functionalrole)
            ->orWhere('jobseekers.exp_year', '<=', $experience)
            ->orWhere('jobseekers.expected_salary', '<=', $salary)
            ->get();


        return response()->json(['data' => $data], 200);
    }

    public function gettag()
    {
        $data = Tag::all();
        return response()->json(['data' => $data], 200);
    }

    public function add_resume_tag(Request $request)
    {
        $tag_id = $request->tag_id;
        $uid = Session::get('user')['id'];
        $candidate_arr = $request->jobseeker_id;
        foreach ($candidate_arr as $key => $value) {
            $tagResumes[] = array(
                'user_id' => $uid,
                'tag_id' => $tag_id,
                'candidate_id' => $value
            );
        }

        foreach ($tagResumes as $resume) {
            $resumeTag = ResumeTag::create($resume);
        }

        if (!$resumeTag) {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 406);
        }

        return response()->json(['status' => 'success', 'message' => 'Resume grouped in tag.'], 201);
    }

    public function add_new_tag(Request $request)
    {
        $tag = $request->tag;
        $uid = Session::get('user')['id'];
        $tg = new Tag();
        $tg->tag = $tag;
        $tg->user_id = $uid;
        $tagCreate = $tg->save();

        if (!$tagCreate) {
            return response()->json(['status' => 'error', 'message' => 'Tag Not Created'], 406);
        }

        return response()->json(['status' => 'success', 'message' => 'Tag Created'], 201);
    }

    public function tagresume()
    {
        $uid = Session::get('user')['id'];
        $data = DB::table('resume_tags')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'resume_tags.candidate_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'resume_tags.candidate_id')
            ->leftjoin('tags', 'tags.id', '=', 'resume_tags.tag_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.designation', 'js_resumes.resume_video_link', 'jobseekers.preferred_location', 'jobseekers.gender', 'js_resumes.resume', 'tags.tag')
            ->where('resume_tags.user_id', $uid)
            ->get();

        // If you want to group by tags then enable this query.
        //        $data = DB::table('resume_tags')
        //                ->join('tags', 'tags.id', '=', 'resume_tags.tag_id')
        //                ->select('tags.id', 'tags.tag', DB::raw('COUNT(*) AS total'))
        //                ->where('resume_tags.user_id', $uid)
        //                ->groupBy('tags.id', 'tags.tag')
        //                ->get();

        return response()->json(['data' => $data], 200);
    }

    public function searchtagresume($tagid)
    {
        $uid = Session::get('user')['id'];
        $data = DB::table('resume_tags')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'resume_tags.candidate_id')
            ->leftjoin('jobseekers', 'jobseekers.id', '=', 'resume_tags.candidate_id')
            ->leftjoin('tags', 'tags.id', '=', 'resume_tags.tag_id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.designation', 'jobseekers.preferred_location', 'js_resumes.resume_video_link', 'jobseekers.gender', 'js_resumes.resume', 'tags.tag')
            ->where('resume_tags.user_id', $uid)
            ->where('resume_tags.tag_id', $tagid)
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function send_mail($msg, $candidate)
    {
        $from = Session::get('user')['email'];
        $candidate_arr = explode(",", $candidate);
        array_shift($candidate_arr);
        foreach ($candidate_arr as $key => $value) {
            $data = Jobseeker::select('fname', 'email')->where('id', $value)->first();
            $to = $data->email;
            $name = $data->fname;
            if ($to) {
                Mail::to($to)->send(new SendMail($name, $msg));
            }
        }
    }
    //for employer see candidate details  
    public function getJsInfo($jsid)
    {

        $jsInfo = DB::table('jobseekers')
            ->leftjoin('js_educational_details', 'js_educational_details.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_professional_details', 'js_professional_details.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_certifications', 'js_certifications.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_social_links', 'js_social_links.js_userid', '=', 'jobseekers.id')
            ->leftjoin('qualifications', 'qualifications.id', '=', 'js_educational_details.education')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'js_professional_details.functional_role')
            ->select(
                'jobseekers.*',
                'js_educational_details.*',
                'js_professional_details.*',
                'js_resumes.resume',
                'js_resumes.resume_video_link',
                'js_resumes.linkedin_resume_link',
                'js_resumes.updated_at as resume_upload_date',
                'js_certifications.*',
                'js_social_links.*',
                'qualifications.*',
                'functional_roles.*'
            )
            ->where('jobseekers.id', $jsid)
            ->first();

        return response()->json(['jsInfo' => $jsInfo], 200);
    }
    public function getCertificateInfo($jsid)
    {
        $userCertInfo = JsCertification::where('js_userid', $jsid)->get();

        return response()->json(['userCertInfo' => $userCertInfo], 200);
    }
    public function getSkillInfo($jsid)
    {
        $skills = JsSkill::where('js_userid', $jsid)->get();

        return response()->json(['data' => $skills, 'status' => 'success'], 200);
    }
    public function getEducationInfo($jsid)
    {
        $educationalDetails = DB::table('js_educational_details')
            ->leftjoin('qualifications', 'qualifications.id', 'js_educational_details.education')
            ->select('qualifications.id', 'qualifications.qualification', 'js_educational_details.*')
            ->where('js_educational_details.js_userid', $jsid)
            ->get();
        return response()->json(['educationalDetails' => $educationalDetails], 200);
    }
    public function getProffesionalInfo($jsid)
    {
        $userProfessionalDetails = DB::table('js_professional_details')
            ->leftjoin('job_shifts', 'job_shifts.id', 'js_professional_details.job_shift')
            ->leftjoin('job_types', 'job_types.id', 'js_professional_details.job_type')
            ->leftjoin('industries', 'industries.id', 'js_professional_details.industry_name')
            ->leftjoin('functional_roles', 'functional_roles.id', 'js_professional_details.functional_role')
            ->select('js_professional_details.id', 'js_professional_details.responsibility', 'js_professional_details.designations', 'js_professional_details.from_date', 'js_professional_details.to_date', 'js_professional_details.organisation', 'job_shifts.job_shift', 'job_types.job_type', 'industries.category_name as industry_name', 'functional_roles.subcategory_name as functional_role')
            ->where('js_professional_details.js_userid', $jsid)
            ->get();

        return response()->json(['data' => $userProfessionalDetails], 200);
    }
}
