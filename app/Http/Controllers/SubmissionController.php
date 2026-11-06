<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Area;
use App\Models\PropertySubmission;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmissionController extends Controller
{
    public function create()
    {
        $types = PropertyType::where('is_active', true)->get();
        $areas = Area::where('type', 'district')->orderBy('name')->get();
        $agents = Agent::where('status', 'active')->orderBy('name')->get();

        return view('submissions.create', compact('types', 'areas', 'agents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submitter_name' => 'required|string|max:100',
            'submitter_phone' => 'required|string|max:20',
            'submitter_email' => 'nullable|email',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'listing_type' => 'required|in:sale,rent',
            'property_type_id' => 'required|exists:property_types,id',
            'area_id' => 'required|exists:areas,id',
            'address' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'land_area' => 'nullable|integer|min:0',
            'building_area' => 'nullable|integer|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'agent_id' => 'required|exists:agents,id',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // Max 5MB
        ]);

        // Simpan foto sementara (Fase 1)
        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('submissions/temp', 'public');
                $photoPaths[] = $path;
            }
        }

        // Buat Submission
        $submission = PropertySubmission::create([
            'submitted_by' => auth()->id(), // Null jika guest
            'agent_id' => $validated['agent_id'],
            'submitter_name' => $validated['submitter_name'],
            'submitter_phone' => $validated['submitter_phone'],
            'submitter_email' => $validated['submitter_email'] ?? null,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'listing_type' => $validated['listing_type'],
            'property_type_id' => $validated['property_type_id'],
            'area_id' => $validated['area_id'],
            'address' => $validated['address'],
            'price' => $validated['price'] ?? 0,
            'land_area' => $validated['land_area'] ?? 0,
            'building_area' => $validated['building_area'] ?? 0,
            'bedrooms' => $validated['bedrooms'] ?? 0,
            'bathrooms' => $validated['bathrooms'] ?? 0,
            'photo_paths' => $photoPaths,
            'status' => 'pending',
        ]);

        return redirect()->route('submissions.success', $submission->submission_code);
    }

    public function success($code)
    {
        $submission = PropertySubmission::where('submission_code', $code)->with('agent')->firstOrFail();
        return view('submissions.success', compact('submission'));
    }
}
