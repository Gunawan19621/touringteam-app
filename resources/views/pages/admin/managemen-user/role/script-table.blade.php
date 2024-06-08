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
            $('#createSaveBtn').val("create-role");
            $('#createRoleForm').trigger("reset");
            $('#createRoleModal').modal('show');
        });
        // Save created Role
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#createRoleForm').serialize(),
                url: "{{ route('dashboard.role.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#createRoleForm').trigger("reset");
                    $('#createRoleModal').modal('hide');
                    swalSwitch("successcreate");
                },
                error: function(data) {
                    $('#createRoleForm').trigger("reset");
                    $('#createRoleModal').modal('hide');
                    swalSwitch("erorcreate");
                }
            });
        });

        // Edit Role modal
        $('body').on('click', '.editRole', function() {
            var role_id = $(this).data('id');
            $.get("{{ route('dashboard.role.index') }}" + '/' + role_id + '/edit', function(data) {
                console.log(
                    data
                );
                $('#editRoleModal').modal('show');
                $('#edit_role_id').val(data.id);
                $('#edit_rolename').val(data.rolename);
                $('#edit_description').val(data.description);
            });
        });
        // Save edited Role
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            var role_id = $('#edit_role_id').val();

            $.ajax({
                data: $('#editRoleForm').serialize(),
                url: "{{ route('dashboard.role.update', ':id') }}".replace(':id', role_id),
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    $('#editRoleForm').trigger("reset");
                    $('#editRoleModal').modal('hide');
                    swalSwitch("successedit");
                },
                error: function(data) {
                    $('#editRoleForm').trigger("reset");
                    $('#editRoleModal').modal('hide');
                    swalSwitch("eroredit");
                }
            });
        });

        // Delete Role
        $('body').on('click', '.deleteRole', function() {
            var role_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.role.destroy', '') }}/" + role_id,
                    success: function(data) {
                        swalSwitch("successdelete");
                    },
                    error: function(data) {
                        swalSwitch("erordelete");
                    }
                });
            }
        });

        // Show Role
        $('body').on('click', '.showRole', function() {
            var role_id = $(this).data("id");
            $.get("{{ route('dashboard.role.index') }}" + '/' + role_id, function(data) {
                alert('Rolename : ' + data.rolename + '\nDescription : ' + data.description);
            });
        });

        // SweetAlert2 Switch Alert Function
        function swalSwitch(action) {
            switch (action) {
                // Proses Tambah / Create
                case "successcreate":
                    Swal.fire({
                        title: "Success!",
                        text: "ROle Berhasil di Tambahkan!",
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;
                case "erorcreate":
                    Swal.fire({
                        title: "Error!",
                        text: "Role Gagal di Tambahkan!",
                        icon: "error",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "Coba Lagi"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;

                    // Proses Edit
                case "successedit":
                    Swal.fire({
                        title: "Success!",
                        text: "Role Berhasil di Update!",
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;
                case "eroredit":
                    Swal.fire({
                        title: "Error!",
                        text: "Role Gagal di Update!",
                        icon: "error",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "Coba Lagi"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;

                    // Proses Delete
                case "successdelete":
                    Swal.fire({
                        title: "Success!",
                        text: "Role Berhasil di Hapus!",
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
                        text: "Role Gagal di Hapus!",
                        icon: "error",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "Coba Lagi"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    break;
            }
        }
    });
</script>
