<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        return view('Admin.Appointment.index');
    }
    public function edit(Appointment $appointment){
        return view('Admin.Appointment.edit',compact('appointment'));
    }
    public function update(Request $request,Appointment $appointment){
        $validatedData=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'appointment_date'=>'required',
            'appointment_time'=>'required',
            'status'=>'nullable|in:0,1',
        ]);
        $appointment->update($validatedData);
        return redirect()->route('admin.appointment.index')->with('success', 'Data has been saved Successfully.');
    }
    public function destroy(Appointment $appointment)
    {
        try {
            if ($appointment) {
                $appointment->delete();
                return response()->json(['status' => 200, 'message' => 'Data deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 404, 'message' => 'Data not found'], 404);
        }
    }
}
