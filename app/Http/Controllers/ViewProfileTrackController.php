<?php

namespace App\Http\Controllers;

use App\Jobseeker;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\ViewProfileTrack;
use Illuminate\Database\Eloquent\Builder;
use App\JsEducationalDetail;

class ViewProfileTrackController extends Controller
{   
    
    public function myEloquentTest() {
        // jobseekers, js_educational_details, js_resumes, js_skills, comments, js_professional_details
        $request = 'PSSPL';

        //$data = Jobseeker::query();

        $data= Jobseeker::whereHas('professionals', function ($query) use ($request) {
            $query->where('organisation', $request);
        });



        $jobseeker = $data->paginate(2);  
        
        return $jobseeker;
    }



    public function store($id)
    {
        $emp_id =Session::get('user')['id'];

        // CHECK if

        $check = ViewProfileTrack::where('view_by',$emp_id)
            ->where('view_to',$id)
            ->first();   

        if($check) {
            $totalView = $check->no_of_view + 1;
            // update
            $update = $check->update(['no_of_view' => $totalView]);

            if($update) {
                return response()->json(['status' => 'success'], 201);
            }
        } else {
            // add new
            $addtrack = new ViewProfileTrack();
            $addtrack->view_by = $emp_id;
            $addtrack->view_to = $id;
            $addtrack->no_of_view = 1;
            $addtrack->save(); 

        }    
        
        

    }
    public function checkProfileVieworNot()
    {
        if (!session()->has('user')) {
            $appliedJobs = ['status' => 'error', 'message' => 'Please login first'];
        } else {
            $empId = Session::get('user')['id'];
            $appliedJobs = ViewProfileTrack::select('view_to','no_of_view')->where('view_by', $empId)->get();
        }

        return response()->json($appliedJobs, 200);
    }
    public function getAllQualificationInstitute(){
        $institute_name = JsEducationalDetail::whereNotNull('institute_name')->pluck('institute_name');

        $institute = collect($institute_name)->unique();
        
        $selected = []; 
        foreach ($institute as $key => $item) {
              $selected[] = $item;
        }

        return $selected;
        //issue in server (Work fine in local)
        // $institute_name =JsEducationalDetail::pluck('institute_name')->toArray();

        // $institute_name =array_unique($institute_name);

        // return $institute_name;
        
    }
    public function getResumeFilterDemo()
    {
        
        $orderBy = request('');
        $skill = request('skill');
        $experienceMin = request('min_exp');
        $experienceMax = request('max_exp');
        $from_salary = request('from_salary');
        $to_salary = request('to_salary');
        $current_location = request('current_location');
        $optional_keywords = request('optional_keywords');
        $mandate_keywords = request('mandate_keywords');
        $excluding_keywords =request('excluding_keywords');
        $designation = request('designation');
        $functionalrole = request('functionalrole');
        $industry = request('industry');
        $notice_period = request('notice_period');
        $profileUpdate = request('active_in');
        $resume_per_page = request('resume_per_page') ?  request('resume_per_page') :10;
        $gender = request('gender');
        $company_name = request('company_name');
        $exclude_company_name = request('exclude_company_name');
        $notice_period = request('notice_period');
        $ug_qualification_name = request('ug_qualification_name');
        $ug_institute_name =request('ug_institute_name');
        $ug_education_type = request('ug_education_type');
        $start_graduation =request('start_graduation');
        $to_graduation = request('to_graduation');
        $display = request('display');
        $today = Carbon::today();
    

        

        //jobseeker start
            $jobseeker = DB::table('jobseekers')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->select('jobseekers.id as js_id', 'jobseekers.fname', 'jobseekers.lname','jobseekers.email','jobseekers.contact','jobseekers.designation', 'jobseekers.preferred_location','jobseekers.current_working_location', 
            'jobseekers.gender', 'jobseekers.exp_year', 'jobseekers.exp_month', 'jobseekers.expected_salary','jobseekers.current_salary', 'js_resumes.resume','jobseekers.profile_pic_thumb',
            'jobseekers.last_modified','jobseekers.last_login','jobseekers.functionalrole_id','jobseekers.notice_period','jobseekers.industry_id',
            'js_resumes.resume_video_link', 'js_resumes.resume_video_link');

            
            if (isset($experienceMin) && $experienceMin !== null) {
                $jobseeker->where('jobseekers.exp_year', '>=', $experienceMin);
            }
            if (isset($experienceMax) && $experienceMax !== null) {
                $jobseeker->where('jobseekers.exp_year', '<=', $experienceMax);
            }
            if (isset($from_salary) && $from_salary !== null) {
                $jobseeker->where('jobseekers.current_salary', '>=', $from_salary);
            }
            if (isset($to_salary) && $to_salary !== null) {
                $jobseeker->where('jobseekers.current_salary', '<=', $to_salary);
            }
            if (isset($current_location) && $current_location !== null) {
                $jobseeker->where('jobseekers.current_working_location',$current_location);
            }
            if (isset($gender) && $gender !== null) {
                $jobseeker->where('jobseekers.gender',$gender);
            }
            
        if (isset($optional_keywords) && $optional_keywords !== '') {
            $jobseeker->where(function ($query) use ($optional_keywords) {
                $query->where('jobseekers.fname', 'like', "%" .$optional_keywords. "%")
                    ->orWhere('jobseekers.lname', 'like', "%" .$optional_keywords. "%")
                    ->orWhere('jobseekers.designation', 'like', "%" .$optional_keywords. "%")
                    ->orWhere('jobseekers.preferred_location', 'like', "%" .$optional_keywords. "%")
                    ->orWhere('jobseekers.email', 'like', "%" .$optional_keywords. "%")
                    ->orWhere('jobseekers.contact', 'like', "%" .$optional_keywords. "%");
            });
        }

        if (isset($mandate_keywords) && $mandate_keywords !== '') {
            $jobseeker->where(function ($query) use ($mandate_keywords) {
                $query->where('jobseekers.fname', 'like', "%".$mandate_keywords."%")
                    ->where('jobseekers.lname', 'like', "%".$mandate_keywords."%")
                    ->where('jobseekers.designation', 'like', "%".$mandate_keywords."%")
                    ->where('jobseekers.preferred_location', 'like', "%".$mandate_keywords."%")
                    ->where('jobseekers.email', 'like', "%".$mandate_keywords."%")
                    ->where('jobseekers.contact', 'like', "%".$mandate_keywords."%");
            });
        }
        if (isset($excluding_keywords) && $excluding_keywords !== '') {
            $jobseeker->where(function ($query) use ($excluding_keywords) {
                $query->WhereNotIn('jobseekers.fname', 'like', "%".$excluding_keywords."%")
                    ->WhereNotIn('jobseekers.lname', 'like', "%".$excluding_keywords."%")
                    ->WhereNotIn('jobseekers.designation', 'like', "%".$excluding_keywords."%")
                    ->WhereNotIn('jobseekers.preferred_location', 'like', "%".$excluding_keywords."%")
                    ->WhereNotIn('jobseekers.email', 'like', "%".$excluding_keywords."%")
                    ->WhereNotIn('jobseekers.contact', 'like', "%".$excluding_keywords."%");
            });
        }

        if (isset($designation) && $designation !== null) {
            $jobseeker->where('jobseekers.designation', $designation);
        }
        if (isset($functionalrole) && $functionalrole !== null) {
            $jobseeker->where('jobseekers.functionalrole_id', $functionalrole);
        }
        if (isset($functionalrole) && $functionalrole !== null) {
            $jobseeker->where('jobseekers.functionalrole_id', $functionalrole);
        }
        if (isset($industry) && $industry !== null) {
            $jobseeker->where('jobseekers.industry_id', $industry);
        }
        if (isset($notice_period) && $notice_period !== null) {
            $jobseeker->where('jobseekers.notice_period', $notice_period);
        }
        if (isset($profileUpdate) && $profileUpdate !== null) {
            $jobseeker->where('jobseekers.last_login', '>', $today->subDay($profileUpdate));
        }
        if (isset($display) && $display !== null) {
            $jobseeker->orderBy('jobseekers.last_modified','DESC');
        }
        

        $jobseeker = $jobseeker->get();

        
        //education start
        $newCollection = $jobseeker->map(function ($item) use($company_name,$exclude_company_name,$ug_qualification_name,
        $ug_institute_name,$start_graduation,$to_graduation,$skill){
            $multipleEducations = DB::table('js_educational_details')
            ->join('qualifications', 'qualifications.id', 'js_educational_details.education')
                ->select('js_educational_details.js_userid', 'js_educational_details.education','qualifications.qualification','js_educational_details.degree_name', 'js_educational_details.percentage_grade',
                'js_educational_details.passing_year','js_educational_details.institute_name')->where('js_userid', $item->js_id);

                if (isset($ug_qualification_name) && $ug_qualification_name !== null) {
                    $multipleEducations->where('education', $ug_qualification_name);
                }
                if (isset($ug_institute_name) && $ug_institute_name !== null) {
                    $multipleEducations->where('institute_name', $ug_institute_name);
                }
                if (isset($start_graduation) && $start_graduation !== null) {
                    $multipleEducations->where('passing_year', '>=', $start_graduation);
                }
                if (isset($to_graduation) && $to_graduation !== null) {
                    $multipleEducations->where('passing_year', '<=', $to_graduation);
                }
                $multipleEducations = $multipleEducations->get();
                //close education

            $multipleProfessional = DB::table('js_professional_details')
                ->where('js_userid', $item->js_id);

            if (isset($company_name) && $company_name !== null) {
                $multipleProfessional->where('organisation', $company_name);
            }
            if (isset($exclude_company_name) && $exclude_company_name !== null) {
                $multipleProfessional->whereNotIn('organisation', $exclude_company_name);
            }

            $multipleProfessional = $multipleProfessional->get();

                $multipleSkills = DB::table('js_skills')
                ->where('js_userid', $item->js_id);

                if (isset($skill) && $skill !== null) {
                    $multipleSkills->where('skill',$skill);
                }
                $multipleSkills = $multipleSkills->get();

            $multipleComments = DB::table('save_comments')
            ->where('js_userid', $item->js_id)->where('emp_userid', 1)->get();

            $educations = ['educations' => $multipleEducations];
            $professional = ['professionals' => $multipleProfessional];
            $skills = ['skills' => $multipleSkills];
            $comments = ['comments' => $multipleComments];

            $collection1 = collect($item)->merge($professional);
            $collection2 = $collection1->merge($educations);
            $collection3 = $collection2->merge($skills);
            $collection4 = $collection3->merge($comments);

            return $collection4;
        });
        


        $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        $prePage = $resume_per_page;

        $category = new \Illuminate\Pagination\LengthAwarePaginator(
        $newCollection->forPage($currentPage, $prePage), $newCollection->count(), $prePage, $currentPage
        );

        return $category;
        
    }
}
