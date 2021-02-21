<?php
    $this->title = 'Foto yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/photo/index"> Foto</a></li>
    <li class="active"> Foto yarat</li>
</ol>

<div class="video-create">
    <?= $this->render('_form', [
        'models' => $models,
        'fileModel' => $fileModel,
        'uploadId' => $uploadId,
    ]) ?>
</div>