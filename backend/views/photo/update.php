<?php
    $this->title = 'Foto yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/photo/index"> Foto</a></li>
    <li class="active"> Foto yenilə</li>
</ol>

<div class="video-update">
    <?= $this->render('_form', [
        'models' => $models,
        'fileModel' => $fileModel,
        'uploadId' => $uploadId,
        'files' => $files,
    ]) ?>
</div>