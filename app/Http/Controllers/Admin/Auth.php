<?php
namespace App\Http\Controllers\Admin;

use App\Mail\ForgotPasswordMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Auth extends Controller
{
    public function __construct()
    {
        
    }

    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function verifyLogin(Request $request)
    {
        $status = 1;
        $msg = "";
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $rememberMe = $request->has('remember_me'); 

        $admin = Admin::where('email', $email)->where('is_delete', false)->first();
        if(empty($admin)){
            $status = 2;
            $msg = "There is no account associated with this email.";
        }else{
            if(!password_verify($password, $admin->password)){
                $status = 3;
                $msg = "Invalid Password.";
            }else{
                Session()->put('is_login', true);
                Session()->put('admin_id', $admin->id);
                Session()->put('admin_name', $admin->name);
                Session()->put('admin_email', $admin->email);
                Session()->put('admin_role', $admin->role);

                $data = [
                    'last_login' => date('Y-m-d H:i:s'), // Converts to '2026-05-31 16:59:07'
                    'last_login_ip' => (string) $request->ip() ?? null , // Ensures it passes as a clean string
                ];
                Admin::where('id', $admin->id)->update($data);

                $cookieData = [
                    'admin_id' => $admin->id,
                    'admin_name' => $admin->name,
                    'admin_email' => $admin->email,
                    'admin_role' => $admin->role,
                ];

                if ($rememberMe) {
                    // Set a cookie to remember the user
                    cookie()->queue('admin_data', json_encode($cookieData), 60 * 24 * 30); // 30 days
                } else {
                    // Clear the cookie if "Remember Me" is not checked
                    cookie()->queue(cookie()->forget('admin_data'));
                }
            }
        }
       

        // For demonstration, we'll just return the received data
        return response()->json([
            'status' => $status,
            'message' => $msg,
        ]);
    }

    public function logout(Request $request)
    {
        Session()->flush();
        cookie()->queue(cookie()->forget('admin_data'));
        return redirect()->route('admin.login');
    }

    public function ForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = Admin::where('email', $email)->where('is_delete', false)->first();

        if (!$user) {
            return response()->json([
                'status' => 2,
                'message' => "There is no account associated with this email.",
            ]);
        }

        $token = Str::random(16);

        $user->reset_password_token = $token;
        $user->reset_password_token_expiry = date('Y-m-d H:i:s', strtotime('+60 minutes'));
        $user->save();

        dd($user->email);
        try {
            Mail::to($user->email)->send(new ForgotPasswordMail($user->name, $token, config('app.name'), $user->email));
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => "Forgot password email could not be sent. Please try again later.",
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'status' => 1,
            'message' => "Password reset link has been sent to your email.",
        ]);
    }
}