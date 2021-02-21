<?php
    $this->title = 'Xəbərlər və Elanlar yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/news-ads/index"> Xəbərlər və Elanlar</a></li>
    <li class="active"> Xəbərlər və Elanlar yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>