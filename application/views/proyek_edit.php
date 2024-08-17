<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Proyek</h1>

    <form action="<?php echo site_url('proyek/update/' . $proyek->id); ?>" method="POST">
        <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" class="form-control" name="namaProyek" value="<?php echo $proyek->namaProyek; ?>" required>
        </div>
        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" name="client" value="<?php echo $proyek->client; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglMulai" value="<?php echo $proyek->tglMulai; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tglSelesai" value="<?php echo $proyek->tglSelesai; ?>" required>
        </div>
        <div class="form-group">
            <label>Pimpinan Proyek</label>
            <input type="text" class="form-control" name="pimpinanProyek" value="<?php echo $proyek->pimpinanProyek; ?>" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" required><?php echo $proyek->keterangan; ?></textarea>
        </div>
        <div class="form-group">
            <label>ID Lokasi</label>
            <input type="number" class="form-control" name="lokasiId" value="<?php echo $proyek->lokasiId; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
