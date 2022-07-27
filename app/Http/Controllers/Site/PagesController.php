<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if($page) {
            return view('site.page', compact('page'));
        } else {
            abort(404);
        }
    }
}
