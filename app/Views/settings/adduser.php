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
                <h1 class="h4 text-gray-900 mb-4">Add User Laboratorium PA</h1>
            </div>
            <form class="user" action="<?= base_url(); ?>/user/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fullname'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-4 col-form-label">RS/Klinik Asal</label>
                    <select class="form-select form-control-user col-sm-8 <?= ($validation->hasError('id_rs')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="id_rs" name="id_rs">
                        <?php foreach ($datars as $rs) : ?>
                            <option value="<?= $rs['id']; ?>"><?= $rs['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= $validation->getError('rs'); ?>
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