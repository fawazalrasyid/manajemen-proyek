<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Lokasi</h1>

    <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Lokasi</h6>
            <!-- Tombol Create Lokasi -->
            <a href="<?php echo site_url('lokasi/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Lokasi
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($lokasi)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($lokasi as $loc): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $loc->namaLokasi; ?></td>
                                    <td><?php echo $loc->negara; ?></td>
                                    <td><?php echo $loc->provinsi; ?></td>
                                    <td><?php echo $loc->kota; ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo site_url('lokasi/edit/' . $loc->id); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol Delete -->
                                        <a href="<?php echo site_url('lokasi/delete/' . $loc->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data lokasi tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
