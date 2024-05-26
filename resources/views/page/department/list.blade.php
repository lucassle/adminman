@php

@endphp

<form action="{{ route('departments.bulkAction') }}" method="POST">
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>Code</th>
                <th>Name</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($item as $key => $item)
                <tr>
                    <td><input type="checkbox" name="departments[]" value="{{ $item->id }}"></td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->company->name }}</td>
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
        </tbody>
    </table>
</form>