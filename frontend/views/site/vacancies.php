<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;

    HelperComponent::registerSeo(Yii::t('common', 'Vacancies').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="other-courses vacancies">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Vacancies') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Vacancies') ?></h1>
			</div>
			<?php foreach ($vacancies as $item): ?>
				<div class="col-lg-4 col-md-4 col-sm-6 mt-2">
					<div class="card">
						<a style="text-decoration: none" href="<?= Url::to(['site/vacancies-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->title)]) ?>">
							<img class="card-img-top" src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" alt="<?= $item->title ?>" />
							<div class="card-body">
								<h5 class="card-title"><?= $item->title ?></h5>
								<div class="body-footer d-flex align-items-center justify-content-end">
									<!-- <a href="<?= Url::to(['site/vacancies-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->title)]) ?>">
									<?= Yii::t('common', 'View more') ?>
								</a> -->
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
	// $this->registerCssFile("/media/css/vacancies.css");
?>