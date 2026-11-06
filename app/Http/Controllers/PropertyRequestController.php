<?php

namespace App\Http\Controllers;

use App\Models\PropertyRequest;
use Illuminate\Http\Request;

class PropertyRequestController extends Controller
{
    public function store(Request $request)
    {
        // Validasi Backend (sebagai pengaman ganda)
        $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|regex:/^(\+?62|0)8\d{7,12}$/',
            'job' => 'required',
            'type' => 'required',
            'location' => 'required|min:2',
        ]);

        // Simpan ke Database
        PropertyRequest::create([
            'purpose' => $request->purpose,
            'type' => $request->type,
            'location' => $request->location,
            'budget_min' => $request->budget_min ?: null,
            'budget_max' => $request->budget_max ?: null,
            'bedrooms' => $request->bedrooms ?: null,
            'bathrooms' => $request->bathrooms ?: null,
            'land_min' => $request->land_min ?: null,
            'certificate' => $request->certificate,
            'features' => $request->features ?? [],
            'payment' => $request->payment,
            'notes' => $request->notes,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'job' => $request->job,
            'contact_time' => $request->contact_time,
        ]);

        // Kembalikan response JSON agar ditangkap oleh AJAX/Fetch di Alpine.js
        return response()->json(['message' => 'Permintaan berhasil dikirim.'], 200);
    }
}
