
@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.x_title', ['title' => 'Form'])
            <div class="x_content">
                <br/>
                <form action="{{ route($controllerName . '.update', $item->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $item->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control" value="{{ $item->password }}" required>
                    </div>
                    <div class="form-group">
                        <label for="is_active">Is Active</label>
                        <select name="is_active" id="is_active" class="form-control" required>
                            <option value="active"{{ old('is_active') == 'active' ? ' selected' : '' }}>Active</option>
                            <option value="inactive"{{ old('is_active') == 'inactive' ? ' selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Roles</label><br>
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $item->roles->contains($role->id) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $role->role }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection