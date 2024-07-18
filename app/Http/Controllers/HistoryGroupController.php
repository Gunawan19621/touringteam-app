<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_Group;

class HistoryGroupController extends Controller
{
    public function index()
    {
        $data = [
            'groups' => T_Group::where('status', 'inactive')->get(),
            'active' => 'historyGroups',
        ];
        return view('pages.admin.group-touring.history-group.index', $data);
    }
}