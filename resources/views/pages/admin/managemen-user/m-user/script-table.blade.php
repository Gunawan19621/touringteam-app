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
            $('#createSaveBtn').val("create-user"); // id button untuk simpan data
            $('#createUserForm').trigger("reset"); // Mereset form input
            $('#createUserModal').modal('show'); // Menampilkan modal Role
        });
        // Save created user
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#createUserForm').serialize(),
                url: "{{ route('dashboard.user.store') }}",
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
            var user_id = $('#edit_user_id').val();

            $.ajax({
                data: $('#editUserForm').serialize(),
                url: "{{ route('dashboard.user.update', ':id') }}".replace(':id', user_id),
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
        $('#createUserModal, #editUserModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete user
        $('body').on('click', '.deleteUser', function() {
            var user_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.user.destroy', '') }}/" + user_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // Show user
        $('body').on('click', '.showUser', function() {
            var user_id = $(this).data("id");
            $.get("{{ route('dashboard.user.index') }}" + '/' + user_id, function(data) {
                var username = data.username ? data.username : '-';
                var fullname = data.fullname ? data.fullname : '-';
                var kode = data.kode ? data.kode : '-';
                var email = data.email ? data.email : '-';
                var no_phone = data.no_phone ? data.no_phone : '-';
                var gender = data.gender ? data.gender : '-';
                var address = data.address ? data.address : '-';
                var point = data.point ? data.point : '-';
                var avatar = data.avatar ? data.avatar : '-';
                alert('Username: ' + username + '\nNama Lengkap: ' + fullname +
                    '\nKode Referral Anda: ' + kode + '\nEmail: ' + email +
                    '\nNo. Telepon: ' + no_phone + '\nJenis Kelamin: ' + gender +
                    '\nAlamat: ' + address + '\nPoin: ' + point + '\nAvatar: ' +
                    avatar);
            });
        });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createUserForm').trigger("reset");
                    $('#createUserModal').modal('hide');
                } else if (action === "edit") {
                    $('#editUserForm').trigger("reset");
                    $('#editUserModal').modal('hide');
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
                    // case "erordelete":
                    //     Swal.fire({
                    //         title: "Error!",
                    //         text: "Role Gagal di Hapus!",
                    //         icon: "error",
                    //         confirmButtonColor: "#4a4fea",
                    //         confirmButtonText: "Coba Lagi"
                    //     }).then((result) => {
                    //         if (result.isConfirmed) {
                    //             location.reload();
                    //         }
                    //     });
                    //     break;
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
