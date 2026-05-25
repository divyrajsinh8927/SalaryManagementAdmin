<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('Admin.Dashboard.index');
    }
}
