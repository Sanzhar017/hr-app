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

    // Проверяем, был ли отправлен запрос на фильтрацию по имени
    if ($request->has('first_name')) {
      $query->where('first_name', 'like', '%' . $request->first_name . '%');
    }

    // Проверяем, был ли отправлен запрос на фильтрацию по фамилии
    if ($request->has('last_name')) {
      $query->where('last_name', 'like', '%' . $request->last_name . '%');
    }

    // Проверяем, был ли отправлен запрос на фильтрацию по отчеству
    if ($request->has('surname')) {
      $query->where('surname', 'like', '%' . $request->surname . '%');
    }

    // Проверяем, был ли отправлен запрос на фильтрацию по ID департамента
    if ($request->has('department_id')) {
      // Преобразование строки в целое число
      $departmentId = (int)$request->department_id;
      $query->where('department_id', $departmentId);
    }

    // Получаем отфильтрованные данные и передаем их в представление
    $students = $query->paginate(10);
    $departments = Department::all(); // предполагается, что у вас есть модель Department

    return view('students.index', compact('students', 'departments'));
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
