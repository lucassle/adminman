<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Company;
use App\Models\Project;
use App\Models\Person;
use App\Http\Requests\TaskRequest;
use App\Services\TaskService;

class TaskController extends Controller {
    private $pathViewController     = 'page.task.';
    private $controllerName         = 'task';
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request) {
        $data = [];

        // $data['item']       = $this->taskService->getAll();
        $data['item']       = Task::with('company', 'project', 'person')->get();
        $data['companies']  = Company::all();
        $data['projects']   = Project::all();
        $data['people']     = Person::all();

        $query = Task::query();

        if ($request->filled('company')) {
            $query->where('company_id', $request->company);
        }

        if ($request->filled('project')) {
            $query->where('project_id', $request->project);
        }

        if ($request->filled('person')) {
            $query->where('person_id', $request->person);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $data['tasks'] = $query->paginate(10);

        // Trả về view với dữ liệu đã lọc
        return view($this->pathViewController . 'index', $data);
    }

    public function create() {
        $companies  = Company::all();
        $projects   = Project::all();
        $people     = Person::all();
        return view($this->pathViewController . 'create', compact('companies', 'projects', 'people'));
    }

    public function store(TaskRequest $request) {
        Task::create($request->validated());
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully created!');
    }

    public function edit($id) {
        $item = $this->taskService->getById($id);
        return view($this->pathViewController . 'edit', compact('item'));
    }

    public function update(TaskRequest $request, Task $task) {
        $task->update($request->validated());

        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully updated!');
    }

    public function destroy($id) {
        $this->taskService->delete($id);
        return redirect()->route($this->controllerName . '.index')->with('success_notify', 'Successfully deleted!!');
    }
}
