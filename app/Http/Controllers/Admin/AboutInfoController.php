<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutInfo;
use Illuminate\Http\Request;

class AboutInfoController extends Controller
{
    public function edit()
    {
        $info = AboutInfo::firstOrCreate([], [
            'career_objective' => "To commit a professional job utilizing my field of study and gain work experience for future assiduous.",
            'education_details' => [],
            'technical_skills' => [],
            'soft_skills' => [],
            'achievements' => [],
        ]);

        return view('admin.about.edit', compact('info'));
    }

    public function update(Request $request)
    {
        $info = AboutInfo::first();

        $request->validate([
            'career_objective' => 'required|string',
            'education_details' => 'nullable|array',
            'technical_skills' => 'nullable|array',
            'soft_skills' => 'nullable|array',
            'achievements' => 'nullable|array',
        ]);

        $info->update([
            'career_objective' => $request->career_objective,
            'education_details' => $request->education_details,
            'technical_skills' => $request->technical_skills,
            'soft_skills' => $request->soft_skills,
            'achievements' => $request->achievements,
        ]);

        return redirect()->back()->with('success', 'About information updated successfully.');
    }
}
