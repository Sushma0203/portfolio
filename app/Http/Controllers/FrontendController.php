<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeInfo;
use App\Models\AboutInfo;
use App\Models\Gallery;
use App\Models\Project;

class FrontendController extends Controller
{
    public function home()
    {
        $info = HomeInfo::first() ?? new HomeInfo([
            'hero_title' => "Hello, I'm Sushma Thapa",
            'hero_subtitle' => "Laravel Developer",
            'typed_strings' => ["Laravel Developer", "Frontend Designer", "Tech Enthusiast"],
        ]);
        return view('frontend.home', compact('info'));
    }

    public function about()
    {
        $info = AboutInfo::first() ?? new AboutInfo([
            'career_objective' => "To commit a professional job utilizing my field of study and gain work experience for future assiduous.",
        ]);
        return view('frontend.about', compact('info'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function gallery()
    {
        $images = Gallery::latest()->get();
        return view('frontend.gallery', compact('images'));
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('frontend.project', compact('projects'));
    }
}
