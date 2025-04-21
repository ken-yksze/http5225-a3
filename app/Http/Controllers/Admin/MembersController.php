<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::whereNull('deleted_at')->get();
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(MemberRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('', 'public');
        }
        Members::create($data);
        return redirect()->route('admin.members')->with('success', 'Member added successfully');
    }

    public function edit(Members $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(MemberRequest $request, Members $member)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::disk('public')->delete($member->image);
            }
            $data['image'] = $request->file('image')->store('', 'public');
        }
        $member->update($data);
        return redirect()->route('admin.members')->with('success', 'Member updated successfully');
    }

    public function destroy(Members $member)
    {
        if ($member->image) {
            Storage::disk('public')->delete($member->image);
        }
        $member->delete();
        return redirect()->route('admin.members')->with('success', 'Member deleted successfully');
    }
}
