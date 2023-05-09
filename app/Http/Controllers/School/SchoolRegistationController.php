<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolRegistationController extends Controller
{
    public function __construct(){
        $this->middleware('check_screen_size');
    }
    
    //
    public function registerSchool(Request $request){

        $created = \App\Models\School::create([
            'name' => $request->name,
            'api' => $request->api_secret_key,
        ]);
        
        if($created){
            return true;
        }

        return false;
    }
}
