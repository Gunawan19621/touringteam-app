<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard',
        ];
        return view('pages.admin.index', $data);
    }
}
