<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $users = User::latest()->simplePaginate(5);
    //     return view('admin.users.index', compact('users'))->with('i', (request()->input('page',1)-1)*5);
    // }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->simplePaginate(10);

        return view('admin.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',            
            'email' => 'required',
            'password' => 'required',
            'type' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->type = $request->type;
        $user->save();
        return redirect()->route('users.index')->with('success', 'success added data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8', // Make password field nullable
            'type' => 'required|integer',
        ]);
    
        $data = $request->only(['name', 'email', 'type']);
    
        // Only hash the password if a new password is provided
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
    
        $user = User::findOrFail($id);
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->farm()->delete();
        $user->delete();
        
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully!');
    }
}
