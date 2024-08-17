<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Lokasi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Lokasi</h6>
        </div>
        <div class="card-body">
            <?php if(isset($lokasi)): ?>
                <form action="<?php echo site_url('lokasi/update/' . $lokasi->id); ?>" method="post">
                    <div class="form-group">
                        <label for="namaLokasi">Nama Lokasi</label>
                        <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" value="<?php echo $lokasi->namaLokasi; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control" id="negara" name="negara" value="<?php echo $lokasi->negara; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $lokasi->provinsi; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $lokasi->kota; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="<?php echo site_url('lokasi'); ?>" class="btn btn-secondary">Batal</a>
                </form>
            <?php else: ?>
                <p class="text-danger">Data lokasi tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
