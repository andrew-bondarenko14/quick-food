<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModerController extends Controller
{
    public function index ()
    {
        return view('layouts.moder-dashboard');
    }
}
