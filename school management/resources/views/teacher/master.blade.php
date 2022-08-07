<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    @include('teacher.include.asset.css')
</head>

<body data-sidebar="dark">


<div id="layout-wrapper">

    @include('teacher.include.header')
    @include('teacher.include.menu')

    <div class="main-content">

        <div class="page-content">

        @yield('body')

        </div>

        @include('teacher.include.footer')
    </div>


</div>
@include('teacher.include.asset.script')
</body>

</html>
