<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
    if (session()->getFlashData('success')) {
    ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
    ?>
<?php
if (session()->getFlashData('failed')) {
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('failed') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
}
?>
<?php if (session()->getFlashdata('error')) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>
<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nominal(Rp)</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($diskon as $index => $diskonv) : ?>
        <tr>
            <th scope="row"><?php echo $index + 1 ?></th>
            <td><?= $diskonv['tanggal'] ?></td>
            <td><?= number_format($diskonv['nominal'], 0, ',', '.') ?></td>

            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#editModal-<?= $diskonv['id'] ?>">
                    Ubah
                </button>
                <a href="<?= base_url('diskon/delete/' . $diskonv['id']) ?>" class="btn btn-danger"
                    onclick="return confirm('Yakin hapus data ini ?')">
                    Hapus
                </a>
            </td>
        </tr>

        <!-- End Table with stripped rows -->
        <!-- Add Modal Begin -->
        <div class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="<?= base_url('diskon') ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nominal">Nominal (Rp)</label>
                                <input type="number" name="nominal" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Add Modal End -->
        <!-- Edit Modal Begin -->
        <div class="modal fade" id="editModal-<?= $diskonv['id'] ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="<?= base_url('diskon/edit/' . $diskonv['id']) ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Diskon</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control"
                                    value="<?= $diskonv['tanggal'] ?>" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nominal">Nominal (Rp)</label>
                                <input type="number" name="nominal" class="form-control"
                                    value="<?= $diskonv['nominal'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php endforeach ?>
    </tbody>
</table>
<!-- Edit Modal End -->
<?= $this->endSection() ?>