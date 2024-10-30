@push('scripts')
    <script>
        $(document).ready(function() {
            $('.change-published').on('change', function() {
                const url = $(this).data('url');
                const isPublished = $(this).prop('checked');
                const token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: token,
                        is_published: isPublished ? 1 : 0
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.message,
                        });
                    }
                });
            });
        });
    </script>
@endpush
