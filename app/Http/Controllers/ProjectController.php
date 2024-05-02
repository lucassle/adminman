<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Company;
use App\Models\Person;
use App\Http\Requests\ProjectRequest;
use App\Services\ProjectService;

class ProjectController extends Controller {
    private $pathViewController     = 'page.project.';
    private $controllerName         = 'project';
    protected $projectService;

    public function __construct(ProjectService $projectService) {
        $this->projectService = $projectService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index() {
        $item = Project::paginate(10);
        return view($this->pathViewController . '.index', compact('item'));
    }

    public function create() {
        $companies  = Company::all();
        return view($this->pathViewController . '.create', compact('companies'));
    }

    public function store(ProjectRequest $request) {
        $item                = new Project();
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->description   = $request->description;
        $item->company_id    = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $companies  = Company::all();
        $item       = $this->projectService->getById($id);
        $people     = Person::where('company_id', $item->company_id)->get();
        return view($this->pathViewController . '.edit', compact('item', 'companies', 'people'));
    }

    public function update(ProjectRequest $request, $id) {
        $item                = Project::findOrFail($id);
        $item->code          = $request->code;
        $item->name          = $request->name;
        $item->description   = $request->description;
        $item->company_id    = $request->company_id;
        $item->save();

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->projectService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }

    public function getPersonsByCompany(Request $request) {
        $companyId  = $request->input('company_id');
        $people     = Person::where('company_id', $companyId)->get();
        return response()->json($people);
    }
}
