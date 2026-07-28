@extends('Frontend.includes.main')
@section('content')
    <section class="header-section position-relative text-start p-5 animate-section"
        style="background: linear-gradient(180deg, #E8F2FC, #D9EAFB);">
        <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.5);"></div>
        <div class="content position-relative z-2 col-md-7 py-5 px-4">
            <h1 class="display-4 fw-bold text-danger animate-section-item">Counselor Dashboard</h1>
        </div>
    </section>

    <div class="container py-4 my-4 animate-section ">
        <div class="row gx-4 gy-4">
            <div class="col-md-6 d-flex animate-section-item">
                <div class="service-box shadow rounded overflow-hidden position-relative p-2"
                    style="height: 140px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('images/excel.png') }}" alt="Excel Icon"
                            style="width: 30px; height: 30px; margin-right: 10px;">
                        <h3 class="fs-6 mb-0" style="font-size: 14px; font-weight: bold; color: #003366;">List of Australian
                            Institutions</h3>
                    </div>

                    <p class="mb-2" style="font-size: 14px; color: #333;">University & Higher Education Course List /
                        Requirements Details</p>

                    <a href="#" class="btn"
                        style="border: 2px solid navy; color: navy; background-color: transparent; padding: 8px 8px; border-radius: 5px; text-decoration: none; font-size: 12px; display: inline-flex; align-items: center; justify-content: center; transition: 0.3s; max-width: 120px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        View Detail <span style="margin-left: 5px;">&#8594;</span>
                    </a>
                </div>
            </div>


            <div class="col-md-6 d-flex">
                <div class="service-box shadow rounded overflow-hidden position-relative p-2"
                    style="height: 140px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('images/excel.png') }}" alt="Excel Icon"
                            style="width: 30px; height: 30px; margin-right: 10px;">
                        <h3 class="fs-6 mb-0" style="font-size: 14px; font-weight: bold; color: #003366;">List of Australian
                            Institutions</h3>
                    </div>

                    <p class="mb-2" style="font-size: 14px; color: #333;">University & Higher Education Course List /
                        Requirements Details</p>

                    <a href="#" class="btn"
                        style="border: 2px solid navy; color: navy; background-color: transparent; padding: 8px 8px; border-radius: 5px; text-decoration: none; font-size: 12px; display: inline-flex; align-items: center; justify-content: center; transition: 0.3s; max-width: 120px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        View Detail <span style="margin-left: 5px;">&#8594;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist/js/frontend.js') }}"></script>
@endsection
