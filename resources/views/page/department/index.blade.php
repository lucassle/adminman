@extends('main')
@section('content')
@include('templates.page_header', ['pageIndex' => true])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('templates.success_notify')
            @include('page.department.list')
        </div>
    </div>
</div>
<script type="text/javascript">
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('departments[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }
</script>
@endsection