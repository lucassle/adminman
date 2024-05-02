@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => true])

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.success_notify')
            @include('page.task.list')
        </div>
    </div>
</div>
@endsection