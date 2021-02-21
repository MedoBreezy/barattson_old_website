<?php
    $this->title = 'Müəllim yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/teachers/index"> Müəllimlər</a></li>
    <li class="active"> Müəllim yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
            'teachersCoursesModel' => $teachersCoursesModel,
        ]);
    ?>
</div>