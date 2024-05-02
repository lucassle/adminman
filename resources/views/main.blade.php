<!DOCTYPE html>
<html lang="en">
<head>
    @include('elements.head')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('elements.sidebar')
        </div>
        <div class="top_nav">
            @include('elements.top_nav')
        </div>
        <div class="right_col" role="main">
            @yield('content')
        </div>
            @include('elements.footer')
        </div>
    </div>
    @include('elements.script')
    @yield('after_script')
</body>
</html>