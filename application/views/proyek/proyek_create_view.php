<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Proyek</h1>

    <!-- Form for Adding Project -->
    <form action="<?php echo site_url('proyek/store'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Proyek</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="namaProyek">Nama Proyek</label>
                    <input type="text" class="form-control" id="namaProyek" name="namaProyek" placeholder="Masukkan nama proyek" required>
                </div>
                <div class="form-group">
                    <label for="client">Client</label>
                    <input type="text" class="form-control" id="client" name="client" placeholder="Masukkan nama client" required>
                </div>
                <div class="form-group">
                    <label for="tglMulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tglMulai" name="tglMulai" required>
                </div>
                <div class="form-group">
                    <label for="tglSelesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" required>
                </div>
                <div class="form-group">
                    <label for="pimpinanProyek">Pimpinan Proyek</label>
                    <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" placeholder="Masukkan nama pimpinan proyek" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan keterangan proyek" required></textarea>
                </div>
                <div class="form-group">
                    <label for="lokasiId">Lokasi</label>
                    <select class="form-control" id="lokasiId" name="lokasiId" required>
                        <option value="">Pilih Lokasi</option>
                        <?php if (!empty($lokasi)): ?>
                            <?php foreach ($lokasi as $loc): ?>
                                <option value="<?php echo $loc->id; ?>"><?php echo $loc->namaLokasi; ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Data lokasi tidak tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
