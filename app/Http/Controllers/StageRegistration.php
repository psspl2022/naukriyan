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
}
