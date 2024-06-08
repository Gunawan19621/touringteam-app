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
            $('#createSaveBtn').val("create-document");
            $('#createDocumentForm').trigger("reset");
            $('#createDocumentModal').modal('show');
        });
        // Save created Document
        $('#createSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#createDocumentForm').serialize(),
                url: "{{ route('dashboard.document.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#createDocumentForm').trigger("reset");
                    $('#createDocumentModal').modal('hide');
                    swalSwitch("successcreate");
                },
                error: function(data) {
                    $('#createDocumentForm').trigger("reset");
                    $('#createDocumentModal').modal('hide');
                    swalSwitch("erorcreate");
                }
            });
        });

        // Edit Document modal
        // $('body').on('click', '.editDocument', function() {
        //     var document_id = $(this).data('id');
        //     $.get("{{ route('dashboard.document.index') }}" + '/' + document_id + '/edit', function(
        //         data) {
        //         console.log(data);
        //         $('#editDocumentModal').modal('show');
        //         $('#edit_document_id').val(data.id);
        //         $('#edit_name').val(data.name);
        //         $('#edit_expired').val(data.expired);
        //         $('#edit_duration').val(data.duration);
        //         if (data.duration_type) {
        //             $('#edit_duration_type').val(data.duration_type);
        //         } else {
        //             $('#edit_duration_type').val('');
        //         }
        //     });
        // });
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
            });
        });


        // // Save edited Document
        // $('#editSaveBtn').click(function(e) {
        //     e.preventDefault();
        //     $(this).html('Sending..');
        //     var document_id = $('#edit_document_id').val();
        //     $.ajax({
        //         data: $('#editDocumentForm').serialize(),
        //         url: "{{ route('dashboard.document.update', ':id') }}".replace(':id',
        //             document_id),
        //         type: "PUT",
        //         dataType: 'json',
        //         success: function(data) {
        //             $('#editDocumentForm').trigger("reset");
        //             $('#editDocumentModal').modal('hide');
        //             swalSwitch("successedit");
        //         },
        //         error: function(data) {
        //             $('#editDocumentForm').trigger("reset");
        //             $('#editDocumentModal').modal('hide');
        //             swalSwitch("eroredit");
        //         }
        //     });
        // });
        // Save edited Document
        $('#editSaveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var document_id = $('#edit_document_id').val();
            $.ajax({
                data: $('#editDocumentForm').serialize(),
                url: "{{ route('dashboard.document.update', ':id') }}".replace(':id',
                    document_id),
                type: "PUT",
                dataType: 'json',
                success: function(data) {
                    $('#editDocumentForm').trigger("reset");
                    $('#editDocumentModal').modal('hide');
                    swalSwitch("successedit");
                    $(this).html('Simpan');
                },
                error: function(data) {
                    $('#editDocumentForm').trigger("reset");
                    $('#editDocumentModal').modal('hide');
                    swalSwitch("eroredit");
                    $(this).html('Simpan');
                }
            });
        });


        // Delete Document
        $('body').on('click', '.deleteDocument', function() {
            var document_id = $(this).data("id");
            if (confirm("Apakah anda yakin ingin di hapus!")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('dashboard.document.destroy', '') }}/" + document_id,
                    success: function(data) {
                        swalSwitch("successdelete");
                    },
                    error: function(data) {
                        swalSwitch("erordelete");
                    }
                });
            }
        });

        // Show Document
        $('body').on('click', '.showDocument', function() {
            var document_id = $(this).data("id");
            $.get("{{ route('dashboard.document.index') }}" + '/' + document_id, function(data) {
                var duration = data.duration + ' ' + (data.duration_type === 'day' ? 'Hari' :
                    (data.duration_type === 'month' ? 'Bulan' :
                        (data.duration_type === 'year' ? 'Tahun' : '')));
                alert('Nama Dokumen : ' + data.name + '\nExpired : ' + data.expired +
                    '\nDurasi : ' + duration);
            });
        });


        // SweetAlert2 Switch Alert Function
        function swalSwitch(action) {
            switch (action) {
                // Proses Tambah / Create
                case "successcreate":
                    Swal.fire({
                        title: "Success!",
                        text: "Document Berhasil di Tambahkan!",
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
                        text: "Document Gagal di Tambahkan!",
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
                        text: "Document Berhasil di Update!",
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
                        text: "Document Gagal di Update!",
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
                        text: "Document Berhasil di Hapus!",
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
                        text: "Document Gagal di Hapus!",
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
