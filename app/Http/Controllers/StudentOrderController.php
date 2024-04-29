<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentOrderRequest;
use App\Http\Requests\StudentOrderUpdateRequest;
use App\Models\OrderType;
use App\Models\Status;
use App\Models\Student;
use App\Models\StudentOrder;
use Illuminate\Http\Request;

class StudentOrderController extends Controller
{

    public function index()
    {
      $orders = StudentOrder::with('student', 'orderType', 'currentStatus')->orderBy('created_at','desc')->paginate(10);

      return view('orders.index', ['orders' => $orders]);
    }


    public function create()
    {
        $students = Student::get();
        $orderTypes = OrderType::get();
        $statuses = Status::get();

        return view('orders.create',  ['students' => $students, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
    }

  public function store(StudentOrderRequest $request)
  {
    $validatedData = $request->validated();
    $studentIds = $validatedData['student_id'];

    $dataToInsert = [];
    foreach ($studentIds as $studentId) {
      $dataToInsert[] = ['student_id' => $studentId] + $validatedData;
    }

    Student::whereIn('id', $studentIds)->update(['status_id' => $validatedData['s_status_id']]);

    StudentOrder::insert($dataToInsert);

    return redirect()->route('orders.index')->with('success', 'Кызмет for order created successfully');

  }


  public function show(StudentOrder $order)
    {
      return view('orders.show', ['order' => $order]);

    }

  public function edit($id)
  {
    $order = StudentOrder::findOrFail($id);
    $students = Student::get();
    $orderTypes = OrderType::get();
    $statuses = Status::get();

    return view('orders.edit', ['order' => $order, 'students' => $students, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
  }


  public function update(StudentOrderUpdateRequest $request, StudentOrder $order)
  {

    $validatedData = $request->validated();

    $order->update($validatedData);

    return redirect()->route('orders.index')->with('success', 'Сотрудник updated successfully');

  }

  public function destroy(StudentOrder $order)
  {
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
  }

}
