<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new Group modal
        $('#createNewGroup').click(function() {
            $('#createSaveBtn').val("create-group"); // id button untuk simpan data
            $('#createGroupForm').trigger("reset"); // Mereset form input
            $('#createGroupModal').modal('show'); // Menampilkan modal Group
        });
        // Save created Group
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#createGroupForm').serialize(),
                url: "{{ route('dashboard.group-touring.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    if (response.errors) {
                        console.log(response.errors);
                        $('.alert-danger').removeClass('d-none');
                        $('.alert-danger').html("<ul>");

                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value +
                                "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        handleResponse(response, "create");
                    }
                }
            });
        });

        // Edit Group modal
        $('body').on('click', '.editGroup', function() {
            var group_id = $(this).data('id');
            $.get("{{ route('dashboard.group-touring.index') }}" + '/' + group_id + '/edit', function(
                data) {
                console.log(data);
                $('#editGroupModal').modal('show');
                $('#edit_group_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_distance').val(data.distance);
                $('#edit_send_notif').val(data.send_notif);
                $('#edit_description').val(data.description);
            });
        });
        // Save edited Group
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            var group_id = $('#edit_group_id').val();

            $.ajax({
                data: $('#editGroupForm').serialize(),
                url: "{{ route('dashboard.group-touring.update', ':id') }}".replace(':id',
                    group_id),
                type: "PUT",
                dataType: 'json',
                success: function(response) {
                    if (response.errors) {
                        console.log(response.errors);
                        $('.alert-danger').removeClass('d-none');
                        $('.alert-danger').html("<ul>");

                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value +
                                "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        handleResponse(response, "edit");
                    }
                }
            });
        });

        // Reset modal ketika di close
        $('#createGroupModal, #editGroupModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete Group
        $('body').on('click', '.deleteGroup', function() {
            var group_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.group-touring.destroy', '') }}/" + group_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // // Show Group
        // $('body').on('click', '.showGroup', function() {
        //     var group_id = $(this).data("id");
        //     $.get("{{ route('dashboard.group-touring.index') }}" + '/' + group_id, function(data) {
        //         var name = data.name ? data.name : '-';
        //         var description = data.description ? data.description : '-';
        //         var send_notif = data.send_notif ? data.send_notif : '-';
        //         var distance = data.distance ? data.distance : '-';
        //         alert('Nama Grouo Touring : ' + name + '\nJarak Touring : ' + distance +
        //             '\nKirim Notifikasi : ' + send_notif + '\nDeskripsi : ' + description);
        //     });
        // });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createGroupForm').trigger("reset");
                    $('#createGroupModal').modal('hide');
                } else if (action === "edit") {
                    $('#editGroupForm').trigger("reset");
                    $('#editGroupModal').modal('hide');
                }
                swalSwitch("success", response.success);
            }
        }

        // SweetAlert2 Switch Alert Function
        function swalSwitch(action, message = '') {
            switch (action) {
                // switch alert success create
                case "success":
                    Swal.fire({
                        title: "Success!",
                        text: message,
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;

                    // switch alert delete
                case "successdelete":
                    Swal.fire({
                        title: "Success!",
                        text: message,
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;
                case "erordelete":
                    Swal.fire({
                        title: "Error!",
                        text: message,
                        icon: "error",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "Coba Lagi"
                    });
                    break;
            }
        }
    });
</script>
