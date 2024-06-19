<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new role modal
        $('#createNewRole').click(function() {
            $('#createSaveBtn').val("create-role"); // id button untuk simpan data
            $('#createRoleForm').trigger("reset"); // Mereset form input
            $('#createRoleModal').modal('show'); // Menampilkan modal Role
        });
        // Save created Role
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#createRoleForm').serialize(),
                url: "{{ route('dashboard.role.store') }}",
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

        // Edit Role modal
        $('body').on('click', '.editRole', function() {
            var role_id = $(this).data('id');
            $.get("{{ route('dashboard.role.index') }}" + '/' + role_id + '/edit', function(data) {
                console.log(data);
                $('#editRoleModal').modal('show');
                $('#edit_role_id').val(data.id);
                $('#edit_rolename').val(data.rolename);
                $('#edit_description').val(data.description);
            });
        });
        // Save edited Role
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            var role_id = $('#edit_role_id').val();

            $.ajax({
                data: $('#editRoleForm').serialize(),
                url: "{{ route('dashboard.role.update', ':id') }}".replace(':id', role_id),
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
        $('#createRoleModal, #editRoleModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete Role
        $('body').on('click', '.deleteRole', function() {
            var role_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.role.destroy', '') }}/" + role_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // Show Role
        $('body').on('click', '.showRole', function() {
            var role_id = $(this).data("id");
            $.get("{{ route('dashboard.role.index') }}" + '/' + role_id, function(data) {
                var rolename = data.rolename ? data.rolename : '-';
                var description = data.description ? data.description : '-';
                alert('Rolename : ' + rolename + '\nDescription : ' + description);
            });
        });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createRoleForm').trigger("reset");
                    $('#createRoleModal').modal('hide');
                } else if (action === "edit") {
                    $('#editRoleForm').trigger("reset");
                    $('#editRoleModal').modal('hide');
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
