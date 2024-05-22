<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Orders::all();
        return view('order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = \App\Models\Customers::all();
        $categorys = \App\Models\Categories::all();
        $employeess = \App\Models\Employees::all();
        return view('order.create', [
            'customers' => $customers,
            'catagorys' => $categorys,
            'employess' => $employeess
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_customer' => 'required|integer',
            'id_category' => 'required|integer',
            'id_employees' => 'required|integer',
            'customer_name' => 'required|string',
            'type_laundry' => 'required|string',
            'order_date' => 'required|date',
            'out_date' => 'required|date',
            'amount_weight' => 'required|integer',
            'status' => 'required|string',
            'total_price' => 'required|integer',
        ]);

        Orders::create([
            'id_customer' => $request->id_customer,
            'id_category' => $request->id_category,
            'id_employees' => $request->id_employess,
            'customer_name' => $request->customer_name,
            'type_laundry' => $request->type_laundry,
            'order_date' => $request->order_date,
            'out_date' => $request->out_date,
            'amount_weight' => $request->amount_weight,
            'status' =>$request->status,
            'total_price' =>$request->total_price
        ]);

        return redirect(route('listOrder'))->with('success', 'Data Pesanan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = \App\Models\Customers::all();
        $categorys = \App\Models\Categories::all();
        $employeess = \App\Models\Employees::all();
        $order = Orders::findOrFail($id);
        return view('order.edit', [
            'order' => $order,
            'customers' => $customers,
            'categorys' => $categorys,
            'employeess' => $employeess
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_customer' => 'required|integer',
            'id_category' => 'required|integer',
            'id_employees' => 'required|integer',
            'customer_name' => 'required|string',
            'type_laundry' => 'required|string',
            'order_date' => 'required|date',
            'out_date' => 'required|date',
            'amount_weight' => 'required|integer',
            'status' => 'required|string',
            'total_price' => 'required|integer',
        ]);

        $order = Orders::findOrFail($id);
        
        return redirect(route('listOrder'))->with('success', 'Data Pesanan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Orders::findOrFail($id);
        $order->delete();
        return redirect(route('listOrder'))->with('success', 'Data Pesanan Berhasil Dihapus');
    }
}
