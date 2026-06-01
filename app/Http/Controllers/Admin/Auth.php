<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ForgotPasswordMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Auth extends Controller
{
    public function __construct() {}

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
        if (empty($admin)) {
            $status = 2;
            $msg = "There is no account associated with this email.";
        } else {
            if (!password_verify($password, $admin->password)) {
                $status = 3;
                $msg = "Invalid Password.";
            } else {
                Session()->put('is_login', true);
                Session()->put('admin_id', $admin->id);
                Session()->put('admin_name', $admin->name);
                Session()->put('admin_email', $admin->email);
                Session()->put('admin_role', $admin->role);

                $data = [
                    'last_login' => date('Y-m-d H:i:s'), // Converts to '2026-05-31 16:59:07'
                    'last_login_ip' => (string) $request->ip() ?? null, // Ensures it passes as a clean string
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
        $admin = Admin::where('email', $email)->where('is_delete', false)->first();

        if (!$admin) {
            return response()->json([
                'status' => 2,
                'message' => "There is no account associated with this email.",
            ]);
        }

        $token = Str::random(16);

        $admin->reset_password_token = $token;
        $admin->reset_password_token_expiry = date('Y-m-d H:i:s', strtotime('+60 minutes'));
        $admin->save();


        try {
            Mail::to($admin->email)->send(new ForgotPasswordMail($admin->name, $token, config('app.name'), $admin->email));
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

    public function resetPassword(Request $request)
    {
        if ($request->isMethod('get')) {
            $token = $request->query('token');
            $mail = $request->query('mail');

            $admin = Admin::where('reset_password_token', $token)->where('email', $mail)->first();

            $msg = "";
            if (!$admin || $admin->reset_password_token_expiry < date('Y-m-d H:i:s')) {
                $msg = "This reset password link is expired. Please request a new one.";
            }

            return view('admin.auth.reset_password', ['token' => $token, 'mail' => $mail, 'msg' => $msg]);
        } else if ($request->isMethod('post')) {
            $request->validate([
                'token' => 'required',
                'password' => 'required|min:6',
            ]);

            $token = $request->input('token');
            $password = $request->input('password');

            $admin = Admin::where('reset_password_token', $token)
                ->where('reset_password_token_expiry', '>', date('Y-m-d H:i:s'))
                ->where('is_delete', false)
                ->first();

            if (!$admin) {
                return response()->json([
                    'status' => 2,
                    'message' => "Invalid or expired token.",
                ]);
            }

            $admin->password = Hash::make($password);
            $admin->updated_date = now();
            $admin->reset_password_token = null;
            $admin->reset_password_token_expiry = null;
            $admin->last_login = date('Y-m-d H:i:s');
            $admin->last_login_ip = (string) $request->ip() ?? null;
            $admin->save();

            Session()->put('is_login', true);
            Session()->put('admin_id', $admin->id);
            Session()->put('admin_name', $admin->name);
            Session()->put('admin_email', $admin->email);
            Session()->put('admin_role', $admin->role);

            return response()->json([
                'status' => 1,
                'message' => "Your password has been reset successfully.",
            ]);
        }
    }
}
