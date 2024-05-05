<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Company;
use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;

class DepartmentController extends Controller {
    private $pathViewController     = 'page.department.';
    private $controllerName         = 'department';
    protected $departmentService;

    public function __construct(DepartmentService $departmentService) {
        $this->departmentService = $departmentService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        // $item = $this->departmentService->getAll();
        $item = Department::with('company')->get();
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function create() {
        $companies = Company::all();
        return view($this->pathViewController . 'create', compact('companies'));
    }

    public function store(DepartmentRequest $request) {
        $item                = new Department();
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->parent_id     = $request->parent_id;
        $item->company_id    = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->departmentService->getById($id);
        return view($this->pathViewController . 'edit', compact('item'));
    }

    public function update(DepartmentRequest $request, $id) {
        $item                = Department::findOrFail($id);
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->parent_id     = $request->parent_id;
        $item->company_id    = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->departmentService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
