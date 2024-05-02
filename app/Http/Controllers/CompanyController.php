<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use App\Http\Requests\CompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller {
    private $pathViewController     = 'page.company.';
    private $controllerName         = 'company';
    protected $companyService;

    public function __construct(CompanyService $companyService) {
        $this->companyService = $companyService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        $item = $this->companyService->getAll();
        return view($this->pathViewController . '.index', compact('item'));
    }

    public function create() {
        return view($this->pathViewController . '.create');
    }

    public function store(CompanyRequest $request) {
        $item                = new Company();
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->address       = $request->address;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $department           = new Department();
        $item = $this->companyService->getById($id);
        return view($this->pathViewController . '.edit', compact('item'));
    }

    public function update(CompanyRequest $request, $id) {
        $item                = Company::findOrFail($id);
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->address       = $request->address;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->companyService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
