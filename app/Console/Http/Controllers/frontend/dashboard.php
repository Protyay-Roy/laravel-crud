<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dash () {

        $totalUser = User::count();
        if($totalUser <= 9){
            $totalUser = '0'.$totalUser;
        };
        
        return view('admin.dashboard.dashboard',compact('totalUser'));
    }
}
