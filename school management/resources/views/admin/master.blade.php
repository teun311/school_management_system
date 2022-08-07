
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    @include('admin.include.assets.css')

</head>

<body data-sidebar="dark">
<div id="layout-wrapper">

    @include('admin.include.header')
    @include('admin.include.menu')


    <div class="main-content">

        <div class="page-content">
           @yield('body')

        </div>
       @include('admin.include.footer')
    </div>

</div>

<div class="rightbar-overlay"></div>
    @include('admin.include.assets.script')

</body>
</html>
