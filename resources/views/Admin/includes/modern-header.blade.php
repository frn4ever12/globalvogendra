<!-- Modern Header -->
<header class="header">
    <div class="header-left">
        <button class="hamburger-btn" id="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle ?? 'Dashboard' }}</li>
            </ol>
        </nav>
    </div>
    
    <div class="header-right">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search...">
        </div>
        
        <button class="notification-btn">
            <i class="fas fa-bell"></i>
            <span class="notification-badge">3</span>
        </button>
        
        <div class="user-dropdown">
            <button class="user-dropdown-toggle" id="user-dropdown-toggle">
                @if ($setting && $setting->logo)
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="User">
                @else
                    <img src="{{ asset('dist/img/logo.jpg') }}" alt="User">
                @endif
                <span>{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="user-dropdown-menu" id="user-dropdown-menu">
                <a href="{{ route('dashboard') }}" class="user-dropdown-item">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('home') }}" class="user-dropdown-item">
                    <i class="fas fa-home"></i>
                    <span>Homepage</span>
                </a>
                <div class="user-dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()" class="user-dropdown-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
        
        <div class="current-date">
            <span id="current-date"></span>
            <span id="current-time"></span>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // User dropdown toggle
    const userDropdownToggle = document.getElementById('user-dropdown-toggle');
    const userDropdownMenu = document.getElementById('user-dropdown-menu');
    
    if (userDropdownToggle && userDropdownMenu) {
        userDropdownToggle.addEventListener('click', function() {
            userDropdownMenu.classList.toggle('show');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!userDropdownToggle.contains(event.target) && !userDropdownMenu.contains(event.target)) {
                userDropdownMenu.classList.remove('show');
            }
        });
    }
    
    // Update current date and time
    function updateDateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const date = now.toLocaleDateString('en-US', options);
        const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
        
        const dateElement = document.getElementById('current-date');
        const timeElement = document.getElementById('current-time');
        
        if (dateElement) dateElement.textContent = date;
        if (timeElement) timeElement.textContent = time;
    }
    
    updateDateTime();
    setInterval(updateDateTime, 1000);
});
</script>
