<form action="{{ route('appointment.store') }}" method="POST" class="newsletter-form">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name <span style="color: red;">*</span></label>
        <input type="text" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="name" name="name">
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="email" class="form-label">Email <span style="color: red;">*</span></label>
            <input type="email" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="email" name="email">
        </div>
        <div class="col-6">
            <label for="phone" class="form-label">Phone <span style="color: red;">*</span></label>
            <input type="text" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="phone" name="phone">
        </div>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address <span style="color: red;">*</span></label>
        <input type="text" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="address" name="address">
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="date" class="form-label">Appointment Date <span
                    style="color: red;">*</span></label>
            <input type="date" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="date" name="appointment_date">
        </div>
        <div class="col-6">
            <label for="time" class="form-label">Appointment Time <span
                    style="color: red;">*</span></label>
            <input type="time" class="form-control" style="background-color: rgba(232, 232, 232, 0.564);" id="time" name="appointment_time">
        </div>
    </div>
    <div class="my-4">
        <button type="submit" class="btn" style="background-color: rgb(22, 61, 146);color:white;"
            type="submit">Send Application</button>
    </div>
</form>