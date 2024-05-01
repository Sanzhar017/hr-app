<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderTypeController extends Controller
{
  public function index()
  {
    $orderTypes = OrderType::all();

    return view('orderType.index', ['orderTypes' => $orderTypes]);
  }

  public function create()
  {
    $statuses = Status::get();

    return view('orderType.create', ['statuses' => $statuses]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:order_types',
    ]);

    OrderType::create($request->all());

    return redirect()->route('handbooko.index')
      ->with('success', 'Order type created successfully.');
  }

  public function show(OrderType $orderType)
  {
    return view('orderType.show', ['orderType' => $orderType]);
  }

  public function edit(OrderType $orderType)
  {

    return view('orderType.edit', ['orderType' => $orderType]);
  }

  public function update(Request $request, OrderType $orderType)
  {
    $request->validate([
      'name' => 'required|string|max:255|unique:order_types,name,'.$orderType->id,
    ]);

    $orderType->update($request->all());

    return redirect()->route('handbooko.index')
      ->with('success', '
Тапсырыс түрі сәтті жаңартылды');
  }

  public function destroy(OrderType $orderType)
  {
    $orderType->delete();

    return redirect()->route('handbooko.index')
      ->with('success', 'Тапсырыс түрі сәтті жойылды');
  }
}
