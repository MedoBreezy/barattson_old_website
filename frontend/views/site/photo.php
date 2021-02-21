<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Photo gallery').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Photo gallery') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Photo gallery') ?></h1>
			</div>
		</div>
		<div class="row">
			<?php foreach ($photos as $item): ?>
				<div class="col-lg-4 col-md-4 col-sm-6 mt-2">
					<a href="<?= Url::to(['site/photo-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->title)]) ?>" class="text-decoration-none">
						<div class="card">
							<img class="card-img-top img-fluid rounded-0" src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" alt="<?= $item->title ?>" />
							<div class="card-body">
								<h5 class="card-title base-blue"><?= $item->title ?></h5>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
	$this->registerCssFile("/media/css/gallery.css");
?>