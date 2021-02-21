<?php
    $this->title = 'Komanda yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/team/index"> Komanda</a></li>
    <li class="active"> Komanda yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>