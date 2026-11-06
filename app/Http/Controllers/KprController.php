<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class KprController extends Controller
{
    public function index()
    {
        // Mengambil data bank dari database (yang aktif saja)
        // Pastikan kamu sudah menjalankan BankSeeder sebelumnya
        $banks = Bank::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('kpr.index', compact('banks'));
    }
}
