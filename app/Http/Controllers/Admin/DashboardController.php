<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $galleryCount = Gallery::count();
        $projectCount = Project::count();
        $messageCount = Contact::count();

        return view('admin.dashboard', compact('galleryCount', 'projectCount', 'messageCount'));
    }
}
