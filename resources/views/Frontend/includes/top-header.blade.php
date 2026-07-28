<header class=" text-white" style="background: linear-gradient(135deg, #0056b3, #003a80);">
    <div class="container py-2 container-fluid top-navbar" >
        <div class="row align-items-center" >
            <div class="col-md-6 col-sm-4 text-start">
                <div class="contact">
                    <i class="fas fa-map-marker-alt"></i> <span class="me-4">{{$setting->address??'123 Main St, City, Country'}}</span>
                    <i class="fas fa-phone"></i> <span class="me-4">{{$setting->phone??'+977 1234569874'}}</span>
                    <i class="fas fa-envelope"></i> <span>{{$setting->email??'contact@example.com'}}</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-8 text-end text-white" style="display: flex; align-items: center; justify-content: flex-end; gap: 1rem;">
                @auth
                <a href="{{route('dashboard')}}" class="btn btn-sm text-white" style="background-color: rgb(44, 193, 111); ">Dashboard</a>
                <button type="button" id="logOutBtn" class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i> LogOut</button>
                @else
                <a href="{{route('login')}}" class="btn btn-sm text-white" style="background-color: rgb(44, 193, 111); " ><i class="fa fa-user"></i>&nbsp; Login</a>
                @endauth
            </div>
        </div>
    </div>
</header>
