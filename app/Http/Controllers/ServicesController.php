<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $categories = Category::with('services')->get();
        return view('pages.services.services', compact('categories'));
    }
    public function details($id)
    {
        $service = Service::findOrFail($id);
        return view('pages.services.detail', compact('service'));
    }
}
