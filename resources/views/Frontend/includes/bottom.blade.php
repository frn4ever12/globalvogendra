<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#logOutBtn').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('logout') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function() {
                    window.location.href = '/'; // Redirect to home or login page
                },
                error: function(xhr) {
                    alert('Logout failed: ' + xhr.responseJSON.message);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-alert').fadeOut();
        }, 5000);

        $('.close').on('click', function() {
            $('#success-alert').fadeOut();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.openMenuBtn').click(function() {
            $('#sideMenu').css('right', '0');
            $('#overlay').fadeIn();
        });

        $('.closeMenuBtn, #overlay').click(function() {
            $('#sideMenu').css('right', '-250px');
            $('#overlay').fadeOut();
        });

        $(document).click(function(event) {
            if (!$(event.target).closest('#sideMenu, .openMenuBtn').length) {
                $('#sideMenu').css('right', '-250px');
                $('#overlay').fadeOut();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
    $('#navbarDropdown').on('click mouseenter mouseleave', function(event) {
        const dropdown = $('.dropdown-content.country');
        
        if (event.type === 'click') {
            dropdown.toggleClass('show');
        } else if (event.type === 'mouseenter') {
            dropdown.addClass('show');
        } else if (event.type === 'mouseleave') {
            dropdown.removeClass('show');
        }
        
        event.preventDefault();
    });

    $('#serviceDropdown').on('click mouseenter mouseleave', function(event) {
        const dropdown = $('.dropdown-content.service');
        
        if (event.type === 'click') {
            dropdown.toggleClass('show');
        } else if (event.type === 'mouseenter') {
            dropdown.addClass('show');
        } else if (event.type === 'mouseleave') {
            dropdown.removeClass('show');
        }
        
        event.preventDefault();
    });
});

</script>

<script src="{{ asset('dist/js/frontend.js') }}"></script>