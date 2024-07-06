<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.update-status-lead').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var status_lead = $(this).data('status_lead');

            $.ajax({
                type: "PUT",
                url: "{{ route('dashboard.detail-group.update', '') }}/" + id,
                data: {
                    status_lead: status_lead
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: "Success!",
                            text: response.success,
                            icon: "success",
                            confirmButtonColor: "#4a4fea",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: response.error,
                            icon: "error",
                            confirmButtonColor: "#4a4fea",
                            confirmButtonText: "Coba Lagi"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "Ada kesalahan. Silakan coba lagi.",
                        icon: "error",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "Coba Lagi"
                    });
                }
            });
        });
    });
</script>
