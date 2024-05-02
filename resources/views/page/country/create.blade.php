@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.x_title', ['title' => 'Form'])
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
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection