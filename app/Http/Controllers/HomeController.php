<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('services')->get();
        return view('welcome', compact('categories'));
    }
    public function pie()
    {
        return view('pie');
    }
    public function peri()
    {
        return view('peri');
    }
}
