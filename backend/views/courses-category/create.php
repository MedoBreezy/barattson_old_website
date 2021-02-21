<?php
    $this->title = 'Kurslar üçün bölmə yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/courses-category/index"> Kurslar üçün bölmə</a></li>
    <li class="active"> Kurslar üçün bölmə yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>