<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Proyek</h1>

    <form action="<?php echo site_url('proyek/store'); ?>" method="POST">
        <div class="form-group">
            <label>Nama Proyek</label>
            <input type="text" class="form-control" name="namaProyek" required>
        </div>
        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" name="client" required>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" class="form-control" name="tglMulai" required>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" class="form-control" name="tglSelesai" required>
        </div>
        <div class="form-group">
            <label>Pimpinan Proyek</label>
            <input type="text" class="form-control" name="pimpinanProyek" required>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" required></textarea>
        </div>
        <div class="form-group">
            <label>ID Lokasi</label>
            <input type="number" class="form-control" name="lokasiId" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
