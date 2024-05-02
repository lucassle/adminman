<form action="{{ route($controllerName . '.index') }}" method="GET">
    <div class="form-group col-md-6 col-xs-12">
        <label for="company">Company:</label>
        <select name="company" id="company" class="form-control">
            <option value="">-- Select Company --</option>
            {{-- @foreach($data['item'] as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach --}}
        </select>
    </div>
    {{-- <div class="form-group col-md-6 col-xs-12">
        <label for="project">Project:</label>
        <select name="project" id="project" class="form-control">
            <option value="">-- Select Project --</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->code }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="project">Person:</label>
        <select name="project" id="project" class="form-control">
            <option value="">-- Select Person --</option>
            @foreach($people as $person)
                <option value="{{ $person->id }}">{{ $person->full_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6 col-xs-12">
        <label for="project">Status:</label>
        <select name="project" id="project" class="form-control">
            <option value="">-- Select Status --</option>
            @foreach($people as $person)
                <option value="{{ $person->id }}">{{ $person->full_name }}</option>
            @endforeach
        </select>
    </div> --}}
    <!-- Thêm các trường lọc khác tương tự cho Project, Person, Status, priority -->

    <div class="form-group">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" class="form-control" placeholder="Enter task name">
    </div>
    
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Info</th>
            <th>Company</th>
            <th>Project</th>
            <th>Person</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($item as $item)
            <tr>
                @php
                    $number = $key + 1;
                @endphp
                <td>{{ $number }}</td>
                <td>{{ $item->company }}</td>
                <td>{{ $item->project }}</td>
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

        {{ $item->links() }}
        {{-- @foreach($item as $key => $item)
            <tr>
                @php
                    $number = $key + 1;
                @endphp
                <td>{{ $number }}</td>
                <td width="40%">
                    <p><strong>Name: </strong>{{ $item->name }}</p>
                    <p><strong>Description: </strong>{{ $item->description }}</p>
                </td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->address }}</td>
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
        @endforeach --}}
    </tbody>
</table>