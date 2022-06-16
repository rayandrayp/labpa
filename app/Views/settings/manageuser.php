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
                        <th>Nama Lengkap</th>
                        <th>RS/Klinik Asal</th>
                        <th>Kota</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>RS/Klinik Asal</th>
                        <th>Kota</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php for ($i = 0; $i < count($data); $i++) { ?>
                        <?php //foreach ($data as $a) : 
                        ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= $data[$i]->fullname; ?></td>
                            <td><?= $data[$i]->nama; ?></td>
                            <td><?= $data[$i]->kota; ?></td>
                            <td><?= $data[$i]->username; ?></td>
                            <td><?= $pwd[$i]; ?></td>
                            <td>
                                <form action="<?= base_url(); ?>/user/<?= $data[$i]->id; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <a href="<?= base_url(); ?>/user/edit/<?= $data[$i]->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php //endforeach; 
                    ?>
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