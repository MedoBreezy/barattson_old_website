<?php
    $this->title = 'Müəllim yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/teachers/index"> Müəllimlər</a></li>
    <li class="active"> Müəllim yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
            'teachersCoursesModel' => $teachersCoursesModel,
        ]);
    ?>
</div>