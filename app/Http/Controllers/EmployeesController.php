<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeess = Employees::all();
        return view('employees.index', [
            'employeess' => $employeess
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employeess = \App\Models\Employees::all();
        return view('employees.create', [
            'employeess' => $employeess
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'employees_name' => 'required|min:3',
            'phone_number' => 'required|min:8',
            'address' => 'required|min:8'
        ]);

        //create artikel
        Employees::create([
            'employees_name' => $request->employees_name,
            'phone_number' =>$request->phone_number,
            'address' =>$request->address
        ]);

        //redirect to index
        return redirect(route('listEmployees'))->with('success', 'Karyawan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employees::findOrFail($id);
        return view('employees.edit', [
            'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validasi form
        $this->validate($request, [
            'employees_name' => 'required|min:3',
            'phone_number' => 'required|min:8',
            'address' => 'required|min:8'
        ]);

        //untuk mengambil ID Karyawan
        $employees = Employees::findOrFail($id);

        
        //mengarahkan ke halaman index karyawan
        return redirect(route('listEmployees'))->with('success', 'Data Karyawan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employees::findOrFail($id);

        $employees->delete();
        return redirect(route('listEmployees'))->with('success', 'Data Karyawan Berhasil Dihapus');
    }
}