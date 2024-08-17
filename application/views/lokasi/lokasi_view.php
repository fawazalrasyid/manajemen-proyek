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
                            <th>Aksi</th>
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
                                        <a href="<?php echo site_url('lokasi/delete/' . $loc->id); ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-<?php echo $loc->id; ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>

                                        <!-- Delete Confirmation Modal untuk masing-masing lokasi -->
                                        <div class="modal fade" id="deleteModal-<?php echo $loc->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-<?php echo $loc->id; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo $loc->id; ?>">Konfirmasi Hapus</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus lokasi ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="<?php echo site_url('lokasi/delete/' . $loc->id); ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data lokasi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
