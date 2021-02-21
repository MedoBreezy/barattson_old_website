<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Team').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="teachers" style="background:#fff">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Team') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Team') ?></h1>
			</div>
			<?php foreach ($team as $item): ?>
				<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 25px;">
					<div class="card">
						<a href="<?= Url::to(['site/team-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->fullname)]) ?>">
							<img class="card-img-top img-fluid" src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" alt="<?= $item->fullname ?>" style="bottom: 0; width: 100%;" />
						</a>
						<div class="card-body">
							<a href="<?= Url::to(['site/team-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->fullname)]) ?>">
								<h5 class="card-title"><?= $item->fullname ?></h5>
							</a>
							<p><?= $item->profession ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
	// $this->registerCssFile("/media/css/teachers.css");
?>