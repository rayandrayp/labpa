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
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Lab</th>
                        <th>Nama Pasien</th>
                        <th>Asal RS/Klinik</th>
                        <th>Kota</th>
                        <th>Tanggal Upload</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>No. Lab</th>
                        <th>Nama Pasien</th>
                        <th>Asal RS/Klinik</th>
                        <th>Kota</th>
                        <th>Tanggal Upload</th>
                        <th>Hasil</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $a) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $a->nomorlab; ?></td>
                            <td><?= $a->namapasien; ?></td>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->kota; ?></td>
                            <td><?= $a->created_at; ?></td>
                            <td>
                                <?php if ($user_name == 'Admin Utama') { ?>
                                    <form action="/hasil/<?= $a->id; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <a target="_blank" href="upload/<?= $a->namafile; ?>" data-toggle="tooltip" title="Cetak" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        <a href="/hasil/edit/<?= $a->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                <?php } else { ?>
                                    <a target="_blank" href="upload/<?= $a->namafile; ?>" data-toggle="tooltip" title="Cetak" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-print"></i>
                                    </a>
                                <?php } ?>
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