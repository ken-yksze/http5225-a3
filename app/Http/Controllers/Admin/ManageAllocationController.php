<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AllocationRequest;
use App\Models\Classes;
use App\Models\Members;
use Illuminate\Http\Request;

class ManageAllocationController extends Controller
{
    public function index()
    {
        $members = Members::whereNull('allocation_deleted_at')
            ->with('class')
            ->get();
        return view('admin.allocations.index', compact('members'));
    }

    public function create(Request $request)
    {
        $member = Members::findOrFail($request->query('member_id'));
        $classes = Classes::whereNull('deleted_at')->get();
        return view('admin.allocations.create', compact('member', 'classes'));
    }

    public function store(AllocationRequest $request)
    {
        $member = Members::findOrFail($request->input('member_id'));
        $member->update(['class_id' => $request->validated()['class_id'], 'allocation_deleted_at' => null]);
        return redirect()->route('admin.allocations')->with('success', 'Member assigned to class successfully');
    }

    public function edit(Members $member)
    {
        $classes = Classes::whereNull('deleted_at')->get();
        return view('admin.allocations.edit', compact('member', 'classes'));
    }

    public function update(AllocationRequest $request, Members $member)
    {
        $member->update(['class_id' => $request->validated()['class_id'], 'allocation_deleted_at' => null]);
        return redirect()->route('admin.allocations')->with('success', 'Allocation updated successfully');
    }

    public function destroy(Members $member)
    {
        $member->delete();
        return redirect()->route('admin.allocations')->with('success', 'Allocation deleted successfully');
    }
}
