<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function new()
    {
        return view('new');
    }
    
    public function create()
    {
        return "test";
    }

    public function index()
    {
        $items = Job::all();
        return "test";
    }
}
