<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeInfo;
use Illuminate\Http\Request;

class HomeInfoController extends Controller
{
    public function edit()
    {
        $info = HomeInfo::firstOrCreate([], [
            'hero_title' => "Hello, I'm Sushma Thapa",
            'hero_subtitle' => "Laravel Developer",
            'typed_strings' => ["Laravel Developer", "Frontend Designer", "Tech Enthusiast"],
            'education' => [],
            'skills' => [],
            'achievements' => [],
        ]);

        return view('admin.home.edit', compact('info'));
    }

    public function update(Request $request)
    {
        $info = HomeInfo::first();

        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'typed_strings' => 'required|array',
            'education' => 'nullable|array',
            'skills' => 'nullable|array',
            'achievements' => 'nullable|array',
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($info->profile_image && file_exists(public_path($info->profile_image))) {
                unlink(public_path($info->profile_image));
            }

            $image = $request->file('profile_image');
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $name);
            $info->profile_image = 'img/' . $name;
        }

        $info->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'typed_strings' => $request->typed_strings,
            'education' => $request->education,
            'skills' => $request->skills,
            'achievements' => $request->achievements,
        ]);

        return redirect()->back()->with('success', 'Home information updated successfully.');
    }
}
