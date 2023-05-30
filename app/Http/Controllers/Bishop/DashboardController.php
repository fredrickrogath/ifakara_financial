<?php

namespace App\Http\Controllers\Bishop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\BishopServices\BishopService;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    /*
    |--------------------------------------------------------------------------
    | protects only specific functions
    |--------------------------------------------------------------------------
    public function __construct(){
        $this->middleware('auth')->only(['functionName1', 'functionName2']);
    }
    */

    /*
    |--------------------------------------------------------------------------
    | protect all functions except specified ones
    |--------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth')->except(['functionName1', 'functionName2']);
    }
    */
    
    public function dashboard(BishopService $bishopService){
        $this->authorize('authorizeBishop', \App\Models\User::class); 
        return Inertia::render('Dashboard', $bishopService->dashboardData());
    }

    public function secretary(BishopService $bishopService){
        $this->authorize('authorizeBishop', \App\Models\User::class); 
        return Inertia::render('Dashboard', $bishopService->dashboardData());
    }

    public function accountant(BishopService $bishopService){
        $this->authorize('authorizeBishop', \App\Models\User::class); 
        return Inertia::render('Dashboard', $bishopService->dashboardData());
    }

    public function procurement(BishopService $bishopService){
        $this->authorize('authorizeBishop', \App\Models\User::class); 
        return Inertia::render('Dashboard', $bishopService->dashboardData());
    }

    public function internal_auditor(BishopService $bishopService){
        $this->authorize('authorizeBishop', \App\Models\User::class); 
        return Inertia::render('Dashboard', $bishopService->dashboardData());
    }
}
