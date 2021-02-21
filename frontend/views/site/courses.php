<?php
    use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use common\components\HelperComponent;

    HelperComponent::registerSeo(Yii::t('common', 'Programs').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="popular-courses courses">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Programs') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1 class="base-blue"><?= Yii::t('common', 'Programs') ?></h1>
			</div>
		</div>
		<div class="row">
			<?php foreach ($courses as $item): ?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="card">
						<a href="<?= Url::to(['site/courses-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->title)]) ?>">
							<img class="card-img-top" src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" alt="<?= $item->title ?>" />
							<div class="card-body">
								<h5 class="card-title"><?= $item->title ?></h5>
								<span class="type"><?= HelperComponent::getCourseCategoryName($item->category) ?></span>
								<div class="body-footer d-flex align-items-center justify-content-end">
									<span class="pricing">
										<span class="new-pricing">&#8380; <?= $item->price_new ?></span>
										<?php if ($item->price_old): ?>
											<span class="old-pricing">&#8380; <?= $item->price_old ?></span>
										<?php endif; ?>
									</span>
									<!-- <a href="<?= Url::to(['site/courses-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->title)]) ?>">
										<?= Yii::t('common', 'View more') ?>
									</a> -->
								</div>
							</div>
						</a>
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
	$this->registerCssFile("/media/css/courses.css");
?>