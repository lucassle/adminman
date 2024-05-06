@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.title', ['title' => 'Create'])
            <div class="x_content">
                <br/>
                <form action="{{ route($controllerName . '.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Parent ID</label>
                        <input type="text" name="parent_id" id="parent_id" class="form-control" value="{{ old('parent_id') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company ID</label>
                        <input type="text" name="company_id" id="company_id" class="form-control" value="{{ old('company_id') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection