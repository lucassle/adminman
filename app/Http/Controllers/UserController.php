<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller {
    private $pathViewController     = 'page.user.';
    private $controllerName         = 'user';
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        // $item = $this->userService->getAll();
        $item = User::with('roles')->get();
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function create() {
        $item = Role::all();
        return view($this->pathViewController . 'create', compact('item'));
    }

    public function store(UserRequest $request) {
        $item               = new User();
        $item->email        = $request->email;
        $item->password     = $request->password;
        $item->is_active    = $request->is_active;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->userService->getById($id);
        $roles = Role::all();
        return view($this->pathViewController . 'edit', compact('item', 'roles'));
    }

    public function update(UserRequest $request, $id) {
        $item               = User::findOrFail($id);
        $item->email        = $request->email;
        $item->password     = $request->password;
        $item->is_active    = $request->is_active;
        $item->save();
        $item->roles()->sync($request->roles);

        // $item->role()->sync($request->role);

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->userService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
