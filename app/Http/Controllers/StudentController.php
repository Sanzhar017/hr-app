<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\OrderType;
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

    public function index(Request $request)
    {
      $query = Student::query();

      if ($request->filled('department')) {
        // Находим департамент по его названию
        $department = Department::where('name', $request->department_name)->first();

        // Если департамент найден, фильтруем по его идентификатору
        if ($department) {
          $query->where('department_id', $department->id);
        }
      }

      if ($request->filled('first_name')) {
        $query->where('first_name', 'like', '%' . $request->first_name . '%');
      }

      if ($request->filled('last_name')) {
        $query->where('last_name', 'like', '%' . $request->last_name . '%');
      }

      if ($request->filled('surname')) {
        $query->where('surname', 'like', '%' . $request->surname . '%');
      }

      if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
      }

      if ($request->filled('department_name')) {
        $department = Department::where('name', $request->department_name)->first();

        if ($department) {
          $query->where('department_id', $department->id);
        }
      }

      $students = $query->paginate(10);

      return view('students.index', compact('students'));
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

    return redirect()->route('students.index')->with('success', 'Қызметкер сәтті құрылды');
  }

  public function show(Student $student)
  {
    return view('students.show', ['student' => $student]);
  }

  public function edit(Student $student)
  {
    $statuses = Status::all();
    $departments = Department::all();

    return view('students.edit', ['student' => $student,'statuses' => $statuses, 'departments' => $departments]);
  }

  public function update(Request $request, Student $student)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'phone_number' => 'required|string|max:100',
      'date_of_birth' => 'required|date',
      'nationality' => 'required|string|max:100',
      'job_title' => 'required|string|max:255',
      'status_id' => 'required|integer|exists:statuses,id',
      'department_id' => 'required|integer|exists:departments,id',
    ]);

    $student->update($validatedData);

    return redirect()->route('students.index')->with('success', 'Қызметкер сәтті жаңартылды');
  }

  public function destroy(Student $student)
  {
    $student->delete();
    return redirect()->route('students.index')->with('success', 'Қызметкер сәтті жойылды');
  }



}
