<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
use App\Jobseeker;
use App\Qualification;
use App\JsEducationalDetail;
use App\JsProfessionalDetail;
use App\JsResume;
use App\JsCertification;
use App\JsSocialLinks;
use App\JsSkill;
use App\JobType;
use App\JobShift;
use App\Industry;
use App\AllUser;
use App\Jobmanager;
use App\Follower;
use App\FunctionalRole;
use App\Empcompaniesdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class UserprofileController extends Controller
{

    public function jobseeker()
    {
        $data = Session::get('user');
        return response()->json(['data' => $data], 200);
    }

    public function check_user()
    {
        $data = Session::get('user');
        if ($data == "") {
            $data = ['user_type' => 'guest'];
        }
        return response()->json(['data' => $data], 200);
    }

    public function get_blade_sessionuser()
    {
        $data = Session::get('user');
        return response()->json(['blade_data' => $data], 200);
    }

    public function logout()
    {
        Auth::guard('jobseeker')->logout();
        Session::flush();

        return response()->json(['success' => 'true'], 200);
    }

    public function count_job()
    {
        $id = Session::get('user')['id'];
        $count = Jobmanager::where('userid', $id)->count();
        return response()->json(['data' => $count], 200);
    }

    public function count_active_job()
    {
        $id = Session::get('user')['id'];
        $count = Jobmanager::where('userid', $id)->where('status', 'Active')->count();
        return response()->json(['data' => $count], 200);
    }

    public function count_followers()
    {
        $id = Session::get('user')['company_id'];
        $count = Follower::where('employer_id', $id)->where('status', '1')->count();
        return response()->json(['data' => $count], 200);
    }

    public function qualification()
    {
        $data = Qualification::All();
        return response()->json(['data' => $data], 200);
    }

    public function jobtype()
    {
        $data = JobType::All();
        return response()->json(['data' => $data], 200);
    }

    public function jobshift()
    {
        $data = JobShift::All();
        return response()->json(['data' => $data], 200);
    }

    public function industry()
    {
        $data = Industry::All();
        return response()->json(['data' => $data], 200);
    }

    public function functionalrole()
    {
        $data = FunctionalRole::All();
        return response()->json(['data' => $data], 200);
    }
    public function update_personal_detail(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'fname'    => 'required',
            'lname'    => 'required',
            'email'    => 'required',
            'contact'    => 'required',
            'dob'    => 'required',
            'gender'    => 'required',
            'candidate_type'    => 'required',
            'preferred_location'    => 'required',
        ],
        ['fname.required' => 'First Name is Required', 
        'lname.required' => 'Last Name is Required',
        'email.required' => 'Email is required',
        'contact.required' => 'Contact Number is required',
        'dob.required' => 'Date of Birth is Required',
        'gender.required' => 'Gender is Required',
        'candidate_type.required' => 'Select Fresher or Experienced ?',
        'preferred_location.required' => 'Preferred Location is Required'
        ]);
        $id = Session::get('user')['id'];
        $js = Jobseeker::find($id);

        if ($request->pic && $request->pic != null) {
            $strpos = strpos($request->pic, ';');
            $sub = substr($request->pic, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->pic)->resize(200, 200);
            $upload_path = public_path() . "/jobseeker_profile_image/";
            $img->save($upload_path . $name);
        }

        if ($request->upload_resume && $request->upload_resume != null) {
            $data = $request->upload_resume;
            $explode = explode(',', $data);
            $ex = explode('/', $data)[1];
            $extension = explode(';', $ex)[0];
            $valid_extention = ['pdf'];
            if (in_array($extension, $valid_extention)) {
                $data = base64_decode($explode[1]);
                $filename = rand(10000000, 999999999) . "." . $extension;
                $url = public_path() . '/resume/' . $filename;
                file_put_contents($url, $data);
                //$jsResume = JsResume::updateOrCreate(['resume' => $filename, 'js_userid' => $id]);
                $jsResume = JsResume::where('js_userid', $id)->first();
                if($jsResume) {
                    // Update
                        
                        $resume = JsResume::where('js_userid', $id)->update(
                            ['resume' => $request->upload_resume ? $filename : $request->resume,
                            'resume_video_link' =>$request->resume_video_link,
                            'linkedin_resume_link' =>$request->linkedin_resume_link
                            ]
                        );
                } else {
                    // Insert
                        $resumeInsert = new JsResume();
                        $resumeInsert->resume =$filename;
                        $resumeInsert->js_userid =$id;
                        $resumeInsert->resume_video_link = $request->resume_video_link;
                        $resumeInsert->linkedin_resume_link = $request->linkedin_resume_link;
                        $resumeInsert->save();
                        
                    }
                } else {
                    return response()->json(['error' => 'please upload pdf file']);
                }
        }

        //save in jobseeker table
        $js->fname = $request->fname;
        $js->lname = $request->lname;
        $js->email = $request->email;
        $js->contact = $request->contact;
        $js->dob = $request->dob;
        $js->gender = $request->gender;
        $js->address = $request->address;
        $js->preferred_location = $request->preferred_location;
        $js->candidate_type = $request->candidate_type;
        $js->profile_pic_thumb = $request->pic ? $name : $js->profile_pic_thumb;
        $js->last_modified = Carbon::now();
        

        $js->save();
    }


    public function saveEducationalDetail(Request $request)
    {
        $this->validate($request, []);
        $uid = Session::get('user')['id'];
        
        $js_education = new JsEducationalDetail();
        $js_education->js_userid = $uid;
        $js_education->education = $request->education;
        $js_education->degree_name = $request->degree_name;
        $js_education->percentage_grade = $request->percentage_grade;
        $js_education->institute_name = $request->institute_name;
        $js_education->passing_year = $request->passing_year;
        $js_education->institute_location = $request->institute_location;
        $js_education->save();

        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
    }

    public function update_qualification_detail(Request $request, $id)
    {
        $js_education = JsEducationalDetail::find($id);
        $js_education->education = $request->education;
        $js_education->degree_name = $request->degree_name;
        $js_education->percentage_grade = $request->percentage_grade;
        $js_education->institute_name = $request->institute_name;
        $js_education->passing_year = $request->passing_year;
        $js_education->save();

        $uid = Session::get('user')['id'];
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
    }

    public function getProfessionalDetail()
    {
        $uid = Session::get('user')['id'];
        $userProfessionalDetails = DB::table('js_professional_details')
            ->leftjoin('job_shifts', 'job_shifts.id', 'js_professional_details.job_shift')
            ->leftjoin('job_types', 'job_types.id', 'js_professional_details.job_type')
            ->leftjoin('industries', 'industries.id', 'js_professional_details.industry_name')
            ->leftjoin('functional_roles', 'functional_roles.id', 'js_professional_details.functional_role')
            ->select('js_professional_details.id', 'js_professional_details.responsibility', 'js_professional_details.designations', 'js_professional_details.from_date', 'js_professional_details.to_date', 'js_professional_details.organisation', 'job_shifts.job_shift', 'job_types.job_type', 'industries.category_name as industry_name', 'functional_roles.subcategory_name as functional_role')
            ->where('js_professional_details.js_userid', $uid)
            ->get();

        return response()->json(['data' => $userProfessionalDetails], 200);
    }

    public function editProfessionalDetail($id)
    {
        $uid = Session::get('user')['id'];
        $userProfessionalDetails = DB::table('js_professional_details')
            ->leftjoin('job_shifts', 'job_shifts.id', 'js_professional_details.job_shift')
            ->leftjoin('job_types', 'job_types.id', 'js_professional_details.job_type')
            ->leftjoin('industries', 'industries.id', 'js_professional_details.industry_name')
            ->leftjoin('functional_roles', 'functional_roles.id', 'js_professional_details.functional_role')
            ->select('js_professional_details.id', 'js_professional_details.responsibility', 'js_professional_details.designations', 'js_professional_details.from_date', 'js_professional_details.to_date', 'js_professional_details.organisation', 'job_shifts.job_shift', 'job_types.job_type', 'industries.category_name as industry_name', 'functional_roles.subcategory_name as functional_role')
            ->where('js_professional_details.js_userid', $uid)
            ->where('js_professional_details.id', $id)
            ->first();

        return response()->json(['data' => $userProfessionalDetails], 200);
    }

    public function addProfessionalDetail(Request $request)
    {
        $uid = Session::get('user')['id'];
        $js_professional = new JsProfessionalDetail();
        $js_professional->js_userid = $uid;
        $js_professional->designations = $request->designations;
        $js_professional->organisation = $request->organisation;
        $js_professional->job_type = $request->job_type;
        $js_professional->job_shift = $request->job_shift;
        $js_professional->industry_name = $request->industry_name;
        $js_professional->functional_role = $request->functional_role;
        $js_professional->from_date = $request->from_date;
        $js_professional->to_date = $request->to_date;
        $js_professional->responsibility = $request->responsibility;
        $js_professional->save();

        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
    }

    public function update_professional_detail(Request $request)
    {
        $id = $request->professionalInfo['id'];
        $designation = $request->professionalInfo['designation'];
        $organization = $request->professionalInfo['organisation'];
        $jobType = $request->professionalInfo['job_type'];
        $jonShift = $request->professionalInfo['job_shift'];
        $industryName = $request->professionalInfo['industry_name'];
        $functionalRole = $request->professionalInfo['functional_role'];
        $formDate = $request->professionalInfo['from_date'];
        $toDate = $request->professionalInfo['to_date'];
        $responsibility = $request->professionalInfo['responsibility'];

        $professional = JsProfessionalDetail::where('id', $id)->update([
            'designations' => $designation,
            'organisation' => $organization,
            'job_type' => $jobType,
            'job_shift' => $jonShift,
            'industry_name' => $industryName,
            'functional_role' => $functionalRole,
            'from_date' => $formDate,
            'to_date' => $toDate,
            'responsibility' => $responsibility
        ]);

        $uid = Session::get('user')['id'];
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();

        if ($professional) {
            return response()->json(['success' => 'Professional Detail Updated Successfully'], 200);
        } else {
            return response()->json(['error' => 'Somethings went wrong.']);
        }
    }

    public function deleteProfessionalDetail($id)
    {
        $uid = Session::get('user')['id'];
        $professionalDetail = JsProfessionalDetail::find($id);
        $professionalDetail->delete($uid);

        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();

        if (!$professionalDetail) {
            return response()->json(['error' => 'Professional Detail not Deleted']);
        }

        return response()->json(['success' => 'Professional Detail Deleted Successfully']);
    }

    public function update_certification_detail(Request $request)
    {

        $uid = Session::get('user')['id'];
        $js_certificate = new JsCertification();
        $js_certificate->js_userid = $uid;
        $js_certificate->course = $request->course;
        $js_certificate->certificate_institute_name = $request->certificate_institute_name;
        $js_certificate->cert_from_date = $request->cert_from_date;
        $js_certificate->cert_to_date = $request->cert_to_date;
        $js_certificate->grade = $request->grade;
        $js_certificate->certification_type = $request->certification_type;
        $js_certificate->description = $request->description;
        $js_certificate->save();

        
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
    }

    public function update_sociallinks_detail(Request $request)
    {
        $uid = Session::get('user')['id'];
        $res = JsSocialLinks::select('js_userid')->where('js_userid', $uid)->count();
        if ($res <= 0) {
            $js_social = new JsSocialLinks();
            $js_social->js_userid = $uid;
            $js_social->facebook_link = $request->facebook_link;
            $js_social->linkedin_link = $request->linkedin_link;
            $js_social->google_plus_link = $request->google_plus_link;
            $js_social->twitter_link = $request->twitter_link;
            $js_social->github_link = $request->github_link;
            $js_social->blog_link = $request->blog_link;
            $js_social->save();

            $uid = Session::get('user')['id'];
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        } else {
            $res2 = JsSocialLinks::select('id')->where('js_userid', $uid)->first();
            $id = $res2->id;
            $js_social = JsSocialLinks::find($id);
            $js_social->facebook_link = $request->facebook_link;
            $js_social->linkedin_link = $request->linkedin_link;
            $js_social->google_plus_link = $request->google_plus_link;
            $js_social->twitter_link = $request->twitter_link;
            $js_social->github_link = $request->github_link;
            $js_social->blog_link = $request->blog_link;
            $js_social->save();

            $uid = Session::get('user')['id'];
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        }
    }


    public function update_resume_detail(Request $request)
    {
        $this->validate($request, [
            'resume'    => 'required',

        ]);
        $uid = Session::get('user')['id'];
        $res = JsResume::select('js_userid')->where('js_userid', $uid)->count();

        if ($res <= 0) {
            $data = $request->resume;
            $explode = explode(',', $data);
            $ex = explode('/', $data)[1];
            $extension = explode(';', $ex)[0];
            $valid_extention = ['pdf'];
            if (in_array($extension, $valid_extention)) {
                $data = base64_decode($explode[1]);
                $filename = rand(10000000, 999999999) . "." . $extension;
                $url = public_path() . '/resume/' . $filename;
                file_put_contents($url, $data);
            } else {
                return response()->json(['error' => 'please upload pdf file']);
            }

            $js_resume = new JsResume();

            if (isset($request->resume_video_link) && $request->resume_video_link != '') {
                $url = $request->resume_video_link;
                $get_url = parse_url($url);
                $youtube_res_link = parse_str($get_url['query'], $params);
                $video_link = $params['v'];
            } else {
                $video_link = null;
            }

            $js_resume->js_userid = $uid;
            $js_resume->resume = $filename;
            $js_resume->resume_video_link = $video_link;
            $js_resume->cover_letter = $request->cover_letter;
            $js_resume->linkedin_resume_link = $request->linkedin_resume_link;
            $js_resume->save();
        } else {
            $res2 = JsResume::select('id')->where('js_userid', $uid)->first();
            $id = $res2->id;
            $js_resume = JsResume::find($id);
            if ($request->resume != $js_resume->resume) {
                $data = $request->resume;
                $explode = explode(',', $data);
                $ex = explode('/', $data)[1];
                $extension = explode(';', $ex)[0];
                $valid_extention = ['pdf'];
                if (in_array($extension, $valid_extention)) {
                    $data = base64_decode($explode[1]);
                    $filename = rand(10000000, 999999999) . "." . $extension;
                    $url = public_path() . '/resume/' . $filename;
                    file_put_contents($url, $data);
                } else {
                    return response()->json(['error' => 'please upload pdf file']);
                }
            } else {
                $filename = $js_resume->resume;
            }

            if (isset($request->resume_video_link) && $request->resume_video_link != '') {
                $url = $request->resume_video_link;
                $get_url = parse_url($url);
                $youtube_res_link = parse_str($get_url['query'], $params);
                $video_link = $params['v'];
            } else {
                $video_link = null;
            }

            $js_resume->resume = $filename;
            $js_resume->resume_video_link = $video_link;
            $js_resume->cover_letter = $request->cover_letter;
            $js_resume->linkedin_resume_link = $request->linkedin_resume_link;
            $js_resume->save();
        }
    }

    public function jobseeker_profile()
    {
        $id = Session::get('user')['id'];
        $data = DB::table('jobseekers')
            ->leftjoin('js_educational_details', 'js_educational_details.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_professional_details', 'js_professional_details.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_resumes', 'js_resumes.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_certifications', 'js_certifications.js_userid', '=', 'jobseekers.id')
            ->leftjoin('js_social_links', 'js_social_links.js_userid', '=', 'jobseekers.id')
            ->leftjoin('qualifications', 'qualifications.id', '=', 'js_educational_details.education')
            ->leftjoin('functional_roles', 'functional_roles.id', '=', 'js_professional_details.functional_role')
            ->select('jobseekers.*', 'js_educational_details.*', 'js_professional_details.*',  
            'js_certifications.*', 'js_social_links.*', 'qualifications.*', 'functional_roles.*','js_resumes.js_userid',
            'js_resumes.resume','js_resumes.resume','js_resumes.resume_video_link','js_resumes.linkedin_resume_link','js_resumes.cover_letter','js_resumes.updated_at as resume_upload_date')
            ->where('jobseekers.id', $id)
            ->first();

        // if ($data->resume_video_link) {
        //     $old_link = $data->resume_video_link;
        //     $new_link = "https://www.youtube.com/watch?v=" . $old_link;
        //     $data->resume_video_link = $new_link;
        // }

        return response()->json(['data' => $data], 200);
    }

    public function getResumeLink()
    {
        $id = Session::get('user')['id'];
        $resume = JsResume::select('id', 'resume_video_link')->where('js_userid', $id)->first();
        return response()->json(['data' => $resume], 200);
    }


    public function employer_profile()
    {
        $id = Session::get('user')['id'];

        $data = DB::table('all_users')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
            ->select('all_users.*', 'empcompaniesdetails.company_name', 'empcompaniesdetails.company_logo', 'empcompaniesdetails.cover_image', 'empcompaniesdetails.company_state as state', 'empcompaniesdetails.company_city as city', 'empcompaniesdetails.company_industry as com_industry', 'empcompaniesdetails.owner_name as owner_name', 'empcompaniesdetails.com_email as com_email', 'empcompaniesdetails.com_contact as com_contact', 'empcompaniesdetails.website as website', 
            'empcompaniesdetails.tagline as tagline', 'empcompaniesdetails.no_of_employee as employee_no', 'empcompaniesdetails.company_capital as revenue', 'empcompaniesdetails.cin_no as cin_no', 'empcompaniesdetails.about as com_summary', 'empcompaniesdetails.address as address', 'empcompaniesdetails.establish_date as established_year', 'empcompaniesdetails.facebook_url as com_facebook', 'empcompaniesdetails.twitter_url as com_twitter', 'empcompaniesdetails.linkedin_url as com_linkedin', 
            'empcompaniesdetails.additional as additional', 'empcompaniesdetails.company_country as country', 'empcompaniesdetails.company_video')
            ->where('all_users.id', $id)
            ->first();

        return response()->json(['data' => $data], 200);
    }

    public function update_employer_personaldetail(Request $request)
    {
        $this->validate(
            $request,
            [
                'fname'    => 'required|string',
                'lname'    => 'required|string',
                'email'    => 'required|email',
                'contact'  => 'required|min:10|max:12',
                'gender'   => 'required',
                'aadhar_no' => 'required|min:12|max:12',
                'designation' => 'required|string'
            ]
        );

        $uid = Session::get('user')['id'];
        $employerDetail = AllUser::where('id', $uid)->first();

        if (request('profile') && request('profile') !== '') {
            $strpos = strpos(request('profile'), ';');
            $sub = substr(request('profile'), 0, $strpos);
            $ex = explode('/', $sub)[1];
            $profileImg = time() . "." . $ex;
            $img = Image::make(request('profile'))->resize(200, 200);
            $upload_path = public_path() . "/emp_profile_image/";
            $img->save($upload_path . $profileImg);

            if (file_exists($profileImg)) {
                @unlink($profileImg);
            }
        }

        $employerDetail->fname = request('fname');
        $employerDetail->lname = request('lname');
        $employerDetail->email = request('email');
        $employerDetail->contact = request('contact');
        $employerDetail->dob   = request('dob');
        $employerDetail->gender = request('gender');
        $employerDetail->aadhar_no = request('aadhar_no');
        $employerDetail->designation = request('designation');
        $employerDetail->industry_id = request('industry_id');
        $employerDetail->functionalrole_id = request('functionalrole_id');
        $employerDetail->facebook_url = request('facebook_url');
        $employerDetail->twitter_url = request('twitter_url');
        $employerDetail->linkedin_url = request('linkedin_url');
        $employerDetail->profile_pic_thumb = request('profile') ? $profileImg : $employerDetail->profile_pic_thumb;
        $employerDetail->save();
    }

    public function update_employer_companydetail(Request $request)
    {

        //dd($request->all());
        // exit;

        $this->validate(
            $request,
            [
                'company_name'    => 'required|string',
                'tagline'    => 'required',
                'com_industry'    => 'required',
                'owner_name'    => 'required|string',
                'com_email'    => 'required|email',
                'com_contact'    => 'required|min:10|max:12',
                'website'    => 'required',
                // 'logo'        => 'required',
                // 'banner'        => 'required',
                'employee_no'    => 'required',
                'established_year'    => 'required',
                'address'    => 'required',
                'country'    => 'required',
                'state'    => 'required',
                'city'    => 'required',
                'revenue'    => 'required',
                'cin_no'    => 'required',
                'com_facebook'    => 'required',
                'com_twitter'    => 'required',
                'com_linkedin'    => 'required',
                'com_summary'    => 'required|max:500',
                // 'additional'    => 'required|max:255',
                'company_video'    => 'required',


            ], //custom message
            [
                'logo.required' => 'Please Upload a company logo',
                // 'logo.mimes' => 'Only jpeg,jpg,png images are allowed',
                // 'logo.max' => 'Sorry! Maximum allowed size for an image is 1MB',
                'banner.required' => 'Please Upload a banner',
                // 'banner.mimes' => 'Only jpeg,jpg,png images are allowed',
                // 'banner.max' => 'Sorry! Maximum allowed size for an image is 1MB',
                'com_industry.required' => 'Company Industry Is required',
                'com_email.required' => 'Company Email Is required',
                'com_contact.required' => 'Company Landline number or Mobile number is required',
                'company_video.required' => 'Company Video is required and only Youtube link is required',
                'com_summary.required' => 'Company summary is required',

            ]
        );
        $uid = Session::get('user')['id'];
        $com_id = Session::get('user')['company_id'];
        $res = Empcompaniesdetail::select('id')->where('id', $com_id)->count();

        if ($res <= 0) {
            $emp_personal = new Empcompaniesdetail();
            // $url = $request->company_video;
            // $get_url = parse_url($url);
            // $youtube = parse_str($get_url['query'], $params);
            //return $params['v'];

            $strpos = strpos($request->logo, ';');
            $sub = substr($request->logo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex; //request to insert in table field
            $img = Image::make($request->logo)->resize(370, 250);
            $upload_path = public_path() . "/company_logo/";
            $img->save($upload_path . $name); // move to folder

            $strpos1 = strpos($request->banner, ';');
            $sub1 = substr($request->banner, 0, $strpos1);
            $ex1 = explode('/', $sub1)[1];
            $name1 = time() . "." . $ex1; //request to insert in table field
            $img1 = Image::make($request->banner)->resize(370, 250);
            $upload_path1 = public_path() . "/company_cover/";
            $img1->save($upload_path1 . $name1); // move to folder

            $emp_personal->company_name = $request->company_name;
            $emp_personal->com_email = $request->com_email;
            $emp_personal->com_contact = $request->com_contact;
            $emp_personal->website = $request->website;
            $emp_personal->no_of_employee = $request->employee_no;
            $emp_personal->tagline = $request->tagline;
            $emp_personal->establish_date = $request->established_year;
            $emp_personal->address = $request->address;
            $emp_personal->company_country = $request->country;
            $emp_personal->company_state = $request->state;
            $emp_personal->company_city = $request->city;
            $emp_personal->company_industry = $request->com_industry;
            $emp_personal->company_capital = $request->revenue;
            $emp_personal->cin_no = $request->cin_no;
            $emp_personal->facebook_url = $request->com_facebook;
            $emp_personal->twitter_url = $request->com_twitter;
            $emp_personal->owner_name = $request->owner_name;
            $emp_personal->linkedin_url = $request->com_linkedin;
            $emp_personal->about = $request->com_summary;
            $emp_personal->additional = $request->additional;
            $emp_personal->company_video = $request->company_video;
            $emp_personal->company_logo = $name;
            $emp_personal->cover_image = $name1;
            $emp_personal->emp_userid = $uid;
            $emp_personal->save();
        } else {
            $com_id = Session::get('user')['company_id'];
            $res2 = Empcompaniesdetail::select('id')->where('id', $com_id)->first();
            $id = $res2->id;
            $emp_personal = Empcompaniesdetail::find($id);

            // if (isset($request->company_video)) {
            //     if (strpos($request->company_video, '?')) {
            //         $url = $request->company_video;
            //         $get_url = parse_url($url);
            //         $parse_url = parse_str($get_url['query'], $params);
            //         $video_url = $params['v'];
            //     } else {
            //         $video_url = $request->company_video;
            //     }
            // }

            if (isset($request->logo)) {
                if ($request->logo != $emp_personal->company_logo) {
                    $strpos = strpos($request->logo, ';');
                    $sub = substr($request->logo, 0, $strpos);
                    $ex = explode('/', $sub)[1];
                    $name = time() . "." . $ex;
                    $img = Image::make($request->logo)->resize(200, 200);
                    $upload_path = public_path() . "/company_logo/";
                    $image = $upload_path . $emp_personal->company_logo;
                    $img->save($upload_path . $name);

                    if (file_exists($image)) {
                        @unlink($image);
                    }
                } else {
                    $name = $emp_personal->company_logo;
                }
            } else {
                $name = $emp_personal->company_logo;
            }

            //company cover
            if (isset($request->banner)) {
                if ($request->banner != $emp_personal->cover_image) {
                    $strpos1 = strpos($request->banner, ';');
                    $sub1 = substr($request->banner, 0, $strpos1);
                    $ex1 = explode('/', $sub1)[1];
                    $name1 = time() . "." . $ex1;
                    $img1 = Image::make($request->banner)->resize(200, 200);
                    $upload_path1 = public_path() . "/company_cover/";
                    $image1 = $upload_path1 . $emp_personal->cover_image;
                    $img1->save($upload_path1 . $name1);

                    if (file_exists($image1)) {
                        @unlink($image1);
                    }
                } else {
                    $name1 = $emp_personal->cover_image;
                }
            } else {
                $name1 = $emp_personal->cover_image;
            }

            $emp_personal->company_name = $request->company_name;
            $emp_personal->com_email = $request->com_email;
            $emp_personal->com_contact = $request->com_contact;
            $emp_personal->website = $request->website;
            $emp_personal->no_of_employee = $request->employee_no;
            $emp_personal->tagline = $request->tagline;
            $emp_personal->establish_date = $request->established_year;
            $emp_personal->address = $request->address;
            $emp_personal->company_country = $request->country;
            $emp_personal->company_state = $request->state;
            $emp_personal->company_city = $request->city;
            $emp_personal->company_industry = $request->com_industry;
            $emp_personal->company_capital = $request->revenue;
            $emp_personal->cin_no = $request->cin_no;
            $emp_personal->facebook_url = $request->com_facebook;
            $emp_personal->twitter_url = $request->com_twitter;
            $emp_personal->owner_name = $request->owner_name;
            $emp_personal->linkedin_url = $request->com_linkedin;
            $emp_personal->about = $request->com_summary;
            $emp_personal->additional = $request->additional;
            $emp_personal->company_video = $request->company_video;
            $emp_personal->company_logo = $name;
            $emp_personal->cover_image = $name1;
            $emp_personal->emp_userid = $uid;
            $emp_personal->save();
        }
    }


    public function jobpost_employerid(Request $request)
    {
        $id = Session::get('user')['id'];
        $data = DB::table('jobmanagers')
            ->leftjoin('all_users', 'all_users.id', '=', 'jobmanagers.userid')
            ->leftjoin('empcompaniesdetails', 'empcompaniesdetails.id', '=', 'all_users.company_id')
            ->select('jobmanagers.*', 'empcompaniesdetails.company_name')
            ->where('jobmanagers.userid', $id)
            ->get();
        return response()->json(['data' => $data], 200);
    }


    public function update_skills_detail(Request $request)
    {
        $data = [];
        $request = $request->all();
        $uid = Session::get('user')['id'];

        foreach ($request as $key => $value) {
            foreach ($value as $d) {
                $data[] = [
                    'skill' => $d['skill'],
                    'expert_level' => $d['skill_level'],
                    'js_userid' => $uid
                ];
            }
        }

        $data = JsSkill::insert($data);

        
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
        if ($data) {
            return response()->json(['success' => 'Skills Inserted'], 200);
        } else {
            return response()->json(['error' => 'Somethings went wrong. Please try again'], 201);
        }
    }

    public function getUserSkill()
    {
        $uid = Session::get('user')['id'];
        $skills = JsSkill::where('js_userid', $uid)->get();

        return response()->json(['data' => $skills, 'status' => 'success'], 200);
    }

    public function deleteUserSkill($id)
    {
        $uid = Session::get('user')['id'];
        $skillInfo = JsSkill::find($id);
        $skillInfo->delete($uid);

       
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
        if ($skillInfo) {
            return response()->json(['success' => 'Skill Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Skill not Deleted']);
        }
    }

    public function editUserSkill($id)
    {
        $uid = Session::get('user')['id'];
        $userSkillInfo = JsSkill::select('id', 'js_userid', 'skill', 'expert_level')->where('id', $id)->where('js_userid', $uid)->first();
        return response()->json(['data' => $userSkillInfo], 200);
    }

    public function updateUserSkill(Request $request)
    {
        $id = $request->skillInfo['id'];
        $skill = $request->skillInfo['skill'];
        $expertLevel = $request->skillInfo['expert_level'];
        $skillInfo = JsSkill::where('id', $id)->update(['skill' => $skill, 'expert_level' => $expertLevel]);

        $uid = Session::get('user')['id'];
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();

        if ($skillInfo) {
            return response()->json(['success' => 'Skill Information Updated Successfully']);
        } else {
            return response()->json(['error' => 'Somethings went wrong.']);
        }
    }

    public function getUserCertInfo()
    {
        $uid = Session::get('user')['id'];
        $userCertInfo = JsCertification::where('js_userid', $uid)->get();

        return response()->json(['userCertInfo' => $userCertInfo], 200);
    }

    public function deleteUserCertInfo($id)
    {
        $uid = Session::get('user')['id'];
        $delUserCertInfo = JsCertification::where('js_userid', $uid)->where('id', $id)->delete();

        
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
        if ($delUserCertInfo) {
            return response()->json(['status' => 'Success'], 200);
        }

        return response()->json(['error' => 'Something went wrong.'], 201);
    }

    public function editUserCertInfo($id)
    {
        $uid = Session::get('user')['id'];
        $userCertInfo = JsCertification::where('id', $id)->where('js_userid', $uid)->first();

        return response()->json(['data' => $userCertInfo], 200);
    }

    public function updateUserCertInfo(Request $request)
    {
        $id = $request->certInfo['id'];
        $data = [
            'course' => $request->certInfo['course'],
            'certificate_institute_name' => $request->certInfo['certificate_institute_name'],
            'cert_from_date' => $request->certInfo['cert_from_date'],
            'cert_to_date' => $request->certInfo['cert_to_date'],
            'grade' => $request->certInfo['grade'],
            'certification_type' => $request->certInfo['certification_type'],
            'description' => $request->certInfo['description'],
        ];

        $certInfo = JsCertification::where('id', $id)->update($data);

        $uid = Session::get('user')['id'];
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
        if ($certInfo) {
            return response()->json(['success' => 'Certificate Information Updated Successfully']);
        } else {
            return response()->json(['error' => 'Somethings went wrong.']);
        }
    }

    public function getEducationalInfo()
    {
        $uid = Session::get('user')['id'];
        $educationalDetails = DB::table('js_educational_details')
            ->leftjoin('qualifications', 'qualifications.id', 'js_educational_details.education')
            ->select('qualifications.id', 'qualifications.qualification', 'js_educational_details.*')
            ->where('js_educational_details.js_userid', $uid)
            ->get();
        return response()->json(['educationalDetails' => $educationalDetails], 200);
    }

    public function deleteEducationalDetail($id)
    {
        $uid = Session::get('user')['id'];
        $educationalDetail = JsEducationalDetail::find($id);
        $educationalDetail->delete($uid);

        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
        if ($educationalDetail) {
            return response()->json(['success' => 'Educational Detail Deleted Successfully']);
        } else {
            return response()->json(['error' => 'Educational Detail not Deleted']);
        }
    }

    public function editEducationalInfo($id)
    {
        $uid = Session::get('user')['id'];
        $educationalDetails = DB::table('js_educational_details')
            ->leftjoin('qualifications', 'qualifications.id', 'js_educational_details.education')
            ->select('qualifications.id', 'qualifications.qualification', 'js_educational_details.*')
            ->where('js_educational_details.id', $id)
            ->where('js_educational_details.js_userid', $uid)
            ->first();

        return response()->json(['educationalDetails' => $educationalDetails], 200);
    }

    public function updateEducationalInfo(Request $request)
    {
        $id = $request->editEducationalData['id'];
        $js_education = JsEducationalDetail::find($id);
        $js_education->education = $request->editEducationalData['education'];
        $js_education->degree_name = $request->editEducationalData['degree_name'];
        $js_education->percentage_grade = $request->editEducationalData['percentage_grade'];
        $js_education->institute_name = $request->editEducationalData['institute_name'];
        $js_education->passing_year = $request->editEducationalData['passing_year'];
        $js_education->save();

        $uid = Session::get('user')['id'];
        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();

        return response()->json(['success' => 'Educational Detail Updated', 200]);
    }


    public function userInfo()
    {
        $uid = Session::get('user')['id'];
        $userInfo = Jobseeker::select('id', 'fname', 'lname', 'email', 'contact')->where('id', $uid)->first();

        return response()->json(['userInfo' => $userInfo], 200);
    }
    public function checkEmailtest()
    {
        $email = 'rupakgupta265@gmail.com';
        $data = [
            'token' => 'Testing',
            'emailId' => $email
        ];
        $email = 'rupakgupta265@gmail.com';
        Mail::send('SendMail.testmail', $data, function ($message) use ($email) {
            $message->to($email)
                ->subject("Test Mail");
            //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
            $message->from('info@naukriyan.com', "Naukriyan.com");
        });
    }
    public function update_others_detail(Request $request){
       
        $uid = Session::get('user')['id'];
        $js = Jobseeker::where('id', $uid)->first();
        //save in jobseeker table
        $js->nationality = $request->nationality;
        $js->aadhar_no = $request->aadhar_no;
        $js->designation = $request->designation;
        $js->functionalrole_id = $request->functionalrole_id;
        $js->industry_id = $request->industry_id;
        $js->exp_year = $request->exp_year;
        $js->exp_month = $request->exp_month;
        $js->job_type = $request->job_type_personal;
        $js->current_salary = $request->current_salary;
        $js->expected_salary = $request->expected_salary;
        $js->current_working_location = $request->current_working_location;
        $js->notice_period = $request->notice_period;
        $js->other_id_type = $request->other_id_type;
         $js->id_number = $request->id_number;
         $js->save();

        $updateLastModifiedDate = Jobseeker::find($uid);
        $updateLastModifiedDate->last_modified = Carbon::now();
        $updateLastModifiedDate->save();
    }
    
}
