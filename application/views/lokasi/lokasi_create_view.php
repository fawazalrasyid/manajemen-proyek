<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Lokasi</h1>

    <!-- Form for Adding Location -->
    <form action="<?php echo site_url('lokasi/store'); ?>" method="POST">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Lokasi</h6>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="namaLokasi">Nama Lokasi</label>
                    <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" placeholder="Masukkan nama lokasi" required>
                </div>
                <div class="form-group">
                    <label for="negara">Negara</label>
                    <input type="text" class="form-control" id="negara" name="negara" placeholder="Masukkan nama negara" required>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukkan nama provinsi" required>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan nama kota" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
