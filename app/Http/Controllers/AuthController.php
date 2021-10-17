<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;


class AuthController extends Controller
{
    ############################### Register ###################################33
    // Show Form
    public function register(){
        return view('interface.auth.register');
    }

    // Create User
    public function store(Request $request){

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('login'))->with('message','Your registered, Now you can login');

    }

    ################################# Login ####################################
    // Show Form
    public function login(){
        return view('interface.auth.login');
    }

    // Login success
    public function check(Request $request){

        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('home'));
        }

        return redirect(route("login"))->with('message','Login details are not valid');
    }

    ############################ Logout #############################
    // Logout
    public function logout(Request $request){
        Auth::logout();
        return redirect(route('home'));

    }

    ########################### Password Change ###########################
    // Show Password Change Form
    public function passwrod_change(){
        return view('interface.auth.passwordchange');
    }

    // Password Change Done
    public function change_Password_confirm(Request $request){
        
        $request->validate([
          'current_password' => ['required'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'password_confirmation' => ['required'],
        ]);

        echo $request->oldpassword;

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect(route('passwordchange'))->with('message', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('passwordchange'))->with('message', 'Password successfully changed!');
    }

    ########################### Password Reset ###############################
    // Show Email Password Form
    public function show_email_password_form(){
        return view('interface.auth.passwordforget');
    }

    // Request to Send Password Reset
    public function submit_forget_password_form(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = STr::random(30);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('interface.auth.vartflyemail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    // Password Rest Link
    public function show_Reset_Password_Form($token){
        return view('interface.auth.forgetPasswordLink', ['token' => $token]);
    }

    // Reset Password Done
    public function submit_Reset_Password_Form(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
 
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect(route('login'))->with('message', 'Your password has been changed!');
    }
}
