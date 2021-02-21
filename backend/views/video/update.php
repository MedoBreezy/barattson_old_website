<?php
    $this->title = 'Video yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/video/index"> Video</a></li>
    <li class="active"> Video yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>