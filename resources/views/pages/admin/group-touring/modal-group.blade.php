<!-- Create Modal -->
<div class="modal fade" id="createGroupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Group</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="createGroupForm" name="createGroupForm" class="form-horizontal">
                    <div class="form-group mb-2">
                        <label for="name" class="control-label">Nama Group <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" required
                            placeholder="Masukan Nama Group">
                    </div>
                    <div class="form-group mb-2">
                        <label for="distance" class="control-label">Jarak</label>
                        <input type="number" class="form-control" id="distance" name="distance"
                            placeholder="Masukan Jarak Touring">
                    </div>
                    <div class="form-group mb-2">
                        <label for="send_notif" class="control-label">Kirim Notifikasi<span
                                class="text-danger">*</span></label>
                        <select id="send_notif" class="form-select" name="send_notif">
                            <option selected disabled>Kirim Notifikasi Ke</option>
                            <option value="pic">Pic</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="control-label">Deskripsi Group</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Group"></textarea>
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
<div class="modal fade" id="editGroupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Group</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="editGroupForm" name="editGroupForm" class="form-horizontal">
                    <input type="hidden" name="group_id" id="edit_group_id">
                    <div class="form-group mb-2">
                        <label for="edit_name" class="control-label">Nama Group <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_name" name="name" required
                            placeholder="Masukan Nama Group">
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_distance" class="control-label">Jarak</label>
                        <input type="number" class="form-control" id="edit_distance" name="distance"
                            placeholder="Masukan Jarak Touring">
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_send_notif" class="control-label">Kirim Notifikasi<span
                                class="text-danger">*</span></label>
                        <select id="edit_send_notif" class="form-select" name="send_notif">
                            <option selected disabled>Kirim Notifikasi Ke</option>
                            <option value="pic">Pic</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_description" class="control-label">Deskripsi Group</label>
                        <textarea name="description" class="form-control" id="edit_description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Group"></textarea>
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
