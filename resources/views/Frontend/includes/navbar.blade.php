<nav class="navbar navbar-expand-lg py-3"  style="position: sticky; top: 0; z-index: 1000; background:white;">
    <div class="container container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            @if ($setting && $setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" style="width:40px;" alt="">
            @else
                <img src="{{ asset('dist/img/logo.jpg') }}" style="width:40px;" alt="">
            @endif
            <small class="orgName">{{ $setting->name ?? 'Organization Name' }}</small>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
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
                <li class="nav-item">
                    <a class="mx-2 nav-link btn" href="{{route('contact')}}"
                        style=" background: linear-gradient(135deg, #0056b3, #003a80); color:white;">&nbsp;&nbsp;Contact us&nbsp;&nbsp;</a>
                </li>
                <li class="nav-item">
                    <span class="openMenuBtn">&#9776;</span>
                </li>
            </ul>
        </div>
    </div>
</nav>





