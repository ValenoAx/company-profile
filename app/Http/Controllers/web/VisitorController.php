<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Sandal;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //
     public function index()
    {
        $sandal = Sandal::get();
        return view('admin_web_visitor.pages.main', compact('sandal'));
    }
}
