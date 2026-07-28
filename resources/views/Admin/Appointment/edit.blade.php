@extends('Admin.includes.main')
@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h3><b>Edit Appointment<span style="color: red; font-size: 1.3rem; "></span></b></h3>
    </div>
    <form action="{{ route('admin.appointment.update',$appointment->id) }}" method="POST" class="newsletter-form">
        @method('PUT')
        @csrf
        <div  style="margin-bottom: 1rem;">
            <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$appointment->name}}">
        </div>
        <div class="row " style="margin-bottom: 1rem;">
            <div class="col-sm-6">
                <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{$appointment->email}}">
            </div>
            <div class="col-sm-6">
                <label for="phone" class="form-label">Phone <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$appointment->phone}}">
            </div>
        </div>
        <div  style="margin-bottom: 1rem;">
            <label for="address" class="form-label">Address <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{$appointment->address}}">
        </div>
        <div class="row " style="margin-bottom: 1rem;">
            <div class="col-sm-6">
                <label for="date" class="form-label">Appointment Date <span style="color: red;">*</span></label>
                <input type="date" class="form-control" id="date" name="appointment_date" value="{{$appointment->appointment_date}}">
            </div>
            <div class="col-sm-6">
                <label for="time" class="form-label">Appointment Time <span style="color: red;">*</span></label>
                <input type="time" class="form-control" id="time" name="appointment_time" value="{{$appointment->appointment_time}}">
            </div>
        </div>
        <div style="margin-bottom: 1rem;">
            <label>Status </label>
           <select name="status" class="form-control">
            <option value="" selected disabled>Choose a status</option>
            <option value="1" {{$appointment->status==1?'selected':''}}>Active</option>
            <option value="0" {{$appointment->status==0?'selected':''}}>Deactive</option>
           </select>
            @error('status')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div >
            <button type="submit" class="btn" style="background-color: rgb(15, 74, 92);color:white;" type="submit">Make
                Appointment</button>
        </div>
    </form>
@endsection
