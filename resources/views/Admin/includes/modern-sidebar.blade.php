<!-- Modern Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-logo">
            @if ($setting && $setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo">
            @else
                <img src="{{ asset('dist/img/logo.jpg') }}" alt="Logo">
            @endif
            <span>{{ $setting->name ?? 'Admin Panel' }}</span>
        </a>
    </div>
    
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="{{ route('dashboard') }}" class="sidebar-menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="javascript:void(0)" class="sidebar-menu-link" onclick="toggleSubmenu('cms-submenu')">
                    <i class="fas fa-cms"></i>
                    <span>CMS</span>
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <ul class="sidebar-submenu" id="cms-submenu">
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.hero-banner.index') }}" class="sidebar-submenu-link {{ request()->is('admin/hero-banner*') ? 'active' : '' }}">
                            <i class="fas fa-image"></i>
                            <span>Hero Banners</span>
                        </a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.about-us.edit', 1) }}" class="sidebar-submenu-link {{ request()->is('admin/about-us*') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            <span>About Us</span>
                        </a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.service.index') }}" class="sidebar-submenu-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                            <i class="fas fa-concierge-bell"></i>
                            <span>Our Services</span>
                        </a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.menu.index') }}" class="sidebar-submenu-link {{ request()->is('admin/menu*') ? 'active' : '' }}">
                            <i class="fas fa-bars"></i>
                            <span>Menus</span>
                        </a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.sub-menu.index') }}" class="sidebar-submenu-link {{ request()->is('admin/sub-menu*') ? 'active' : '' }}">
                            <i class="fas fa-list"></i>
                            <span>Sub Menus</span>
                        </a>
                    </li>
                    <li class="sidebar-submenu-item">
                        <a href="{{ route('admin.page.index') }}" class="sidebar-submenu-link {{ request()->is('admin/page*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Pages</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.country.index') }}" class="sidebar-menu-link {{ request()->is('admin/country*') ? 'active' : '' }}">
                    <i class="fas fa-globe"></i>
                    <span>Countries</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.university.index') }}" class="sidebar-menu-link {{ request()->is('admin/university*') ? 'active' : '' }}">
                    <i class="fas fa-university"></i>
                    <span>Universities</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.program.index') }}" class="sidebar-menu-link {{ request()->is('admin/program*') ? 'active' : '' }}">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Programs</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.course.index') }}" class="sidebar-menu-link {{ request()->is('admin/course*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i>
                    <span>Courses</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.service.index') }}" class="sidebar-menu-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                    <i class="fas fa-cogs"></i>
                    <span>Services</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.process.index') }}" class="sidebar-menu-link {{ request()->is('admin/process*') ? 'active' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <span>Process</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.why-choose-us.index') }}" class="sidebar-menu-link {{ request()->is('admin/why-choose-us*') ? 'active' : '' }}">
                    <i class="fas fa-star"></i>
                    <span>Why Choose Us</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.german-language-level.index') }}" class="sidebar-menu-link {{ request()->is('admin/german-language-level*') ? 'active' : '' }}">
                    <i class="fas fa-language"></i>
                    <span>German Levels</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.event.index') }}" class="sidebar-menu-link {{ request()->is('admin/event*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Events</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.appointment.index') }}" class="sidebar-menu-link {{ request()->is('admin/appointment*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Appointments</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.faq.index') }}" class="sidebar-menu-link {{ request()->is('admin/faq*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQs</span>
                </a>
            </li>
            
            <li class="sidebar-menu-item">
                <a href="{{ route('admin.setting.index') }}" class="sidebar-menu-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

<script>
function toggleSubmenu(id) {
    const submenu = document.getElementById(id);
    if (submenu) {
        submenu.classList.toggle('show');
    }
}
</script>
