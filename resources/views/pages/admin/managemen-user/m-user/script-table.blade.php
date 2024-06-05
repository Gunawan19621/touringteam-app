<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new user modal
        $('#createNewUser').click(function() {
            $('#createSaveBtn').val("create-user");
            $('#createUserForm').trigger("reset");
            $('#createUserModal').modal('show');
        });
        // Save created user
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#createUserForm').serialize(),
                url: "{{ route('dashboard.user.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#createUserForm').trigger("reset");
                    $('#createUserModal').modal('hide');
                    swalSwitch("successcreate");
                },
                error: function(data) {
                    $('#createUserForm').trigger("reset");
                    $('#createUserModal').modal('hide');
                    swalSwitch("erorcreate");
                }
            });
        });

        // Edit user modal
        $('body').on('click', '.editUser', function() {
            var user_id = $(this).data('id');
            $.get("{{ route('dashboard.user.index') }}" + '/' + user_id + '/edit', function(data) {
                console.log(
                    data
                ); // Tambahkan ini untuk melihat data yang diterima sebelum di-set ke dalam form
                $('#editUserModal').modal('show');
                $('#edit_user_id').val(data.id);
                $('#edit_username').val(data.username);
                $('#edit_fullname').val(data.fullname);
                $('#edit_kode').val(data.kode);
                $('#edit_email').val(data.email);
                $('#edit_no_phone').val(data.no_phone);

                // Set gender
                if (data.gender) {
                    $('#edit_gender').val(data.gender);
                } else {
                    $('#edit_gender').val('');
                }

                $('#edit_address').val(data.address);
                $('#edit_referral_code').val(data.referral_code);
            });
        });
        // Save edited user
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            var user_id = $('#edit_user_id').val();

            $.ajax({
                data: $('#editUserForm').serialize(),
                url: "{{ route('dashboard.user.update', ':id') }}".replace(':id', user_id),
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    $('#editUserForm').trigger("reset");
                    $('#editUserModal').modal('hide');
                    swalSwitch("successedit");
                },
                error: function(data) {
                    $('#editUserForm').trigger("reset");
                    $('#editUserModal').modal('hide');
                    swalSwitch("eroredit");
                }
            });
        });

        // Delete user
        $('body').on('click', '.deleteUser', function() {
            var user_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.user.destroy', '') }}/" + user_id,
                    success: function(data) {
                        swalSwitch("successdelete");
                    },
                    error: function(data) {
                        swalSwitch("erordelete");
                    }
                });
            }
        });

        // Show user
        $('body').on('click', '.showUser', function() {
            var user_id = $(this).data("id");
            $.get("{{ route('dashboard.user.index') }}" + '/' + user_id, function(data) {
                alert('Username: ' + data.username + '\nNama Lengkap: ' + data.fullname +
                    '\nKode Referral Anda: ' + data.kode + '\nEmail: ' + data.email +
                    '\nNo. Telepon: ' + data.no_phone + '\nJenis Kelamin: ' + data.gender +
                    '\nAlamat: ' + data.address + '\nPoin: ' + data.point + '\nAvatar: ' +
                    data.avatar);
            });
        });

        // SweetAlert2 Switch Alert Function
        function swalSwitch(action) {
            switch (action) {
                // Proses Tambah / Create
                case "successcreate":
                    Swal.fire({
                        title: "Success!",
                        text: "User Berhasil di Tambahkan!",
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
                        text: "User Gagal di Tambahkan!",
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
                        text: "User Berhasil di Update!",
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
                        text: "User Gagal di Update!",
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
                        text: "User Berhasil di Hapus!",
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
                        text: "User Gagal di Hapus!",
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

<!-- Proses crud ajak tanpa alert -->
{{-- <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Create new user modal
            $('#createNewUser').click(function() {
                $('#createSaveBtn').val("create-user");
                $('#createUserForm').trigger("reset");
                $('#createUserModal').modal('show');
            });
            // Save created user
            $('#createSaveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#createUserForm').serialize(),
                    url: "{{ route('dashboard.user.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#createUserForm').trigger("reset");
                        $('#createUserModal').modal('hide');
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#createSaveBtn').html('Save Changes');
                    }
                });
            });

            // Edit user modal
            $('body').on('click', '.editUser', function() {
                var user_id = $(this).data('id');
                $.get("{{ route('dashboard.user.index') }}" + '/' + user_id + '/edit', function(data) {
                    console.log(
                        data
                    ); // Tambahkan ini untuk melihat data yang diterima sebelum di-set ke dalam form
                    $('#editUserModal').modal('show');
                    $('#edit_user_id').val(data.id);
                    $('#edit_username').val(data.username);
                    $('#edit_fullname').val(data.fullname);
                    $('#edit_kode').val(data.kode);
                    $('#edit_email').val(data.email);
                    $('#edit_no_phone').val(data.no_phone);
                    $('#edit_gender').val(data.gender);
                    $('#edit_address').val(data.address);
                    $('#edit_referral_code').val(data.referral_code);

                });
            });
            // Save edited user
            $('#editSaveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                var user_id = $('#edit_user_id').val();

                $.ajax({
                    data: $('#editUserForm').serialize(),
                    url: "{{ route('dashboard.user.update', ':id') }}".replace(':id', user_id),
                    type: "PUT",
                    dataType: 'json',
                    success: function(data) {
                        $('#editUserForm').trigger("reset");
                        $('#editUserModal').modal('hide');
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#editSaveBtn').html('Simpan');
                    }
                });
            });

            // Delete user
            $('body').on('click', '.deleteUser', function() {
                var user_id = $(this).data("id");

                if (confirm("Apakah anda yakin ingin di hapus!")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.user.destroy', '') }}/" + user_id,
                        success: function(data) {
                            location.reload();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

            // Show user
            $('body').on('click', '.showUser', function() {
                var user_id = $(this).data("id");
                $.get("{{ route('dashboard.user.index') }}" + '/' + user_id, function(data) {
                    alert('Username: ' + data.username + '\nNama Lengkap: ' + data.fullname +
                        '\nKode Referral Anda: ' + data.kode + '\nEmail: ' + data.email +
                        '\nNo. Telepon: ' + data.no_phone + '\nJenis Kelamin: ' + data.gender +
                        '\nAlamat: ' + data.address + '\nPoin: ' + data.point + '\nAvatar: ' +
                        data.avatar);
                });
            });
        });
    </script> --}}

<!-- Proses crud ajak dengan alert alert bawaan json -->
{{-- <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Create new user modal
            $('#createNewUser').click(function() {
                $('#createSaveBtn').val("create-user");
                $('#createUserForm').trigger("reset");
                $('#createUserModal').modal('show');
            });

            // Save created user
            $('#createSaveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#createUserForm').serialize(),
                    url: "{{ route('dashboard.user.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#createUserForm').trigger("reset");
                        $('#createUserModal').modal('hide');
                        alert("Proses tambah data berhasil!");
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#createSaveBtn').html('Simpan');
                    }
                });
            });

            // Edit user modal
            $('body').on('click', '.editUser', function() {
                var user_id = $(this).data('id');
                $.get("{{ route('dashboard.user.index') }}" + '/' + user_id + '/edit', function(data) {
                    console.log(
                        data
                    ); // Tambahkan ini untuk melihat data yang diterima sebelum di-set ke dalam form
                    $('#editUserModal').modal('show');
                    $('#edit_user_id').val(data.id);
                    $('#edit_username').val(data.username);
                    $('#edit_fullname').val(data.fullname);
                    $('#edit_kode').val(data.kode);
                    $('#edit_email').val(data.email);
                    $('#edit_no_phone').val(data.no_phone);
                    $('#edit_gender').val(data.gender);
                    $('#edit_address').val(data.address);
                    $('#edit_referral_code').val(data.referral_code);
                });
            });

            // Save edited user
            $('#editSaveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                var user_id = $('#edit_user_id').val();

                $.ajax({
                    data: $('#editUserForm').serialize(),
                    url: "{{ route('dashboard.user.update', ':id') }}".replace(':id', user_id),
                    type: "PUT",
                    dataType: 'json',
                    success: function(data) {
                        $('#editUserForm').trigger("reset");
                        $('#editUserModal').modal('hide');
                        alert("Proses edit data berhasil!");
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#editSaveBtn').html('Simpan');
                    }
                });
            });

            // Delete user
            $('body').on('click', '.deleteUser', function() {
                var user_id = $(this).data("id");

                if (confirm("Apakah anda yakin ingin di hapus!")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('dashboard.user.destroy', '') }}/" + user_id,
                        success: function(data) {
                            alert("Proses hapus data berhasil!");
                            location.reload();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });

            // Show user
            $('body').on('click', '.showUser', function() {
                var user_id = $(this).data("id");
                $.get("{{ route('dashboard.user.index') }}" + '/' + user_id, function(data) {
                    alert('Username: ' + data.username + '\nNama Lengkap: ' + data.fullname +
                        '\nKode Referral Anda: ' + data.kode + '\nEmail: ' + data.email +
                        '\nNo. Telepon: ' + data.no_phone + '\nJenis Kelamin: ' + data.gender +
                        '\nAlamat: ' + data.address + '\nPoin: ' + data.point + '\nAvatar: ' +
                        data.avatar);
                });
            });
        });
    </script> --}}
