<?php
	use yii\helpers\Html;
?>
<header class="main-header">
    <?= Html::a('<span class="logo-mini">BS</span><span class="logo-lg">'. Yii::$app->name .'</span>', Yii::$app->homeUrl, ['class' => 'logo', 'style' => 'height: 52px']) ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
                    <?= Html::a('Çıxış', ['/site/logout'], ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']) ?>
                </li>
            </ul>
        </div>
    </nav>
</header>