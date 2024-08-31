<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar User';
        $data['users'] = User::all();
        // $data['users'] = Role::all();
        // dd(Role::all());
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah User';
        $data['roles'] = role::all();
        $data['departements'] = Departement::all();
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,id',
            'departement_id' => 'required|exists:departements,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => ucwords($request->input('name')),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'departement_id' => $request->input('departement_id'),
        ]);

        $user->assignRole($request->input('role'));

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    } catch (\Exception $e) {
        // Tangani kesalahan dengan menampilkan pesan error
        return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage())->withInput();
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = 'Detail User';
        $data['user'] = User::findOrFail($id);
        return view('admin.user.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit Spec Produk';
        $data['roles'] = role::all();
        $data['user'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'role' => 'required|exists:roles,id',
            ]);

            $user = User::findOrFail($id);

            $user->update([
                'name' => ucwords($request->input('name')),
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
            ]);

            $user->syncRoles([$request->input('role')]);

            return redirect()->route('user.index')->with('success', 'User updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            return redirect()->route('user.index');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('UserController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
