<?php
    use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Testimonials').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="testimonials">
    <div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Testimonials') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Testimonials') ?></h1>
			</div>
		</div>
		<div class="row">
			<?php foreach ($testimonials as $item): ?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card">
						<figure class="p-4">
							<blockquote class="blockquote">
								<?= $item->body ?>
							</blockquote>
						</figure>
						<div class="card-body">
							<h3 class="base-blue"><?= $item->title ?></h3>
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
	// $this->registerCssFile("/media/css/testimonials.css");
?>