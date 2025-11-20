<?php
headerAdmin($data);
getModal('modalRoles', $data);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h5><i class="fa fa-user-tag"></i> <?= $data['page_title'] ?></h5>
            <button class="btn btn-primary btn-sm" type="button" onclick="openModal();"><i class="fa fa-plus-circle"></i> Nuevo</button>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>roles"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">Create a beautiful dashboard</div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>