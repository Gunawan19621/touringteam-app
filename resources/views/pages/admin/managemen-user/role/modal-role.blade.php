<!-- Create Modal -->
<div class="modal fade" id="createRoleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="createRoleForm" name="createRoleForm" class="form-horizontal">
                    <div class="form-group mb-2">
                        <label for="rolename" class="control-label">Nama Role <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="rolename" name="rolename" required
                            placeholder="Masukan Nama Role">
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="control-label">Deskripsi Role</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Role"></textarea>
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
<div class="modal fade" id="editRoleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Role</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="editRoleForm" name="editRoleForm" class="form-horizontal">
                    <input type="hidden" name="role_id" id="edit_role_id">
                    <div class="form-group mb-2">
                        <label for="edit_rolename" class="control-label">Nama Role <span
                                class="text-danger">*</span></label>
                        <input class="form-control" id="edit_rolename" name="rolename" placeholder="Masukan Nama Role"
                            required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_description" class="control-label">Deskripsi Role</label>
                        <textarea name="description" class="form-control" id="edit_description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Role"></textarea>
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
