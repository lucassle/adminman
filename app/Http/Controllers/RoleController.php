<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;

class RoleController extends Controller {
    private $pathViewController     = 'page.role.';
    private $controllerName         = 'role';
    protected $roleService;

    public function __construct(RoleService $roleService) {
        $this->roleService = $roleService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        $item = $this->roleService->getAll();
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function create() {
        return view($this->pathViewController . 'create');
    }

    public function store(RoleRequest $request) {
        $item               = new Role();
        $item->role         = $request->role;
        $item->description  = $request->description;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->roleService->getById($id);
        return view($this->pathViewController . 'edit', compact('item'));
    }

    public function update(RoleRequest $request, $id) {
        $item               = Role::findOrFail($id);
        $item->role         = $request->role;
        $item->description  = $request->description;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->roleService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
