<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Status;
use App\Models\Student;
use App\Models\StudentOrder;
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
      $students = $this->student->paginateWithQueryString(10);

      return view('content.pages.pages-home', ['students' => $students]);
    }

    public function create()
    {
      $statuses = Status::all();

      return view('students.create', ['statuses' => $statuses]);
    }

    public function store(StudentRequest $request)
    {
      $validatedData = $request->validated();
      $this->student->createStudent($validatedData);

      return redirect()->route('students.index')->with('success', 'Student created successfully');
    }


    public function show(Student $student)
    {
      return view('students.show', ['student' => $student]);
    }


    public function edit( $student)
    {
      $student = $this->student->findOrFail($student);
      return view('students.edit', ['student' => $student]);
    }

  public function update(UpdateStudentRequest $request, Student $student)
  {
    $validatedData = $request->validated();

    $student->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Student updated successfully');
  }

    public function destroy($student)
    {
      $this->student->destroyStudent($student);

      return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

}
