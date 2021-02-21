<?php
    $this->title = 'Xəbərlər və Elanlar yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/news-ads/index"> Xəbərlər və Elanlar</a></li>
    <li class="active"> Xəbərlər və Elanlar yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
            'uploadId' => $uploadId,
            'fileModel' => $fileModel
        ]);
    ?>
</div>