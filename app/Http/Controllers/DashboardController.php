<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // This is where you'll put the logic for your dashboard page
        return view('pages.dashboard'); // Assuming you have a dashboard.blade.php view
    }
}
