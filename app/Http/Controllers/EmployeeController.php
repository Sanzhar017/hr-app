<?php

namespace App\Http\Controllers;

use App\Http\Requests\employeeRequest;
use App\Models\Department;
use App\Models\OrderType;
use App\Models\Status;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateemployeeRequest;

class EmployeeController extends Controller
{
  protected $employee;

  public function __construct(Employee $employee)
  {
    $this->employee = $employee;
  }

    public function index(Request $request)
    {
      $query = Employee::query();

      if ($request->filled('department')) {
        $department = Department::where('name', $request->department_name)->first();

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
        $departmentName = $request->department_name;

        $departments = Department::where('name', 'LIKE', '%' . $departmentName . '%')->pluck('id');

        $query->whereIn('department_id', $departments);
      }

      $employees = $query->paginate(10);

      return view('employees.index', compact('employees'));
    }


  public function create()
  {
    $statuses = Status::all();
    $departments = Department::all();
    return view('employees.create', ['statuses' => $statuses, 'departments' => $departments]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'surname' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:employees',
      'phone_number' => 'required|string|max:100',
      'date_of_birth' => 'required|date',
      'nationality' => 'required|string|max:100',
      'job_title' => 'required|string|max:255',
      'status_id' => 'required|exists:statuses,id',
      'department_id' => 'required|exists:departments,id',
    ]);

    $employee = Employee::create($validatedData);

    return redirect()->route('employees.index')->with('success', 'Сотрудник успешно создан');
  }

  public function show(Employee $employee)
  {
    return view('employees.show', ['employee' => $employee]);
  }

  public function edit(Employee $employee)
  {
    $statuses = Status::all();
    $departments = Department::all();

    return view('employees.edit', ['employee' => $employee,'statuses' => $statuses, 'departments' => $departments]);
  }

  public function update(Request $request, Employee $employee)
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

    $employee->update($validatedData);

    return redirect()->route('employees.index')->with('success', 'Сотрудник успешно удален');
  }

  public function destroy(Employee $employee)
  {
    $employee->delete();
    return redirect()->route('employees.index')->with('success', 'Сотрудник успешно удален');
  }



}
