<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new Sparepart modal
        $('#createNewSparepart').click(function() {
            $('#createSaveBtn').val("create-sparepart"); // id button untuk simpan data
            $('#createSparepartForm').trigger("reset"); // Mereset form input
            $('#createSparepartModal').modal('show'); // Menampilkan modal Role
        });
        // Save created Sparepart
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#createSparepartForm').serialize(),
                url: "{{ route('dashboard.sparepart.store') }}",
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

        // Edit Sparepart modal
        $('body').on('click', '.editSparepart', function() {
            var sparepart_id = $(this).data('id');
            $.get("{{ route('dashboard.sparepart.index') }}" + '/' + sparepart_id + '/edit', function(
                data) {
                console.log(data);
                $('#editSparepartModal').modal('show');
                $('#edit_sparepart_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_est_price').val(data.est_price);
                $('#edit_duration').val(data.duration);
                $('#edit_duration_type').val(data.duration_type || '');
                $('#edit_reminder').val(data.reminder);
                $('#edit_last_service').val(data.last_service);
                $('#edit_description').val(data.description);
            });
        });
        // Save edited Sparepart
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            var sparepart_id = $('#edit_sparepart_id').val();

            $.ajax({
                data: $('#editSparepartForm').serialize(),
                url: "{{ route('dashboard.sparepart.update', ':id') }}".replace(':id',
                    sparepart_id),
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
        $('#createSparepartModal, #editSparepartModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete Sparepart
        $('body').on('click', '.deleteSparepart', function() {
            var sparepart_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.sparepart.destroy', '') }}/" + sparepart_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // Show Sparepart
        $('body').on('click', '.showSparepart', function() {
            var sparepart_id = $(this).data("id");
            $.get("{{ route('dashboard.sparepart.index') }}" + '/' + sparepart_id, function(data) {
                var name = data.name ? data.name : '-';
                var est_price = data.est_price ? data.est_price : '-';
                var duration = data.duration ? data.duration : '-';
                var duration_type = data.duration_type ? data.duration_type : '-';
                var reminder = data.reminder ? data.reminder : '-';
                var last_service = data.last_service ? data.last_service : '-';
                var description = data.description ? data.description : '-';

                if (duration_type !== '-') {
                    duration += ' ' + (duration_type === 'day' ? 'Hari' :
                        (duration_type === 'month' ? 'Bulan' :
                            (duration_type === 'year' ? 'Tahun' : '')));
                }

                alert('Nama Sparepart : ' + name + '\nPerkiran Harga : ' + est_price +
                    '\nDurasi : ' +
                    duration + '\nPengingat : ' + reminder + '\nTerahir Service : ' +
                    last_service + '\nDeskripsi : ' + description);
            });
        });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createSparepartForm').trigger("reset");
                    $('#createSparepartModal').modal('hide');
                } else if (action === "edit") {
                    $('#editSparepartForm').trigger("reset");
                    $('#editSparepartModal').modal('hide');
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
