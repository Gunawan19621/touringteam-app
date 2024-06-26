<!-- Create Modal -->
<div class="modal fade" id="createDocumentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Dokumen</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="createDocumentForm" name="createDocumentForm" class="form-horizontal">
                    <div class="form-group mb-2">
                        <label for="name" class="control-label">Nama Dokumen <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required
                            placeholder="Masukan Nama Dokumen">
                    </div>
                    <div class="form-group mb-2">
                        <label for="expired" class="control-label">Expired Dokumen <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="expired" name="expired" required
                            placeholder="Masukan Tanggal Expired">
                    </div>
                    <div class="mb-2 row">
                        <div class="form-group col-md-5">
                            <label for="duration" class="control-label">Durasi</label>
                            <input type="number" name="duration" class="form-control" id="duration"
                                placeholder="Masukan durasi">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="duration_type" class="control-label">Kategori</label>
                            <select id="duration_type" class="form-select" name="duration_type">
                                <option selected disabled>Pilih kategori durasinya</option>
                                <option value="day">Hari</option>
                                <option value="month">Bulan</option>
                                <option value="year">Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="reminder" class="control-label">Pengingat</label>
                        <input type="number" class="form-control" id="reminder" name="reminder"
                            placeholder="Masukan berapa hari pengingat di aktifkan">
                    </div>
                    <div class="form-group mb-2">
                        <label for="expired" class="control-label">Deskripsi Dokumen</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="createSaveBtn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editDocumentModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Dokumen</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="editDocumentForm" name="editDocumentForm" class="form-horizontal">
                    <input type="hidden" name="document_id" id="edit_document_id">
                    <div class="form-group mb-2">
                        <label for="edit_name" class="control-label">Nama Dokumen <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name" name="name" required
                            placeholder="Masukan Nama Dokumen">
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_expired" class="control-label">Expired Dokumen <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="edit_expired" name="expired" required
                            placeholder="Masukan Tanggal Expired">
                    </div>
                    <div class="mb-2 row">
                        <div class="form-group col-md-5">
                            <label for="edit_duration" class="control-label">Durasi</label>
                            <input type="number" name="duration" class="form-control" id="edit_duration"
                                placeholder="Masukan durasi">
                        </div>
                        <div class="form-group col-md-7">
                            <label for="edit_duration_type" class="control-label">Kategori</label>
                            <select id="edit_duration_type" class="form-select" name="duration_type">
                                <option value="" selected disabled>Pilih kategori durasinya</option>
                                <option value="day">Hari</option>
                                <option value="month">Bulan</option>
                                <option value="year">Tahun</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="edit_reminder" class="control-label">Pengingat</label>
                            <input type="number" class="form-control" id="edit_reminder" name="reminder"
                                placeholder="Masukan berapa hari pengingat di aktifkan">
                        </div>
                        <div class="form-group mb-2">
                            <label for="edit_description" class="control-label">Deskripsi Dokumen</label>
                            <textarea name="description" id="edit_description" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="editSaveBtn">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
