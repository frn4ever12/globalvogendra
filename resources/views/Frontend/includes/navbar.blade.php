<nav class="navbar navbar-expand-lg py-3" style="position: sticky; top: 0; z-index: 1000; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            @if ($setting && $setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" style="width: 50px; height: 50px; object-fit: contain;" alt="Logo">
            @else
                <img src="{{ asset('dist/img/logo.jpg') }}" style="width: 50px; height: 50px; object-fit: contain;" alt="Logo">
            @endif
            <span class="orgName ms-2 fw-bold" style="font-size: 1.1rem;">{{ $setting->name ?? 'Organization Name' }}</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center">
                @if($menus && $menus->count() > 0)
                    @foreach($menus as $menu)
                        @if($menu->subMenus->count() > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown{{ $menu->id }}" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }} me-1"></i>
                                    @endif
                                    {{ $menu->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $menu->id }}">
                                    @foreach($menu->subMenus as $subMenu)
                                        <li><a class="dropdown-item" href="{{ route('submenu.page', [$menu->slug, $subMenu->slug]) }}">{{ $subMenu->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="mx-2 nav-link" href="{{ route('menu.page', $menu->slug) }}">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }} me-1"></i>
                                    @endif
                                    {{ $menu->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
                <li class="nav-item mt-2 mt-lg-0">
                    <a class="mx-2 nav-link btn text-white" href="{{route('contact')}}"
                        style="background: linear-gradient(135deg, #0056b3, #003a80); border-radius: 25px; padding: 8px 25px;">
                        Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
@media (max-width: 991px) {
    .navbar-collapse {
        background: white;
        padding: 20px;
        margin-top: 15px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .navbar-nav {
        flex-direction: column;
        width: 100%;
    }
    
    .nav-item {
        margin: 10px 0 !important;
    }
    
    .nav-link {
        padding: 10px 15px !important;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover {
        background: #f8f9fa;
    }
    
    .dropdown-menu {
        position: static !important;
        width: 100%;
        margin-top: 10px;
        border: none;
        background: #f8f9fa;
        border-radius: 8px;
    }
    
    .orgName {
        font-size: 0.9rem !important;
    }
}

@media (max-width: 576px) {
    .orgName {
        font-size: 0.8rem !important;
    }
    
    .navbar-brand img {
        width: 40px !important;
        height: 40px !important;
    }
}
</style>





