<?php

namespace App\Http\Controllers;

class CompanyProfileController extends Controller
{
    /**
     * Halaman Company Profile
     * URL: /company-profile
     */
    public function index()
    {
        return view('company_profile.index');
    }

    /**
     * Halaman Tim Kami
     * URL: /tim-kami
     */
    public function team()
    {
        return view('company_profile.team');
    }

    /**
     * Halaman Karier
     * URL: /karier
     */
    public function career()
    {
        return view('company_profile.career');
    }
}
