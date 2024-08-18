<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Proyek</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Proyek</h6>
        </div>
        <div class="card-body">
            <?php if(isset($proyek)): ?>
                <form action="<?php echo site_url('proyek/update/' . $proyek->id); ?>" method="post">
                    <div class="form-group">
                        <label for="namaProyek">Nama Proyek</label>
                        <input type="text" class="form-control" id="namaProyek" name="namaProyek" value="<?php echo $proyek->namaProyek; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" id="client" name="client" value="<?php echo $proyek->client; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tglMulai">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tglMulai" name="tglMulai" value="<?php echo $proyek->tglMulai; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tglSelesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" value="<?php echo $proyek->tglSelesai; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pimpinanProyek">Pimpinan Proyek</label>
                        <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" value="<?php echo $proyek->pimpinanProyek; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $proyek->keterangan; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lokasiId">Lokasi</label>
                        <select class="form-control" id="lokasiId" name="lokasiId" required>
                            <option value="">Pilih Lokasi</option>
                            <?php if (!empty($lokasi)): ?>
                                <?php foreach ($lokasi as $loc): ?>
                                    <option value="<?php echo $loc->id; ?>" <?php echo ($loc->id == $proyek->lokasi->id) ? 'selected' : ''; ?>>
                                        <?php echo $loc->namaLokasi; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">Data lokasi tidak tersedia</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="<?php echo site_url('proyek'); ?>" class="btn btn-secondary">Batal</a>
                </form>
            <?php else: ?>
                <p class="text-danger">Data proyek tidak ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
