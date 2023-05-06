<?php

namespace App\Http\Controllers\InternalAuditor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Services\InternalAuditorServices\InternalAuditorService;

class DashboardController extends Controller
{
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

    public function dashboard(InternalAuditorService $internalAuditorService){
        $this->authorize('authorizeInternalAuditor', \App\Models\User::class); 
        return Inertia::render('Dashboard', $internalAuditorService->dashboardData());
    }

    public function audits(InternalAuditorService $internalAuditorService){
        $this->authorize('authorizeInternalAuditor', \App\Models\User::class); 
        return Inertia::render('Dashboard', $internalAuditorService->dashboardData());
    }

    // public function staffs(InternalAuditorService $internalAuditorService){
    //     $this->authorize('authorizeInternalAuditor', \App\Models\User::class); 
    //     return Inertia::render('Dashboard', $internalAuditorService->dashboardData());
    // }

    public function reports(InternalAuditorService $internalAuditorService){
        $this->authorize('authorizeInternalAuditor', \App\Models\User::class); 
        return Inertia::render('Dashboard', $internalAuditorService->dashboardData());
    }
}
