<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;

use App\Http\Requests\User\Store;
use App\Http\Requests\User\Updata;

use App\Models\User\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-create')->only(['create', 'store']);
        $this->middleware('permission:user-update')->only(['update', 'edit']);
        $this->middleware('permission:user-delete')->only(['destroy']);
        $this->middleware('permission:user-read')->only(['index']);
    }

    public function index()
    {
        $data = User::all(['id', 'name', 'email'])->toArray();
        return view('components.crud.listData', ['data' => $data, 'name' => 'user']);
    }

    public function create()
    {
        return view('dashBoard.users.create');
    }

    public function store(Store $request)
    {
        $cradintals = $request->validated();

        $user = User::create([
            'name' => $cradintals['name'],
            'email' => $cradintals['email'],
            'password' => bcrypt($cradintals['password']),
        ]);
        

        $request['roles'] ? $user->syncRoles($request['roles']) : '';
        $request['permissions'] ? $user->syncPermissions($request['permissions']) : '';

        return redirect(route('user.index'));
    }

    public function edit(User $user)
    {
        return view(
            'dashBoard.users.edit',
            ['data' => $user,]
        );
    }

    public function update(Updata $request, User $user)
    {
        $user->update($request->validated());

        $request['roles'] ? $user->syncRoles($request['roles']) : '';
        $request['permissions'] ? $user->syncPermissions($request['permissions']) : '';

        return redirect(route('user.index'));
    }

    public function destroy(User $user)
    {
        $user->syncPermissions([]);
        $user->syncRoles([]);

        $user->delete();
        return redirect(route('user.index'));
    }
}
