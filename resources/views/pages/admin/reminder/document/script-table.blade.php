<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Proses CRUD yang di pakai -->
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create new Document modal
        $('#createNewDocument').click(function() {
            $('#createSaveBtn').val("create-document"); // id button untuk simpan data
            $('#createDocumentForm').trigger("reset"); // Mereset form input
            $('#createDocumentModal').modal('show'); // Menampilkan modal Role
        });
        // Save created Document
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();

            $.ajax({
                data: $('#createDocumentForm').serialize(),
                url: "{{ route('dashboard.document.store') }}",
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

        // Edit Document modal
        $('body').on('click', '.editDocument', function() {
            var document_id = $(this).data('id');
            $.get("{{ route('dashboard.document.index') }}" + '/' + document_id + '/edit', function(
                data) {
                console.log(data);
                $('#editDocumentModal').modal('show');
                $('#edit_document_id').val(data.id);
                $('#edit_name').val(data.name);
                $('#edit_expired').val(data.expired);
                $('#edit_duration').val(data.duration);
                $('#edit_duration_type').val(data.duration_type || '');
                $('#edit_description').val(data.description);
                $('#edit_reminder').val(data.reminder);
            });
        });
        // Save edited Document
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            var document_id = $('#edit_document_id').val();

            $.ajax({
                data: $('#editDocumentForm').serialize(),
                url: "{{ route('dashboard.document.update', ':id') }}".replace(':id',
                    document_id),
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
        $('#createDocumentModal, #editDocumentModal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger("reset"); // Mereset form input
            $('.alert-danger').addClass('d-none'); // Sembunyikan alert error
            $('.alert-danger').html(''); // Kosongkan konten alert error
            $('.alert-success').addClass('d-none'); // Sembunyikan alert sukses
            $('.alert-success').html(''); // Kosongkan konten alert sukses
        });

        // Delete Document
        $('body').on('click', '.deleteDocument', function() {
            var document_id = $(this).data("id");

            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.document.destroy', '') }}/" + document_id,
                    success: function(data) {
                        swalSwitch("successdelete", data.success);
                    },
                    error: function(data) {
                        swalSwitch("erordelete", data.error);
                    }
                });
            }
        });

        // Show Document
        $('body').on('click', '.showDocument', function() {
            var document_id = $(this).data("id");
            $.get("{{ route('dashboard.document.index') }}" + '/' + document_id, function(data) {
                var name = data.name ? data.name : '-';
                var expired = data.expired ? data.expired : '-';
                var duration = data.duration ? data.duration : '-';
                var duration_type = data.duration_type ? data.duration_type : '-';
                var reminder = data.reminder ? data.reminder : '-';
                var description = data.description ? data.description : '-';

                if (duration_type !== '-') {
                    duration += ' ' + (duration_type === 'day' ? 'Hari' :
                        (duration_type === 'month' ? 'Bulan' :
                            (duration_type === 'year' ? 'Tahun' : '')));
                }

                alert('Nama Dokumen : ' + name + '\nExpired : ' + expired + '\nDurasi : ' +
                    duration + '\nPengingat : ' + reminder + '\nDeskripsi : ' + description);
            });
        });

        // Handle Response edit dan create
        function handleResponse(response, action) {
            if (response.success) {
                if (action === "create") {
                    $('#createDocumentForm').trigger("reset");
                    $('#createDocumentModal').modal('hide');
                } else if (action === "edit") {
                    $('#editDocumentForm').trigger("reset");
                    $('#editDocumentModal').modal('hide');
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
