<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<p class="mb-4"><?= $desc; ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
    </div> -->
    <div class="card-body">

        <a href="/rs/add" data-toggle="tooltip" title="Add User" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add RS</span>
        </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $a) : ?>
                        <tr>
                            <td><?= $a['id_rs']; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?php if ($a['status'] == '1') {
                                    echo 'Aktif';
                                } else {
                                    echo 'Tidak Aktif';
                                } ?></td>
                            <td>
                                <a href="/rs/delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="/rs/edit" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?= $this->endSection(); ?>