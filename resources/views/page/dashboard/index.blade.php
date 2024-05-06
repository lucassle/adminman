@extends('main')
@section('content')
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Dashboard</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    @include('page.dashboard.list', ['name' => 'Country',       'route' => 'country',       'icon' => 'fa-globe'])
                    @include('page.dashboard.list', ['name' => 'Person',        'route' => 'person',        'icon' => 'fa-person'])
                    @include('page.dashboard.list', ['name' => 'User',          'route' => 'user',          'icon' => 'fa-user'])
                    @include('page.dashboard.list', ['name' => 'Role',          'route' => 'role',          'icon' => 'fa-critical-role'])
                    @include('page.dashboard.list', ['name' => 'Company',       'route' => 'company',       'icon' => 'fa-building'])
                    @include('page.dashboard.list', ['name' => 'Department',    'route' => 'department',    'icon' => 'fa-building-user'])
                    @include('page.dashboard.list', ['name' => 'Project',       'route' => 'project',       'icon' => 'fa-bars-progress'])
                    @include('page.dashboard.list', ['name' => 'Task',          'route' => 'task',          'icon' => 'fa-list-ul'])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection