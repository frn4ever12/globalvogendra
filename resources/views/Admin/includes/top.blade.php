<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{$setting->name??'Example'}}</title>

<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
<!-- iCheck CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/flat/green.min.css" rel="stylesheet">

<!-- bootstrap-progressbar CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-progressbar@3.3.4/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap CDN -->
<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet" />
<!-- bootstrap-daterangepicker CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-daterangepicker@3.1.0/daterangepicker.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/malihu-custom-scrollbar-plugin@3.1.5/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

<!-- Custom Theme Style - inline for now -->
<style>
    /* Custom admin styles will be loaded inline to avoid CORS issues */
</style>

<link rel="stylesheet" href="{{ asset('dist/css/nepali.datepicker.min.css') }}?v={{time()}}">
<link rel="stylesheet" href="{{ asset('dist/css/admin.css') }}?v={{time()}}">
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">