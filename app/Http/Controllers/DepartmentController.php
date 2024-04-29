<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
  {
    $departments = Department::get();

    return view('departments.index', ['departments' => $departments]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('departments.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
    ]);

    Department::create([
      'name' => $request->name,
    ]);

    return redirect()->route('handbookd.index')->with('success', 'Department created successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(Department $department)
  {
    return view('departments.show', ['department' => $department]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Department $department)
  {
    return view('departments.edit', ['department' => $department]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Department $department)
  {
    $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $department->update([
      'name' => $request->name,
    ]);

    return redirect()->route('handbookd.index')->with('success', 'Department updated successfully');

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Department $department)
  {
    $department->delete();

    return redirect()->route('handbookd.index')->with('success', 'Department deleted successfully');
  }
}
