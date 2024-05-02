<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\CountryRequest;
use App\Services\CountryService;

class CountryController extends Controller {
    protected $pathViewController     = 'page.country.';
    protected $controllerName         = 'country';
    protected $countryService;

    public function __construct(CountryService $countryService) {
        $this->countryService = $countryService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        $item = $this->countryService->getAll();
        return view($this->pathViewController . 'index', compact('item'));
    }

    public function create() {
        return view($this->pathViewController . 'create');
    }

    public function store(CountryRequest $request) {
        $item                = new Country();
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->description   = $request->description;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->countryService->getById($id);
        return view($this->pathViewController . 'edit', compact('item'));
    }

    public function update(CountryRequest $request, $id) {
        $item                = Country::findOrFail($id);
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->description   = $request->description;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->countryService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
