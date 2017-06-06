<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', ['user' => User::all()]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request, User $user)
    {
        $user = $user->create($request->all());

        return redirect()->route('admin.user.index');
    }

    public function show(User $user)
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        if (array_key_exists('redirect', $data)) return redirect()->route('admin.dashboard')->with('success', 'User updated');

        return redirect()->route('admin.user.index')->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return 'success';
    }
}
