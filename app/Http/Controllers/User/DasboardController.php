<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DasboardController extends Controller
{
    public function index(){
        return 'i am user and my name is '.Auth::user()->name;
    }
}
