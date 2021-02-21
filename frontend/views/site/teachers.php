<?php
    use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use common\components\HelperComponent;

    HelperComponent::registerSeo(Yii::t('common', 'Teachers').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="teachers" style="background:#fff">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Teachers') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Teachers') ?></h1>
			</div>
			<?php foreach ($teachers as $item): ?>
				<div class="col-lg-4 col-md-4 col-sm-6 mb-3">
					<div class="card">
						<a href="<?= Url::to(['site/teachers-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->fullname)]) ?>">
							<img class="card-img-top" src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" alt="<?= $item->fullname ?>" />
						</a>
						<div class="card-body">
							<a href="<?= Url::to(['site/teachers-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->fullname)]) ?>">
								<h5 class="card-title"><?= $item->fullname ?></h5>
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="pagination">
			<?=
				LinkPager::widget([
					'pagination' => $pagination,
				]);
			?>
		</div>
	</div>
</section>

<?php
	// $this->registerCssFile("/media/css/teachers.css");
?>