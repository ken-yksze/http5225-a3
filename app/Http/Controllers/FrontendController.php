<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Members;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function classes()
    {
        $classes = Classes::whereNull('deleted_at')->get();
        return view('frontend.classes', compact('classes'));
    }

    public function classMembers()
    {
        $members = Members::whereNull('allocation_deleted_at')
            ->whereNotNull('class_id')
            ->with('class')
            ->get();
        return view('frontend.class_members', compact('members'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
