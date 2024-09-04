<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeOrderRequest;
use App\Http\Requests\EmployeeOrderUpdateRequest;
use App\Models\OrderType;
use App\Models\Status;
use App\Models\Employee;
use App\Models\EmployeeOrder;
use Illuminate\Http\Request;

class EmployeeOrderController extends Controller
{

  public function index(Request $request)
  {
    $query = EmployeeOrder::with('employee', 'orderType', 'currentStatus')
      ->orderBy('created_at', 'desc');

    if ($request->has('search') && !empty($request->search)) {
      $search = $request->input('search');
      $query->whereHas('employee', function($q) use ($search) {
        $q->where('first_name', 'like', "%{$search}%")
          ->orWhere('last_name', 'like', "%{$search}%");
      });
    }

    $orders = $query->paginate(10);

    return view('orders.index', ['orders' => $orders]);
  }



  public function create()
    {
        $employees = Employee::get();
        $orderTypes = OrderType::get();
        $statuses = Status::get();

        return view('orders.create',  ['employees' => $employees, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
    }

  public function store(employeeOrderRequest $request)
  {
    $validatedData = $request->validated();
    $employeeIds = $validatedData['employee_id'];

    $dataToInsert = [];
    foreach ($employeeIds as $employeeId) {
      $dataToInsert[] = ['employee_id' => $employeeId] + $validatedData;
    }

    Employee::whereIn('id', $employeeIds)->update(['status_id' => $validatedData['s_status_id']]);

    EmployeeOrder::insert($dataToInsert);

    return redirect()->route('orders.index')->with('success', 'Служебный заказ успешно создан');

  }


  public function show(EmployeeOrder $order)
    {
      return view('orders.show', ['order' => $order]);

    }

  public function edit($id)
  {
    $order = EmployeeOrder::findOrFail($id);
    $employees = Employee::get();
    $orderTypes = OrderType::get();
    $statuses = Status::get();

    return view('orders.edit', ['order' => $order, 'employees' => $employees, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
  }


  public function update(EmployeeOrderUpdateRequest $request, employeeOrder $order)
  {

    $validatedData = $request->validated();

    $order->update($validatedData);

    return redirect()->route('orders.index')->with('success', 'Сотрудник успешно обновлён
');

  }

  public function destroy(employeeOrder $order)
  {
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Приказ успешно удалён');
  }

}
