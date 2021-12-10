<?php

namespace App\Http\Controllers;

use App\Models\Modules;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('back.dashboard');

    }

    public function list()
    {
        $module = Modules::where('slug', getPageUrl())->first();
        return view('back.list')->with('module', $module);
    }

    public function detail()
    {

    }

    public function detail_post(Request $request)
    {

    }
}
