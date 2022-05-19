<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
<p class="mb-4"><?= $desc; ?></p>

<!-- DataTales Example -->
<div class="card shadow mb-4 col-sm-6">
    <div class="card-body">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add Referensi RS/ Klinik</h1>
            </div>
            <form class="user" action="/rumahsakit/update/<?= $data['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Nama RS/ Klinik</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $data['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user  <?= ($validation->hasError('kota')) ? 'is-invalid' : ''; ?>" id="kota" name="kota" value="<?= (old('kota')) ? old('kota') : $data['kota'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kota'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>