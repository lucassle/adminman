@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.title', ['title' => 'Form'])
            <div class="x_content">
                <br/>
                <form action="{{ route($controllerName . '.store') }}" method="POST">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h3>Warning!</h3>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" class="form-control" value="" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="start_time">Start Time:</label>
                        <input type="date" name="start_time" id="start_time" class="form-control">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="end_time">End Time:</label>
                        <input type="date" name="end_time" id="end_time" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select name="company_id" id="company" class="form-control" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->code }} / {{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <select name="project_id" id="project" class="form-control" required>
                            <option value="">Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->code }} / {{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="person">Person</label>
                        <select name="person_id" id="person" class="form-control" required>
                            <option value="">Select Person</option>
                            @foreach($people as $person)
                                <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status_id" id="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1">Mới tạo</option>
                            <option value="2">Đang làm</option>
                            <option value="3">Hoàn thành</option>
                            <option value="4">Tạm hoãn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select name="priority_id" id="priority" class="form-control" required>
                            <option value="">Select Priority</option>
                            <option value="1">Cao</option>
                            <option value="2">Trung bình</option>
                            <option value="3">Thấp</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection