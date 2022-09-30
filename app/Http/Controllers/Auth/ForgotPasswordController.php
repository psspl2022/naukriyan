<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobseeker;
use App\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\AllUser;
use App\Consultant;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgetPassword(Request $request)
    {
        
        $role = $request->data['role'];
        $email = $request->data['email'];


        if ($role === 'Jobseeker') {
            $checkEmail = Jobseeker::where('email', $email)->where('user_type', $role)->first();
            if (!$checkEmail) {
                return response()->json(['status' => 'error', 'messages' => $email], 200);
            }
        }

        if ($role === 'Employer') {
            $checkEmail = AllUser::where('email', $email)->where('user_type', $role)->first();
            if (!$checkEmail) {
                return response()->json(['status' => 'error', 'messages' => $email], 200);
            }
        }

        if ($role === 'Consultant') {
            $checkEmail = Consultant::where('email', $email)->first();
            if (!$checkEmail) {
                return response()->json(['status' => 'error', 'messages' => $email], 200);
            }
        }

        //create a new token to be sent to the user.
        DB::table('reset_passwords_user')->insert([
            'email' => $email,
            'user_type' => $role,
            'token' => str_random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('reset_passwords_user')->where('email', $email)->where('status', 0)->first();

        $data = [
            'token' => $tokenData->token,
            'emailId' => $email,
        ];

        Mail::send('SendMail.reset-passworduser', ['userData' => $data], function ($message) use ($email) {
            $message->to($email)
                ->subject("Password Reset Link");
            //$message->from(env('MAIL_USERNAME'),"Naukriyan.com");
            $message->from(env('TEST_USEREMAIL'), "Naukriyan.com");
        });

        return response()->json(['status' => 'success', 'messages' => $email], 200);
    }

    public function forgetPasswordForm($token)
    {
        return view('reset-password-user')->with(['token' => $token]);
    }

    public function forgetPasswordStore(Request $request)
    {

        
        $password = $request->password;
        $token = $request->urlToken;
        $password = Hash::make($password);

        // CHECK TOKEN IS EXIST
        $checkToken = DB::table('reset_passwords_user')->where('token', $token)->where('status', 0)->first();

        if (!$checkToken) {
            return back()->with(['status' => 'error', 'messages_error' => 'Token mismatch or password already reset.']);
        }

        // TOKEN EXPIRY CHECK
        $tokenExpiry = DB::table('reset_passwords_user')->where('token', $token)->where('status', 0)->where('created_at', '>', Carbon::now()->subHours(1))->first();

        if (!$tokenExpiry) {
            return back()->with(['status' => 'error', 'messages' => 'Token Expire']);
        }

        $updateResetPassword = '';

        if ($tokenExpiry->user_type == 'Jobseeker') {
            $updateResetPassword = Jobseeker::where('email', $checkToken->email)->update(['password' => $password]);
        } else if ($tokenExpiry->user_type == 'Employer') {
            $updateResetPassword = AllUser::where('email', $checkToken->email)->where('user_type', $tokenExpiry->user_type)->update(['password' => $password]);
        } else if ($tokenExpiry->user_type == 'Consultant') {
            $updateResetPassword = Consultant::where('email', $checkToken->email)->update(['password' => $password]);
        }

        if (!$updateResetPassword) {
            return redirect()->back()->with(['status' => 'error', 'messages' => 'Something went wrong.'], 201);
        }

        DB::table('reset_passwords_user')->where('token', $token)->update(['status' => 1]);
        return redirect()->back()->with(['status' => 'success', 'messages' => 'Your password has been changed Successfully.'], 200);
    }
}
