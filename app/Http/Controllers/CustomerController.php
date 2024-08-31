<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar Customer';
        $data['customers'] = Customer::all();
        return view('admin.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Customer';
        return view('admin.customer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'nama_customer' => ['required', 'string', 'max:255', 'unique:customers,nama_customer'],
                'email' => ['required', 'string', 'max:255', 'unique:customers,email'],
                'phone' => ['required', 'string', 'max:255', 'unique:customers,phone'],
                'address' => 'required',
                'city' => 'required',
                'province' => 'required',
                'pic' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $validator->validated();
            Customer::create($data);
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Data Berhasil');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
$data['title'] = 'Detail Customer';
$data['customer'] = $customer;
return view('admin.customer.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $data['title'] = 'Edit Customer';
        $data['customer'] = $customer;
        return view('admin.customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'nama_customer' => ['required', 'string', 'max:255', Rule::unique('customers', 'nama_customer')->ignore($customer->id)],
                'email' => ['required', 'string', 'max:255', Rule::unique('customers', 'email')->ignore($customer->id)],
                'phone' => ['required', 'string', 'max:255', Rule::unique('customers', 'phone')->ignore($customer->id)],
                'address' => 'required',
                'city' => 'required',
                'province' => 'required',
                'pic' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $validator->validated();
            $customer->update($data);
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Data Berhasil');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            DB::beginTransaction();
            $customer->delete();
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('CustomerController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
