@extends('Admin.includes.modern-main')

@section('content')
<!-- Stat Cards -->
<div class="stat-cards">
    <x-admin-components.stat-card 
        title="Total Countries" 
        value="{{ $countriesCount ?? 0 }}" 
        icon="globe" 
        color="primary"
        :trend="'up'"
        :trendValue="'12'"
        :link="route('admin.country.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Universities" 
        value="{{ $universitiesCount ?? 0 }}" 
        icon="university" 
        color="success"
        :trend="'up'"
        :trendValue="'8'"
        :link="route('admin.university.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Programs" 
        value="{{ $programsCount ?? 0 }}" 
        icon="graduation-cap" 
        color="warning"
        :trend="'up'"
        :trendValue="'15'"
        :link="route('admin.program.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Courses" 
        value="{{ $coursesCount ?? 0 }}" 
        icon="book" 
        color="danger"
        :trend="'down'"
        :trendValue="'3'"
        :link="route('admin.course.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Services" 
        value="{{ $servicesCount ?? 0 }}" 
        icon="cogs" 
        color="primary"
        :trend="'up'"
        :trendValue="'5'"
        :link="route('admin.service.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Events" 
        value="{{ $eventsCount ?? 0 }}" 
        icon="calendar-alt" 
        color="success"
        :trend="'up'"
        :trendValue="'20'"
        :link="route('admin.event.index')"
    />
    
    <x-admin-components.stat-card 
        title="Total Appointments" 
        value="{{ $appointmentsCount ?? 0 }}" 
        icon="calendar-check" 
        color="warning"
        :trend="'up'"
        :trendValue="'10'"
        :link="route('admin.appointment.index')"
    />
    
    <x-admin-components.stat-card 
        title="Website Visitors" 
        value="{{ $visitorsCount ?? 1250 }}" 
        icon="users" 
        color="danger"
        :trend="'up'"
        :trendValue="'25'"
    />
</div>

<!-- Charts Section -->
<div class="charts-section">
    <x-admin-components.chart-card 
        title="Admissions by Country"
        chartId="admissionsChart"
        type="bar"
        :data="[
            'labels' => ['USA', 'UK', 'Australia', 'Canada', 'Germany', 'New Zealand'],
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => [150, 120, 80, 95, 60, 45],
                    'backgroundColor' => 'rgba(37, 99, 235, 0.8)',
                    'borderColor' => 'rgba(37, 99, 235, 1)',
                    'borderWidth' => 1
                ]
            ]
        ]"
    />
    
    <x-admin-components.chart-card 
        title="Programs Distribution"
        chartId="programsChart"
        type="doughnut"
        :data="[
            'labels' => ['Undergraduate', 'Postgraduate', 'PhD', 'Diploma', 'Certificate'],
            'datasets' => [
                [
                    'label' => 'Programs',
                    'data' => [35, 25, 15, 15, 10],
                    'backgroundColor' => [
                        'rgba(37, 99, 235, 0.8)',
                        'rgba(22, 163, 74, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(139, 92, 246, 0.8)'
                    ],
                    'borderColor' => [
                        'rgba(37, 99, 235, 1)',
                        'rgba(22, 163, 74, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(239, 68, 68, 1)',
                        'rgba(139, 92, 246, 1)'
                    ],
                    'borderWidth' => 1
                ]
            ]
        ]"
    />
</div>

<!-- Data Tables Section -->
<div class="tables-section">
    <x-admin-components.table-card 
        title="Recent Appointments"
        :columns="['Student', 'Country', 'Program', 'Status', 'Date']"
        :rows="[
            ['John Doe', 'USA', 'MBA', '<span class="badge badge-success">Confirmed</span>', '2024-01-15'],
            ['Jane Smith', 'UK', 'MSc Computer Science', '<span class="badge badge-warning">Pending</span>', '2024-01-14'],
            ['Mike Johnson', 'Australia', 'BBA', '<span class="badge badge-success">Confirmed</span>', '2024-01-13'],
            ['Sarah Wilson', 'Canada', 'PhD Engineering', '<span class="badge badge-danger">Cancelled</span>', '2024-01-12'],
            ['Tom Brown', 'Germany', 'MBA', '<span class="badge badge-success">Confirmed</span>', '2024-01-11']
        ]"
        :link="route('admin.appointment.index')"
    />
    
    <x-admin-components.table-card 
        title="Latest Contact Inquiries"
        :columns="['Name', 'Email', 'Subject', 'Status', 'Date']"
        :rows="[
            ['Alice Green', 'alice@email.com', 'Admission Inquiry', '<span class="badge badge-info">New</span>', '2024-01-15'],
            ['Bob White', 'bob@email.com', 'Course Info', '<span class="badge badge-success">Resolved</span>', '2024-01-14'],
            ['Charlie Black', 'charlie@email.com', 'Visa Assistance', '<span class="badge badge-warning">In Progress</span>', '2024-01-13']
        ]"
    />
</div>

<!-- Calendar Section -->
<x-admin-components.calendar-card 
    :events="$events ?? collect()"
    :appointments="$appointments ?? collect()"
/>

<!-- Recent Activity -->
<x-admin-components.activity-timeline 
    :activities="[
        ['title' => 'New Program Added', 'time' => '2 hours ago'],
        ['title' => 'University Updated', 'time' => '4 hours ago'],
        ['title' => 'Banner Published', 'time' => '6 hours ago'],
        ['title' => 'Appointment Booked', 'time' => '8 hours ago'],
        ['title' => 'New Service Created', 'time' => '1 day ago']
    ]"
/>

<!-- Quick Actions -->
<div class="quick-actions">
    <div class="quick-actions-header">
        <h3 class="quick-actions-title">Quick Actions</h3>
    </div>
    <div class="quick-actions-grid">
        <a href="{{ route('admin.country.create') }}" class="quick-action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>Add Country</span>
        </a>
        <a href="{{ route('admin.university.create') }}" class="quick-action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>Add University</span>
        </a>
        <a href="{{ route('admin.program.create') }}" class="quick-action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>Add Program</span>
        </a>
        <a href="{{ route('admin.service.create') }}" class="quick-action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>Add Service</span>
        </a>
        <a href="{{ route('admin.hero-banner.create') }}" class="quick-action-btn">
            <i class="fas fa-plus-circle"></i>
            <span>Add Banner</span>
        </a>
    </div>
</div>
@endsection
