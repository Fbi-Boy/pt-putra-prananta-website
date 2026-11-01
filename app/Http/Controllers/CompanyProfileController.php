<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        // Cukup arahkan ke 1 file view
        return view('company_profile.index');
    }
}
