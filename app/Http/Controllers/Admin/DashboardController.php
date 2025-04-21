<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Members;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_members = Members::whereNull('deleted_at')->count();
        $total_classes = Classes::whereNull('deleted_at')->count();

        $recent_member = Members::whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->first();

        $recent_class = Classes::whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->first();

        $recent_assignment = Members::whereNull('members.deleted_at')
            ->whereNull('members.allocation_deleted_at')
            ->whereNull('classes.deleted_at')
            ->join('classes', 'members.class_id', '=', 'classes.class_id')
            ->select('members.name as member_name', 'classes.class_name', 'members.created_at')
            ->orderBy('members.created_at', 'desc')
            ->first();

        return view('admin.dashboard', compact('total_members', 'total_classes', 'recent_member', 'recent_class', 'recent_assignment'));
    }
}
