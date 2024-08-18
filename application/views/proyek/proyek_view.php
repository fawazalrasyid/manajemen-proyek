<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Proyek</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Proyek</h6>
            <!-- Tombol Create Proyek -->
            <a href="<?php echo site_url('proyek/create'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Proyek
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Client</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Pimpinan Proyek</th>
                            <th>Lokasi Proyek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($proyek)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($proyek as $proj): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $proj->namaProyek; ?></td>
                                    <td><?php echo $proj->client; ?></td>
                                    <td><?php echo $proj->tglMulai; ?></td>
                                    <td><?php echo $proj->tglSelesai; ?></td>
                                    <td><?php echo $proj->pimpinanProyek; ?></td>
                                    <td><?php echo isset($proj->lokasi->namaLokasi) ? $proj->lokasi->namaLokasi : 'Lokasi tidak tersedia'; ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo site_url('proyek/edit/' . $proj->id); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol Delete -->
                                        <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-<?php echo $proj->id; ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>

                                        <!-- Delete Confirmation Modal untuk masing-masing proyek -->
                                        <div class="modal fade" id="deleteModal-<?php echo $proj->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel-<?php echo $proj->id; ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo $proj->id; ?>">Konfirmasi Hapus</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus proyek ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="<?php echo site_url('proyek/delete/' . $proj->id); ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data proyek</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
