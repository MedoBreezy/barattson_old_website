<?php
    $this->title = 'Kurs yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/courses/index"> Kurslar</a></li>
    <li class="active"> Kurs yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>