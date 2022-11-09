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

class vaildationController extends Controller
{

    public function getContact($num)
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;
        // 'email' => $req->email,
        // 'contact' => $req->contact_no,
        $data = Jobseeker::where('id', '!=', $userId)->where('contact', $num)->get();

        return  count($data);
    }
    public function getEmail($num)
    {
        //dd($request->all());
        // $userId = Session::get('user')['id'];
        $userId = 2;
        // 'email' => $req->email,
        // 'contact' => $req->contact_no,
        $data = Jobseeker::where('id', '!=', $userId)->where('email', $num)->get();

        return  count($data);
    }
}
