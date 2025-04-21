<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Classes::whereNull('deleted_at')->get();
        return view('admin.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.classes.create');
    }

    public function store(ClassRequest $request)
    {
        Classes::create($request->validated());
        return redirect()->route('admin.classes')->with('success', 'Class added successfully');
    }

    public function edit(Classes $class)
    {
        return view('admin.classes.edit', compact('class'));
    }

    public function update(ClassRequest $request, Classes $class)
    {
        $class->update($request->validated());
        return redirect()->route('admin.classes')->with('success', 'Class updated successfully');
    }

    public function destroy(Classes $class)
    {
        $class->delete();
        return redirect()->route('admin.classes')->with('success', 'Class deleted successfully');
    }
}
