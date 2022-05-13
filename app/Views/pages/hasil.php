<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<p class="mb-4"><?= $desc; ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">HASIL PEMERIKSAAN PATOLOGI</h1>
            </div>
            <form class="user">
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Nama Pasien</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['namapasien']; ?> <?php } ?>">

                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0"></div>
                    <label for="formhasil" class="col-sm-1 col-form-label">Nama Dokter</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['namadokter']; ?> <?php } ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Umur</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['umurpasien'] . ' Th'; ?> <?php } ?>">
                    </div>
                    <div class=" col-sm-1 mb-3 mb-sm-0">
                    </div>
                    <label for="formhasil" class="col-sm-1 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['jeniskelamin']; ?> <?php } ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-user" id="exampleLastName"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Kota</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">

                    </div>
                    <label for="formhasil" class="col-sm-1 col-form-label">RS/Klinik Asal</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['rs']; ?> <?php } ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">No. Register</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data_hasil[0]['no_lab']; ?> <?php } ?>">
                    </div>
                    <div class="col-sm-1 mb-3 mb-sm-0">

                    </div>
                    <label for="formhasil" class="col-sm-1 col-form-label">Kota</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Bahan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">ICDOT</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-3 col-form-label">Ringkasan Keterangan Klinik/ Hasil Operasi</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-3 col-form-label">Diagnosis Klinik</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-3 col-form-label">Pemeriksaan Patologi/ Sitologi Sebelumnya</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-3 col-form-label">Nomor Pemeriksaan sebelumnya</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Makroskopik</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-user" id="exampleLastName"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Mikroskopik</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-user" id="exampleLastName"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Kesimpulan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control form-control-user" id="exampleLastName"></textarea>
                    </div>
                </div>
                <a href="/" class="btn btn-primary btn-user btn-block">
                    Submit
                </a>
            </form>
            <hr>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>