<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Status;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
  protected $student;

  public function __construct(Student $student)
  {
    $this->student = $student;
  }

  public function index()
  {
    $students = $this->student->paginate(10);

    return view('students.index', ['students' => $students]);
  }

  public function create()
  {
    $statuses = Status::all();
    $departments = Department::all();
    return view('students.create', ['statuses' => $statuses, 'departments' => $departments]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'student_id' => 'required|exists:students,id',
      'order_type_id' => 'required|exists:order_types,id',
      'order_number' => 'required|integer',
      'order_date' => 'required|date',
      'title' => 'required|string|max:255',
      'old_status_id' => 'required|exists:statuses,id',
      's_status_id' => 'required|exists:statuses,id',
    ]);

    $student = Student::create($validatedData);

    return redirect()->route('students.index')->with('success', 'Staff created successfully');
  }

  public function show(Student $student)
  {
    return view('students.show', ['student' => $student]);
  }

  public function edit(Student $student)
  {
    return view('students.edit', ['student' => $student]);
  }

  public function update(UpdateStudentRequest $request, Student $student)
  {
    $validatedData = $request->validated();
    $student->update($validatedData);
    return redirect()->route('students.index')->with('success', 'Staff updated successfully');
  }

  public function destroy(Student $student)
  {
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Staff deleted successfully');
  }



}
