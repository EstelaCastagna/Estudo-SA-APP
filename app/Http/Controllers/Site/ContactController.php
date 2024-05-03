<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('site.contato');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function form(Request $request)
    {
        ddd($request->all());
    }

    
}
