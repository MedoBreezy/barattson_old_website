<?php
	use yii\helpers\Html;
	
	$this->title = $name;
?>

<div class="page others-page">
	<section class="content center container">
		<div class="content-center" style="margin: 100px 0px;">
			<h1><?= Html::encode($this->title) ?></h1>	
			<div class="alert alert-danger">
				<?= nl2br(Html::encode($message)) ?>
			</div>
		</div>
	</section>
</div>