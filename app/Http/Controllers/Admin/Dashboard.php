<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class Dashboard extends Controller
{
    public function __construct() {}

    public function index()
    {
        $meta_data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
        ];
        return view('Admin.Dashboard.index')->with('meta_data', $meta_data);
    }
}
