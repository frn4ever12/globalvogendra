<script src="{{ asset('plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('plugins/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteBtn', function() {
            var id = $(this).data('id');
            var deleteRoute = $(this).data('route');
            Swal.fire({
                title: 'Do you want to delete the data ?',
                text: 'Deleted data will not be recovered !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteRoute,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 200) {
                                Swal.fire(
                                    'Delete Successfull',
                                    'Data has been deleted!',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed || result
                                        .isDismissed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Faild to delete!',
                                    'Error',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'समस्या आएको छ !',
                                'मेट्न असफल भएको छ।',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>