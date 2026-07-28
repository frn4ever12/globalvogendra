<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function makeAppointment(Request $request){
        $validatedData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'appointment_date'=>'required',
            'appointment_time'=>'required'
        ]);
        Appointment::create($validatedData);
        return redirect()->route('home')->with('success','Your Appointment has been scheduled.');
    }
}
