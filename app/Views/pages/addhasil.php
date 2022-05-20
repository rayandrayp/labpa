<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<p class="mb-4"><?= $desc; ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4  col-sm-6">
    <div class=" card-body">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">HASIL PEMERIKSAAN PATOLOGI</h1>
            </div>
            <form class=" user" action="/hasil/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Nama Pasien</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('namapasien')) ? 'is-invalid' : ''; ?>" id="namapasien" name="namapasien">
                        <div class="invalid-feedback">
                            <?= $validation->getError('namapasien'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">No. Lab</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nomorlab')) ? 'is-invalid' : ''; ?>" id="nomorlab" name="nomorlab">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomorlab'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">RS/Klinik Asal</label>
                    <select class="form-select form-control-user col-sm-8" id="id_rs" name="id_rs">
                        <?php foreach ($datars as $rs) : ?>
                            <option data-kota="<?= $rs['kota']; ?>" value="<?= $rs['id']; ?>"><?= $rs['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user" id="kota" name="kota" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Hasil Lab</label>
                    <div class="col-sm-8">
                        <input type="file" class="custom-file-input form-control form-control-user <?= ($validation->hasError('filehasil')) ? 'is-invalid' : ''; ?>" id="filehasil" name="filehasil" onchange="uploadFile()">
                        <label for="filehasil" class="custom-file-label"> Pilih file hasil Lab . . .</label>
                        <div class="invalid-feedback">
                            <?= $validation->getError('filehasil'); ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class=" form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var selection = document.getElementById("id_rs");

    selection.onchange = function(event) {
        var kota = event.target.options[event.target.selectedIndex].dataset.kota;
        // console.log("kota: " + kota);
        document.getElementById("kota").value = kota;
    };

    function uploadFile() {
        const filehasil = document.querySelector('#filehasil');
        const filehasilLabel = document.querySelector('.custom-file-label');
        //ganti keterangan menjadi nama file
        filehasilLabel.textContent = filehasil.files[0].name;
    }
</script>

<?= $this->endSection(); ?>