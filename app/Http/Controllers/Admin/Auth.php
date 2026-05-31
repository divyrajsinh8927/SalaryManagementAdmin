<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
                // Session()->put('admin_id', $admin->id);
                // Session()->put('admin_name', $admin->name);
                // Session()->put('admin_email', $admin->email);
                // Session()->put('admin_role', $admin->role);
            }
        }
       

        // For demonstration, we'll just return the received data
        return response()->json([
            'status' => $status,
            'message' => $msg,
        ]);
    }
}