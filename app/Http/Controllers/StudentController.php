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
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:students',
      'phone_number' => 'required|string|max:100',
      'date_of_birth' => 'required|date',
      'nationality' => 'required|string|max:100',
      'job_title' => 'required|string|max:255',
      'status_id' => 'required|exists:statuses,id',
      'department_id' => 'required|exists:departments,id',
    ]);

    $student = Student::create($validatedData);

    return redirect()->route('students.index')->with('success', 'Student created successfully');
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
