<?php

use App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;

Route::prefix('admin')->group(function () {
    // Admin Dashboard Route
    Route::get('/login', [Auth::class, 'login'])->name('admin.login');
    Route::post('/verify_login', [Auth::class, 'verifyLogin'])->name('admin.verify_login');
    Route::get('/', [Dashboard::class, 'index'])->name('admin.dashboard');
    // Add more admin routes here as needed
});

Route::get('/clear-cache', function () {
    try {
        // 1. Clears out old configuration caches to read your new .env changes
        Artisan::call('cache:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        return redirect()->route('admin.dashboard');
    } catch (\Exception $e) {
        return 'Error during execution: ' . $e->getMessage();
    }
});

Route::get('/run-migrations', function () {
    try {
        // 1. Clears out old configuration caches to read your new .env changes
        Artisan::call('config:clear');
        
        // 2. Runs all database migrations fresh
        Artisan::call('migrate:fresh');
        
        return 'Success! Database wiped, fresh migrations run, and Admin Seeder executed successfully! <br><br> Output: <pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error during execution: ' . $e->getMessage();
    }
});

Route::get('/run-admin-seeder', function () {
    try {
        // 3. Runs your DatabaseSeeders (including the Admin UserSeeder)
        Artisan::call('db:seed', [
            '--class' => 'AdminSeeder' // Make sure this matches your exact filename (e.g., AdminSeeder or UserSeeder)
        ]);
        
        return 'Success! seeder run successfully';
    } catch (\Exception $e) {
        return 'Error during execution: ' . $e->getMessage();
    }
});