<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobseeker;
use App\JsEducationalDetail;
use App\JsProfessionalDetail;
use App\JsResume;
use App\JsCertification;
use App\JsSkill;
use App\Institute;
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
                        'salary' => $request->salary[$i],
                        'sal_confidential' => $request->sal_confidential[$i],
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
                $js_professional->salary = $request->salary[$i];
                $js_professional->sal_confidential = !empty($request->sal_confidential[$i])?$request->sal_confidential[$i]:'0';
                $js_professional->responsibility = $request->responsibility[$i];
                $js_professional->save();
                ++$create;
            }
        }
        if ($create > 0 || $update > 0) {
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->professional_stage = $request->professional_experience;
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

            if (!empty($request->index[$i])) {
                JsCertification::where('id', $request->index[$i])
                    ->update([
                        'course' =>  $request->courseName[$i],
                        'certificate_institute_name' => $request->instituteName[$i],
                        'certification_type' => $request->certficationtype[$i],
                        'cert_from_date' => $request->fromdate[$i],
                        'cert_to_date' => $request->todate[$i],
                        'grade' => $request->score[$i],
                        'description' => $request->description[$i],
                        'certificate_link' => $request->certificate_link[$i]
                    ]);
                ++$update;
                // return $request->all();
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
                $js_certificate->certificate_link = $request->certificate_link[$i];
                $js_certificate->save();
                ++$create;
            }
        }
        if ($create > 0 || $update > 0) {
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        }
        return $request->all();
    }
    public function   addCertificate(Request $request)
    {
        $uid = 2;
        if (!$request->certificate) {
            $certificate = JsCertification::where('certificate', 1)->where('js_userid', $uid)->get();
            // return count($certificate);
            if (count($certificate) == 0) {
                $js_certificate = new JsCertification();
                $js_certificate->js_userid = $uid;
                $js_certificate->certificate = "1";
                $js_certificate->save();
                $updateLastModifiedDate = Jobseeker::find($uid);
                $updateLastModifiedDate->last_modified = Carbon::now();
                $updateLastModifiedDate->save();
            }
            $updateLastModifiedDate = Jobseeker::find($uid);
            $updateLastModifiedDate->last_modified = Carbon::now();
            $updateLastModifiedDate->save();
        } else {
            $certificate = JsCertification::where('js_userid', $uid)->get();
            if (count($certificate) == 0) {
                $data = Jobseeker::select('savestage')->where('id', $uid)->get();
                $savestage = $data[0]->savestage;
                Jobseeker::where('id', $uid)->update(['savestage' => ($savestage - 1)]);
            }
            JsCertification::where('certificate', 1)->where('js_userid', $uid)->delete();
        }
    }
    public function getProfessionalDetail()
    {
        $uid = 2;
        $data = JsProfessionalDetail::where('js_userid', 2)->get();
        $professional_stage = Jobseeker::select('professional_stage')->where('id', $uid)->first();
        return  ['data' => $data->all(), 'professional_stage' => $professional_stage];
    }
    public function getCertificationDetail()
    {
        $uid = 2;
        $count = JsCertification::where('certificate', 1)->where('js_userid', $uid)->get();
        // return ;
        if (count($count) > 0) {
            $data = JsCertification::select('certificate')->where('js_userid', 2)->where('certificate', 1)->get();
            return  $data[0]->certificate;
        } else {
            $data = JsCertification::where('js_userid', $uid)->get();
            return  $data->all();
        }
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
            'linkedin' => $req->linkedin,
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
            'linkedin',
            'gender',
            'dob',
            'exp_year',
            'exp_month',
            'industry_id',
            'functionalrole_id',
            'profile_pic_thumb',
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
