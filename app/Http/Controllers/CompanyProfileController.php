<?php

namespace App\Http\Controllers;

class CompanyProfileController extends Controller
{
    public function beli()
    {
        return view('company_profile.navbar_page.beli.index');
    }

    public function jual()
    {
        return view('company_profile.navbar_page.jual.index');
    }

    public function cariAgent()
    {
        return view('company_profile.navbar_page.cari_agent.index');
    }

    public function kpr()
    {
        return view('company_profile.navbar_page.kpr.index');
    } 

    public function panduan()
    {
        return view('company_profile.navbar_page.panduan.index');
    }

    public function lainnya()
    {
        return view('company_profile.navbar_page.lainnya.index');
    }
}
