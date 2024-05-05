<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Company;
use App\Http\Requests\PersonRequest;
use App\Services\PersonService;

class PersonController extends Controller {
    private $pathViewController     = 'page.person.';
    private $controllerName         = 'person';
    protected $personService;

    public function __construct(PersonService $personService) {
        $this->personService = $personService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        // $item = $this->personService->getAll();
        $item = Person::with('company')->get();
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function create() {
        $companies = Company::all();
        return view($this->pathViewController . 'create', compact('companies'));
    }

    public function store(PersonRequest $request) {
        $item                 = new Person();
        $item->full_name      = $request->full_name;
        $item->gender         = $request->gender;
        $item->birthday       = $request->birthday;
        $item->phone_number   = $request->phone_number;
        $item->address        = $request->address;
        $item->company_id     = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->personService->getById($id);
        $companies = Company::all();
        return view($this->pathViewController . 'edit', compact('item', 'companies'));
    }

    public function update(PersonRequest $request, $id) {
        $item = Person::findOrFail($id);
        $item->full_name        = $request->full_name;
        $item->gender           = $request->gender;
        $item->birthday         = $request->birthday;
        $item->phone_number     = $request->phone_number;
        $item->address          = $request->address;
        $item->company_id       = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->personService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
