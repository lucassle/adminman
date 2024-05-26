<form action="{{ route($controllerName . '.index') }}" method="GET">
    <div class="form-group col-md-6 col-xs-12">
        <label for="company">Company:</label>
        <select name="company" id="company" class="form-control">
            <option value="">-- Select Company --</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="project">Project:</label>
        <select name="project" id="project" class="form-control">
            <option value="">-- Select Project --</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->code }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="person">Person:</label>
        <select name="person" id="person" class="form-control">
            <option value="">-- Select Person --</option>
            @foreach($people as $person)
                <option value="{{ $person->id }}">{{ $person->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="status">Status:</label>
        <select name="status" id="status" class="form-control">
            <option value="">-- Select Status --</option>
            @php
                $statusValue = config('define.status');
                $status = '';
                foreach ($statusValue as $key => $value) {
                    $status  .= sprintf('<option value="%s">%s</option>', $key, $value);
                }
            @endphp
            {!! $status !!}
        </select>
    </div>

    <div class="form-group col-md-6 col-xs-12">
        <label for="priority">Priority:</label>
        <select name="priority" id="priority" class="form-control">
            <option value="">-- Select Priority --</option>
            @php
                $priorityValue = config('define.priority');
                $priority = '';
                foreach ($priorityValue as $key => $value) {
                    $priority  .= sprintf('<option value="%s">%s</option>', $key, $value);
                }
            @endphp
            {!! $priority !!}
        </select>
    </div>

    <br>
    <div class="form-group col-md-6 col-xs-12">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" class="form-control" placeholder="Enter task name">
    </div>
    <button type="submit" class="btn btn-primary" style="float:right;">Search</button>
</form>
<div class="form-group" style="display:flex;float:right;">
    <form action="{{ route($controllerName . '.export') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="btn btn-sm btn-primary">Export Excel</button>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Info</th>
            <th>Company</th>
            <th>Project</th>
            <th>Person</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($item as $key => $item)
            <tr>
                @php
                    $number = $key + 1;
                @endphp
                <td>{{ $number }}</td>
                <td>
                    <p><strong>Name: </strong>{{ $item->name }}</p>
                    <p><strong>Description: </strong>{{ $item->description }}</p>
                </td>
                <td>{{ $item->company->name }}</td>
                <td>{{ $item->project->name }}</td>
                <td>{{ $item->person->full_name }}</td>
                <td>
                    <p><strong>Start Time: </strong>{{ $item->start_time }}</p>
                    <p><strong>End Time: </strong>{{ $item->end_time }}</p>
                </td>
                <td>{{ $statusValue[$item->status] }}</td>
                <td>{{ $priorityValue[$item->priority] }}</td>
                <td>
                    <div style="display:flex;">
                        <a href="{{ route($controllerName . '.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route($controllerName . '.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        {{ $tasks->links() }}
    </tbody>
</table>