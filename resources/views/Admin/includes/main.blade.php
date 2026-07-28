<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.includes.top')
    @yield('head')
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
    </style>
</head>

<body class="bg-white nav-md">
    <div class="container body">
        <div class="main_container">
            @include('Admin.includes.header')

            <!-- page content -->
            <div class="bg-white right_col" role="main">
                <div class="x_content">
                    @include('Admin.includes.message')
                    @yield('content')
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            @include('Admin.includes.footer')
            <!-- /footer content -->
        </div>
    </div>


    @include('Admin.includes.bottom')
    @yield('scripts')
</body>

</html>
