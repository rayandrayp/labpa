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

        <a href="<?= base_url(); ?>/user/add" data-toggle="tooltip" title="Add User" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add User</span>
        </a>
        <br>
        <?php if (session()->getFlashdata('message')) : ?>
            <br>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>
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
                    <?php $i = 1; ?>
                    <?php foreach ($data as $a) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $a->username; ?></td>
                            <td><?= $a->fullname; ?></td>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->kota; ?></td>
                            <td>
                                <form action="<?= base_url(); ?>/user/<?= $a->id; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <a href="<?= base_url(); ?>/user/edit/<?= $a->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
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