<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle ?? 'Dashboard' }} - {{ $setting->name ?? 'Admin Panel' }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Admin CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/admin-modern.css') }}">
    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    @yield('head')
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobile-overlay"></div>
    
    @include('Admin.includes.modern-sidebar')
    
    <div class="main-content">
        @include('Admin.includes.modern-header')
        
        <main class="dashboard-content">
            @yield('content')
        </main>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <!-- Admin Dashboard Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            const mobileOverlay = document.getElementById('mobile-overlay');
            
            if (hamburgerBtn && sidebar && mainContent) {
                hamburgerBtn.addEventListener('click', function() {
                    if (window.innerWidth <= 1024) {
                        // Mobile: show/hide sidebar with overlay
                        sidebar.classList.toggle('show');
                        if (mobileOverlay) {
                            mobileOverlay.classList.toggle('show');
                        }
                    } else {
                        // Desktop: collapse/expand sidebar
                        sidebar.classList.toggle('collapsed');
                        mainContent.classList.toggle('expanded');
                    }
                });
            }
            
            // Mobile overlay click to close sidebar
            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', function() {
                    sidebar.classList.remove('show');
                    mobileOverlay.classList.remove('show');
                });
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
