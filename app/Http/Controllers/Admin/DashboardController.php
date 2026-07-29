<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\University;
use App\Models\Program;
use App\Models\Course;
use App\Models\Service;
use App\Models\Event;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $setting = \App\Models\SiteSetting::first();
        
        $countriesCount = Country::count();
        $universitiesCount = University::count();
        $programsCount = Program::count();
        $coursesCount = Course::count();
        $servicesCount = Service::count();
        $eventsCount = Event::count();
        $appointmentsCount = Appointment::count();
        
        $events = Event::orderBy('date', 'asc')->take(5)->get();
        $appointments = Appointment::orderBy('date', 'asc')->take(5)->get();
        
        return view('Admin.dashboard-modern', compact(
            'setting',
            'countriesCount',
            'universitiesCount',
            'programsCount',
            'coursesCount',
            'servicesCount',
            'eventsCount',
            'appointmentsCount',
            'events',
            'appointments'
        ));
    }
}
