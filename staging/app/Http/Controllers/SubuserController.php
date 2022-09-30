<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AllUser;
use Auth;
use Session;
use Hash;
use DB;

class SubuserController extends Controller
{
    public function index() {
         $uid = Session::get('user')['id'];
         $data= DB::table('all_users')
            ->Where('subuser_created_by', $uid)
            ->Where('user_type', 'SubUser')
            ->OrderBy('created_at', 'DESC')
            ->get();

        return response()->json(['data' => $data], 200);
    }

    public function store(Request $request) {
       $subuser = New Alluser();
       $uid = Session::get('user')['id'];
       $subuser->fname = $request->fname;
       $subuser->lname = $request->lname;
       $subuser->email = $request->email;
       $subuser->contact = $request->contact;
       $enc_password = $request->password;
       $subuser->password = Hash::make($enc_password);
       $subuser->designation = $request->designation;
       $subuser->aadhar_no = $request->aadhar_no;
       $subuser->gender = $request->gender;
       $subuser->user_type = "SubUser";
       $subuser->subuser_created_by = $uid;
       $subuser->save();
    }

    public function getsinglesubuser($id) {
        $subuser = Alluser::find($id);
        return $subuser;
    }

    public function update(Request $request, $id) {
       $subuser = Alluser::find($id);
       $subuser->fname = $request->fname;
       $subuser->lname = $request->lname;
       $subuser->email = $request->email;
       $subuser->contact = $request->contact;
       $subuser->password = $request->password;
       $subuser->designation = $request->designation;
       $subuser->aadhar_no = $request->aadhar_no;
       $subuser->gender = $request->gender;
       $subuser->user_type = "SubUser";
       $subuser->save();
    }

    public function deactive($id)
    {
        $alluser = AllUser::find($id);
        $alluser->active = "No";
        $data= DB::table('all_users')
            ->select('id','email','fname','contact','user_type')
            ->where('id', $id)
            ->first();

          $myArray = json_decode(json_encode($data), true);
            $to = $myArray['email'];
            $name=$myArray['fname'];
            $mobile=$myArray['contact'];
            $user_type=$myArray['user_type'];

            //$mobile=$myArray['company_name'];
            //$company_name=$myArray['company_name'];

            /*if($to!="")
            {

              Mail::to($to)->send(new DeactiveEmployer($name));    //same for active consultant
            }
//send sms
 $api_key = '35CD26D870005C';
//$mobile = $myArray['mobile'];
$from = 'NAUKRY';
$msg="Dear ". $name." ,
Your ".$user_type." Account Now De-activated.
For Any help just revert your message to admin@naukriyan.com.
Best of luck.
Team
Naukriyan.com";
$sms_text = urlencode($msg);



//Submit to server
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://sms.sbcinfotech.com/app/smsapi/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=7246&routeid=100922&type=text&contacts=".$mobile."&senderid=".$from."&msg=".$sms_text);
$response = curl_exec($ch);
curl_close($ch);
echo $response;*/
//sms close
        $alluser->save();
    }
    public function active($id)
    {
        $alluser = AllUser::find($id);
        $alluser->active = "Yes";
        $data= DB::table('all_users')
            ->select('id','email','fname','contact','user_type')
            ->where('id', $id)
            ->first();

            $myArray = json_decode(json_encode($data), true);
            $to = $myArray['email'];
            $name=$myArray['fname'];
            $mobile=$myArray['contact'];
            $user_type=$myArray['user_type'];

           /* if($to!="")
            {

              Mail::to($to)->send(new ActiveEmployer($name));    //same for active consultant
            }
            $api_key = '35CD26D870005C';
//$mobile = $myArray['mobile'];
$from = 'NAUKRY';
$msg="Dear ". $name." ,
Your ".$user_type." Account Now Activated Successfully.
For Any help just revert your message to admin@naukriyan.com.
Best of luck.
Team
Naukriyan.com";
$sms_text = urlencode($msg);



//Submit to server
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://sms.sbcinfotech.com/app/smsapi/index.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&campaign=7246&routeid=100922&type=text&contacts=".$mobile."&senderid=".$from."&msg=".$sms_text);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
//sms close*/
        $alluser->save();
    }
}
