
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
                        <label for="code">Code:</label>
                        <input type="text" name="code" id="code" class="form-control" value="{{ $item->code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="company">Company:</label>
                        <select name="company_id" id="company" class="form-control" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $item->company_id == $company->id ? 'selected' : '' }}>{{ $company->code }} / {{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="person">Member</label>
                        <select name="person_id[]" id="person" class="form-control" multiple="multiple" required>
                            @foreach($people as $person)
                                <option value="{{ $person->id }}" selected>{{ $person->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" value="{{ $item->description }}" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection