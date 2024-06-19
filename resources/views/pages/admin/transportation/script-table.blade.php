<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new Kendaraan modal
        $('#createNewKendaraan').click(function() {
            $('#createSaveBtn').val("create-transportation"); // id button untuk simpan data
            $('#createKendaraanForm').trigger("reset"); // Mereset form input
            $('#createKendaraanModal').modal('show'); // Menampilkan modal Kendaraan
        });
        // Save created Kendaraan
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();
            let formData = new FormData($('#createKendaraanForm')[0]);

            $.ajax({
                data: formData,
                url: "{{ route('dashboard.transportation.store') }}",
                type: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
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

        // Edit Kendaraan modal
        $('body').on('click', '.editKendaraan', function() {
            var transportation_id = $(this).data('id');
            $.get("{{ route('dashboard.transportation.index') }}" + '/' + transportation_id + '/edit',
                function(data) {
                    console.log(data);
                    $('#editKendaraanModal').modal('show');
                    $('#edit_transportation_id').val(data.id);
                    $('#edit_type').val(data.type);
                    $('#edit_name').val(data.name);
                    $('#edit_machine').val(data.machine);
                    $('#edit_thn_beli').val(data.thn_beli);
                    $('#edit_thn_rakit').val(data.thn_rakit);
                    $('#edit_plat_no').val(data.plat_no);
                    $('#edit_description').val(data.description);
                });
        });
        // Save edited Kendaraan
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            var transportation_id = $('#edit_transportation_id').val();

            let formData = new FormData($('#editKendaraanForm')[0]);
            formData.append('_method', 'PUT'); // Add _method field for PUT request

            $.ajax({
                data: formData,
                url: "{{ route('dashboard.transportation.update', ':id') }}".replace(':id',
                    transportation_id),
                type: "POST",
                dataType: 'json',
                processData: false,
                contentType: false,
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
        $('#createKendaraanModal, #editKendaraanModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete Kendaraan
        $('body').on('click', '.deleteKendaraan', function() {
            var transportation_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.transportation.destroy', '') }}/" +
                        transportation_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // Show Kendaraan
        $('body').on('click', '.showKendaraan', function() {
            var transportation_id = $(this).data("id");
            $.get("{{ route('dashboard.transportation.index') }}" + '/' + transportation_id, function(
                data) {
                $('#show_type').val(data.type ? data.type : '-');
                $('#show_thn_beli').val(data.thn_beli ? data.thn_beli : '-');
                $('#show_thn_rakit').val(data.thn_rakit ? data.thn_rakit : '-');
                $('#show_name').val(data.name ? data.name : '-');
                $('#show_machine').val(data.machine ? data.machine : '-');
                $('#show_plat_no').val(data.plat_no ? data.plat_no : '-');
                $('#show_description').val(data.description ? data.description : '-');
                // Set gambar kendaraan
                if (data.foto_kendaraan) {
                    var fotoUrl = '/uploads/kendaraan/' + data.foto_kendaraan;
                    $('#show_foto_kendaraan').attr('src', fotoUrl);
                    $('#download_foto').attr('href', fotoUrl); // Set URL download foto
                    $('#download_foto').removeClass('d-none'); // Tampilkan tombol download
                } else {
                    $('#show_foto_kendaraan').attr('src',
                        '/placeholder.jpg'
                        ); // Ganti dengan placeholder gambar jika tidak ada foto
                    $('#download_foto').attr('href',
                        '#'); // Kosongkan URL download jika tidak ada foto
                    $('#download_foto').addClass('d-none'); // Sembunyikan tombol download
                }
                $('#showKendaraanModal').modal('show');
            });
        });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createKendaraanForm').trigger("reset");
                    $('#createKendaraanModal').modal('hide');
                } else if (action === "edit") {
                    $('#editKendaraanForm').trigger("reset");
                    $('#editKendaraanModal').modal('hide');
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
