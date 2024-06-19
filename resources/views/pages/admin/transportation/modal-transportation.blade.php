<!-- Create Modal -->
<div class="modal fade" id="createKendaraanModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kendaraan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="createKendaraanForm" name="createKendaraanForm" class="form-horizontal"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="type" class="control-label">Tipe Kendaraan<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="type" name="type" required
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="thn_beli" class="control-label">Tahun Beli Kendaraan</label>
                                <input type="number" class="form-control" id="thn_beli" name="thn_beli"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="thn_rakit" class="control-label">Tahun Rakit Kendaraan</label>
                                <input type="number" class="form-control" id="thn_rakit" name="thn_rakit"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="name" class="control-label">Nama Kendaraan<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="machine" class="control-label">Jenis Mesin Kendaraan</label>
                                <input type="text" class="form-control" id="machine" name="machine"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="plat_no" class="control-label">Plat Kendaraan</label>
                                <input type="text" class="form-control" id="plat_no" name="plat_no"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="foto_kendaraan" class="control-label">Foto Kendaraan</label>
                        <input type="file" id="foto_kendaraan" name="foto_kendaraan" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="control-label">Deskripsi Kendaraan</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Kendaraan"></textarea>
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
<div class="modal fade" id="editKendaraanModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kendaraan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none"></div>
                <form id="editKendaraanForm" name="editKendaraanForm" class="form-horizontal"
                    enctype="multipart/form-data">
                    <input type="hidden" name="transportation_id" id="edit_transportation_id">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="edit_type" class="control-label">Tipe Kendaraan<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_type" name="type" required
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_thn_beli" class="control-label">Tahun Beli Kendaraan</label>
                                <input type="number" class="form-control" id="edit_thn_beli" name="thn_beli"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_thn_rakit" class="control-label">Tahun Rakit Kendaraan</label>
                                <input type="number" class="form-control" id="edit_thn_rakit" name="thn_rakit"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group mb-2">
                                <label for="edit_name" class="control-label">Nama Kendaraan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name" required
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_machine" class="control-label">Jenis Mesin Kendaraan</label>
                                <input type="text" class="form-control" id="edit_machine" name="machine"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                            <div class="form-group mb-2">
                                <label for="edit_plat_no" class="control-label">Plat Kendaraan</label>
                                <input type="text" class="form-control" id="edit_plat_no" name="plat_no"
                                    placeholder="Masukan Nama Kendaraan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="foto_kendaraan" class="control-label">Foto Kendaraan</label>
                        <input type="file" id="foto_kendaraan" name="foto_kendaraan" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="edit_description" class="control-label">Deskripsi Kendaraan</label>
                        <textarea name="description" class="form-control" id="edit_description" cols="30" rows="3"
                            placeholder="Masukan Deskripsi Kendaraan"></textarea>
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

<!-- Show Modal -->
<div class="modal fade" id="showKendaraanModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Kendaraan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group mb-2">
                            <label for="show_type" class="control-label">Tipe Kendaraan</label>
                            <input type="text" class="form-control" id="show_type" name="type" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="show_thn_beli" class="control-label">Tahun Beli Kendaraan</label>
                            <input type="text" class="form-control" id="show_thn_beli" name="thn_beli" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="show_thn_rakit" class="control-label">Tahun Rakit Kendaraan</label>
                            <input type="text" class="form-control" id="show_thn_rakit" name="thn_rakit"
                                readonly>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mb-2">
                            <label for="show_name" class="control-label">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="show_name" name="name" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="show_machine" class="control-label">Jenis Mesin Kendaraan</label>
                            <input type="text" class="form-control" id="show_machine" name="machine" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="show_plat_no" class="control-label">Plat Kendaraan</label>
                            <input type="text" class="form-control" id="show_plat_no" name="plat_no" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-xl-6 form-group mb-2 text-center">
                        <label for="show_foto_kendaraan" class="control-label">Foto Kendaraan</label>
                        <br>
                        <img id="show_foto_kendaraan" src="#" alt="Foto Kendaraan" style="max-width: 150px;">
                        <div class="mt-2">
                            <a href="#" class="btn btn-primary btn-sm" id="download_foto" download>
                                Download Foto
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 form-group mb-2">
                        <label for="show_description" class="control-label">Deskripsi Kendaraan</label>
                        <textarea class="form-control" id="show_description" name="description" cols="30" rows="4" readonly></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
