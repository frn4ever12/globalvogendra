<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
<!-- FastClick CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<!-- NProgress CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<!-- jQuery custom content scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo e(asset('dist/js/custom.min.js')); ?>?v=<?php echo e(time()); ?>"></script>
<script>
    $(document).ready(function() {
        $('#logOutBtn').on('click', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?php echo e(route('logout')); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>' // Include CSRF token
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
            $('#alert').fadeOut();
        }, 5000);
        $('.close').on('click', function() {
            $('#alert').fadeOut();
        });
    });
</script><?php /**PATH D:\global consultancy\resources\views/Admin/includes/bottom.blade.php ENDPATH**/ ?>