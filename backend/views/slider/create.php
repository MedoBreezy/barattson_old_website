<?php
    $this->title = 'Slayder yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/slider/index"> Slayder</a></li>
    <li class="active"> Slayder yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>