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
                <h1 class="h4 text-gray-900 mb-4">Add Referensi RS/ Klinik</h1>
            </div>
            <form class="user">
                <div class="form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">ID</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data[0]['id_rs']; ?> <?php } ?>">

                    </div>
                </div>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Nama RS/ Klinik</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data[0]['nama']; ?> <?php } ?>">
                    </div>

                </div>
                <div class=" form-group row">
                    <label for="formhasil" class="col-sm-1 col-form-label">Status</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" value="<?php if ($type == 'edit') { ?> <?= $data[0]['status']; ?> <?php } ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-5">
                        <a href="/rs" class="btn btn-primary btn-user btn-block">
                            Submit
                        </a>
                    </div>
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>