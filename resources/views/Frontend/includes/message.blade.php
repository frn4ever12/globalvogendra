@if (session('success'))
    <div class="custom-alert" id="success-alert">
        <span> {{ session('success') }}</span>   
        &nbsp;&nbsp;
         <span class="close" aria-label="Close">&times;</span>
    </div>
@endif
@if (session('error'))
    <div class="custom-alert" id="error-alert">
        <span> {{ session('error') }}</span>
        <span class="close" aria-label="Close">&times;</span>
    </div>
@endif