<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;

class OrderTypeController extends Controller
{

    public function index()
    {
        $order = OrderType::get();

        return view('ordertype.index', ['order' => $order]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(OrderType $orderType)
    {
        //
    }


    public function edit(OrderType $orderType)
    {
        //
    }


    public function update(Request $request, OrderType $orderType)
    {
        //
    }


    public function destroy(OrderType $orderType)
    {
      $orderType->delete();

      return redirect()->route('or.index')->with('success', 'Order deleted successfully');
    }
}
