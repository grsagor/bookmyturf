<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Helper;
use Session;
use App\Models\User;
use App\Models\Order;


class DashboardController extends Controller
{

    public function index(){
        
    
        return view('backend.pages.dashboard');
    }
}
