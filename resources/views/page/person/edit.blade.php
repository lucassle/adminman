
@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.x_title', ['title' => 'Form'])
            <div class="x_content">
                @include('templates.error')
                <br/>
                <form action="{{ route($controllerName . '.update', $item->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $item->full_name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="female"{{ $item->gender == 'female' ? ' selected' : '' }}>Female</option>
                            <option value="male"{{ $item->gender == 'male' ? ' selected' : '' }}>Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" name="birthday" id="birthday" class="form-control" placeholder="YYYY-MM-DD. ex: 2000-02-29" value="{{ $item->birthday }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $item->phone_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $item->address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="company_id">Company</label>
                        <select class="form-control" id="company_id" name="company_id">
                            <option value="">Select Company</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ $item->company_id == $company->id ? 'selected' : '' }}>{{ $company->code }} / {{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection