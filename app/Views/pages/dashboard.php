<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<p class="mb-4"><?= $desc; ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No. Lab</th>
                        <th>Tanggal Terima</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama Pasien</th>
                        <th>Asal RS/Klinik</th>
                        <th>Diagnosis</th>
                        <th>Pemeriksaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No. Lab</th>
                        <th>Tanggal Terima</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama Pasien</th>
                        <th>Asal RS/Klinik</th>
                        <th>Diagnosis</th>
                        <th>Pemeriksaan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data_hasil as $a) : ?>
                        <tr>
                            <td><?= $a['no_lab']; ?></td>
                            <td><?= $a['tgl_terima']; ?></td>
                            <td><?= $a['tgl_selesai']; ?></td>
                            <td><?= $a['pasien']; ?></td>
                            <td><?= $a['rs']; ?></td>
                            <td><?= $a['diagnosis']; ?></td>
                            <td><?= $a['pemeriksaan']; ?></td>
                            <td>
                                <a href="#" data-toggle="tooltip" title="Cetak" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-print"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-circle btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" title="Edit" class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
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