<!-- Create Modal -->
<div class="modal fade" id="createUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="createUserForm" name="createUserForm" class="form-horizontal">
                    <div class="form-group mb-2">
                        <label for="username" class="control-label">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" required
                            placeholder="Masukan username Anda">

                    </div>
                    <div class="form-group mb-2">
                        <label for="fullname" class="control-label">Nama Lengkap <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required
                            placeholder="Masukan Nama Lengkap Anda">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="control-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required
                            placeholder="Masukan Email Anda">
                    </div>
                    <div class="form-group mb-2">
                        <label for="no_phone" class="control-label">No. Telepon <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="no_phone" name="no_phone" required
                            placeholder="Masukan Nomor Telepon Anda">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="control-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Masukan Password Anda">
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
<div class="modal fade" id="editUserModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="editUserForm" name="editUserForm" class="form-horizontal">
                    <input type="hidden" name="user_id" id="edit_user_id">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="edit_username" class="control-label">Username</label>
                                <input class="form-control" id="edit_username" style="background-color: #e9ecef;"
                                    readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_fullname" class="control-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_fullname" name="fullname" required
                                    placeholder="Masukan Nama Lengkap Anda">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_kode" class="control-label">Kode Referal Anda</label>
                                <input class="form-control" id="edit_kode" style="background-color: #e9ecef;"
                                    readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_email" class="control-label">Email <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email" required
                                    placeholder="Masukan Email Anda">
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="edit_no_phone" class="control-label">No. Telepon <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_no_phone" name="no_phone"
                                    required placeholder="Masukan Nomor Telepon Anda">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_gender" class="control-label">Jenis Kelamin</label>
                                <select class="form-control" id="edit_gender" name="gender" required>
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_address" class="control-label">Alamat</label>
                                <textarea name="address" class="form-control" id="edit_address" cols="30" rows="3"
                                    placeholder="Masukan Alamat Anda" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_referral_code" class="control-label">Kode Referral</label>
                                <input class="form-control" id="edit_referral_code"
                                    style="background-color: #e9ecef;" readonly>
                            </div>
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
