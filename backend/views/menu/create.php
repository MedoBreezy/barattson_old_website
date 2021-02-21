<?php
    $this->title = 'Menu yarat';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/menu/index"> Menu</a></li>
    <li class="active"> Menu yarat</li>
</ol>

<div class="video-create">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>