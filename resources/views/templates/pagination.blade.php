@php
    $totalItem          = $item->total();
    $totalPage          = $item->lastPage();
    $totalItemPerPage   = $item->perPage();
@endphp 

<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0">Page: <b> {{ $totalItem }}</b> of <span
                    class="label label-success label-pagination">{{ $totalPage }} pages</span></p>
            <p class="m-b-0">Disable<b> 1 </b> đến<b> {{ $totalItemPerPage }}</b> of<b> {{ $totalItem }}</b> items</p>
        </div>
        <div class="col-md-6">
            {!! $item->appends(request()->input())->links('templates.pagination_custom', ['items' => $item]) !!}
        </div>
    </div>
</div>