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
use App\Institute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class StageRegistration extends Controller
{
    public function addProfessionalDetail(Request $request)
    {
        // $uid = Session::get('user')['id'];
        // $data = [];
        $uid = 2;
        $update = 0;
        $create = 0;
        for ($i = 0; $i < $request->total; $i++) {

            if ($request->index[$i] != null) {
                JsProfessionalDetail::where('id', $request->index[$i])
                    ->update([
                        'designations' =>  $request->designation[$i],
                        'organisation' => $request->organization[$i],
                        'job_type' => $request->jobtype[$i],
                        'from_date' => $request->fromdate[$i],
                        'to_date' => $request->todate[$i],
                        'responsibility' => $request->responsibility[$i]
                    ]);
                ++$update;
            } else {
                $js_professional = new JsProfessionalDetail();
                $js_professional->js_userid = $uid;
                $js_professional->designations = $request->designation[$i];
                $js_professional->organisation = $request->organization[$i];
                $js_professional->job_type = $request->jobtype[$i];
                // $js_professional->job_shift = $request->job_shift;
                // $js_professional->industry_name = $request->industry_name;
                // $js_professional->functional_role = $request->functional_role;
                $js_professional->from_date = $request->fromdate[$i];
                $js_professional->to_date = $request->todate[$i];
                $js_professional->responsibility = $request->responsibility[$i];
                $js_professional->save();
                ++$create;
            }
        }
        if ($create > 0 || $update > 0) {
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        }
        return ['created' => $create, 'update' => $update];
    }
    public function addCertificationDetail(Request $request)
    {
        // $uid = Session::get('user')['id'];
        // $data = [];
        // return $request->all();
        $uid = 2;
        $update = 0;
        $create = 0;
        for ($i = 0; $i < $request->total; $i++) {

            if ($request->index[$i] != null) {
                JsCertification::where('id', $request->index[$i])
                    ->update([
                        'course' =>  $request->courseName[$i],
                        'certificate_institute_name' => $request->instituteName[$i],
                        'certification_type' => $request->certficationtype[$i],
                        'cert_from_date' => $request->fromdate[$i],
                        'cert_to_date' => $request->todate[$i],
                        'grade' => $request->score[$i],
                        'description' => $request->description[$i]
                    ]);
                ++$update;
            } else {
                $js_certificate = new JsCertification();
                $js_certificate->js_userid = $uid;
                $js_certificate->course = $request->courseName[$i];
                $js_certificate->certificate_institute_name = $request->instituteName[$i];
                $js_certificate->certification_type = $request->certficationtype[$i];
                $js_certificate->cert_from_date = $request->fromdate[$i];
                $js_certificate->cert_to_date = $request->todate[$i];
                $js_certificate->grade = $request->score[$i];
                $js_certificate->description = $request->description[$i];
                $js_certificate->save();
                ++$create;
            }
        }
        if ($create > 0 || $update > 0) {
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        }
        return ['created' => $create, 'update' => $update];
    }
    public function getProfessionalDetail()
    {

        $data = JsProfessionalDetail::where('js_userid', 2)->get();
        return  $data->all();
    }
    public function getCertificationDetail()
    {

        $data = JsCertification::where('js_userid', 2)->get();
        return  $data->all();
    }
    public function deleteProfessionalDetail($id)
    {

        $data = JsProfessionalDetail::where('id', $id)->delete();
        return  $id;
    }

    public function deleteCertificationDetail($id)
    {

        $data = JsCertification::where('id', $id)->delete();
        return  $id;
    }


    public function getSkillDetail()
    {
        $data = JsSkill::where('js_userid', 2)->get();
        return  $data->all();
    }

    public function addSkillDetail(Request $req)
    {

        // $uid = Session::get('user')['id'];

        for ($i = 0; $i < count($req->skill); $i++) {

            $a = JsSkill::updateOrCreate(
                [
                    'js_userid' => 2,
                    'skill' => $req->skill[$i]
                ],
                [
                    'expert_level' => (($i < count($req->expert_level)) && ($req->expert_level[$i] != "")) ? $req->expert_level[$i] : ""
                ]
            );
        }
        return $a;
    }

    public function deleteSkillDetail($id)
    {
        $data = JsSkill::where('id', $id)->delete();
        return  $id;
    }

    public function getEducationDetail()
    {
        $data = JsEducationalDetail::where('js_userid', 2)->get();
        return  $data->all();
    }

    public function addEducationDetail(Request $req)
    {

        // $uid = Session::get('user')['id'];

        for ($i = 0; $i < $req->total; $i++) {

            $a = JsEducationalDetail::updateOrCreate(
                [
                    'js_userid' => 2,
                    'degree_name' => $req->degree[$i],
                    'course_type' => $req->course_type[$i]
                ],
                [
                    'degree_name' => $req->degree[$i],
                    'course_type' => $req->course_type[$i],
                    'percentage_grade' => $req->percentage[$i],
                    'passing_year' => $req->pass_year[$i],
                    'institute_name' => $req->ins_name[$i],
                    'institute_location' => $req->ins_loc[$i]

                ]
            );
            $ins = Institute::firstOrCreate(['name' => $req->ins_name[$i]]);
        }
        return $a;
    }

    public function deleteEducationDetail($id)
    {
        $data = JsEducationalDetail::where('id', $id)->delete();
        return  $id;
    }


    public function getStage()
    {
        // $uid = Session::get('user')['id'];
        $uid = 2;
        $data = Jobseeker::select('stage', 'savestage')->where('id', $uid)->get();
        return  $data;
    }


    public function updateStage($id)
    {
        // $uid = Session::get('user')['id'];
        $uid = 2;
        Jobseeker::where('id', $uid)->update(['stage' => $id]);
        $data = Jobseeker::select('stage', 'savestage')->where('id', $uid)->get();
        return  $data;
    }
    public function resumeUpload(Request $req)
    {

        // $userId = Session::get('user')['id'];
        $resumeup = 0;
        $userId = 2;
        $filename = time() . '.' . $req->resume->extension();
        $path = public_path() . '/resume/';
        $upload = $req->resume->move($path, $filename);

        $addressData = [
            'js_userid' => $userId,
            'resume' => $filename,
        ];

        JsResume::updateOrCreate(['js_userid' => $userId], $addressData);
        if ($upload) {
            $resumeup = 1;
        }
        return $resumeup;
    }
    public function resumeSave(Request $req)
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;
        $addressData = [
            'resume_video_link' => $req->video,
            'cover_letter' => $req->cover,
        ];

        JsResume::updateOrCreate(['js_userid' => $userId], $addressData);
        return  $req->all();
    }
    public function addPersnol(Request $req)
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;
        if (is_array($req->preferred_loc)) {

            $req->preferred_loc =  implode(',', $req->preferred_loc);
        } else {
            $req->preferred_loc = $req->preferred_loc;
        }
        $personalData = [
            'fname' => $req->fname,
            'lname' => $req->lname,
            'email' => $req->email,
            'contact' => $req->contact_no,
            'gender' => $req->gender,
            'dob' => $req->date,
            'exp_year' => $req->exp_year,
            'exp_month' => $req->exp_mon,
            'industry_id' => $req->job_industry_id,
            'functionalrole_id' => $req->job_functional_role_id,
            'preferred_location' => $req->preferred_loc,
        ];

        $data = Jobseeker::where('id', $userId)->update($personalData);
        return  $personalData;
    }
    public function getPersnol(Request $req)
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;

        $data = Jobseeker::where('id', $userId)->select(
            'fname',
            'lname',
            'email',
            'contact',
            'gender',
            'dob',
            'exp_year',
            'exp_month',
            'industry_id',
            'functionalrole_id',
            'preferred_location'
        )->get();
        return  $data;
    }
    public function resumeGet()
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;
        $data = JsResume::where('js_userid', $userId)->get();
        return $data;
    }

    public function skipStage($stage)
    {
        // $userId = Session::get('user')['id'];
        $userId = 2;

        $checkStage = Jobseeker::where('id', $userId)->select('savestage')->get();
        // return $checkStage[0]->savestage;
        if ($checkStage[0]->savestage <= $stage) {
            $data = Jobseeker::where('id', $userId)->update(['savestage' => ($stage + 1)]);
        }
        $data = Jobseeker::where('id', $userId)->update(['stage' => ($stage + 1)]);

        return $stage;
    }
}
