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

        <a href="/user/add" data-toggle="tooltip" title="Add User" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add User</span>
        </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>RS/Klinik Asal</th>
                        <th>Kota</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>RS/Klinik Asal</th>
                        <th>Kota</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_hasil as $a) : ?>
                        <tr>
                            <td><?= $a['id']; ?></td>
                            <td><?= $a['username']; ?></td>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['asal']; ?></td>
                            <td><?= $a['kota']; ?></td>
                            <td>
                                <a href="/user/delete" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="/user/edit" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
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