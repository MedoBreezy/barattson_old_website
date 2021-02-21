<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'About us').' | '.Yii::t('common', Yii::$app->name), $about->seo_description, $about->seo_keywords);
?>

<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'About us') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'About us') ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 ">
				<nav class="w-100">
					<div class="nav nav-tabs nav-fill w-100" id="nav-tab" role="tablist">
						<a class="nav-item nav-link text-uppercase active" id="nav-home-tab" data-toggle="tab" href="#nav-mission" role="tab" aria-controls="nav-home" aria-selected="true">
							<?= Yii::t('common', 'Mission') ?> / <?= Yii::t('common', 'Vision') ?> / <?= Yii::t('common', 'Valuation') ?>
						</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
							<?= Yii::t('common', 'Company profile') ?>
						</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-cob" role="tab" aria-controls="nav-contact" aria-selected="false">
							<?= Yii::t('common', 'About COB') ?>
						</a>
						<a class="nav-item nav-link" id="nav-quality-tab" data-toggle="tab" href="#nav-quality" role="tab" aria-controls="nav-quality" aria-selected="false">
							<?= Yii::t('common', 'Quality guarantee') ?>
						</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0 pt-5" id="nav-tabContent">
					<div class="tab-pane fade show active p-1" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
						<div class="row">
							<div class="col-lg-4 mt-2">
								<div class="card">
									<div class="card-header">
										<h3 class="base-blue"><?= Yii::t('common', 'Mission') ?></h3>
									</div>
									<div class="card-body">
										<p><?= $about->mission ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mt-2">
								<div class="card">
									<div class="card-header">
										<h3 class="base-blue"><?= Yii::t('common', 'Vision') ?></h3>
									</div>
									<div class="card-body">
										<p><?= $about->vision ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 mt-2">
								<div class="card">
									<div class="card-header">
										<h3 class="base-blue"><?= Yii::t('common', 'Valuation') ?></h3>
									</div>
									<div class="card-body">
										<p><?= $about->value ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="offset-lg-2 col-lg-8 p-1">
							<p><?= $companyProfile->text ?></p>
						</div>
					</div>
					<div class="tab-pane fade p-1" id="nav-cob" role="tabpanel" aria-labelledby="nav-cob-tab">
						<div class="offset-lg-2 col-lg-8 p-1">
							<div class="about_director_image">
								<img src="<?= $about->director_image ?>" class="img-fluid" alt="<?= $about->director_fullname ?>">
							</div>
							<div class="about_director_fullname">
								<p><?= $about->director_fullname ?></p>
							</div>
							<div class="about_director_message">
								<p><?= $about->director_message ?></p>
							</div>
							<div class="about_director_about">
								<p><?= $about->director_about ?></p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade p-1" id="nav-quality" role="tabpanel" aria-labelledby="nav-quality-tab">
						<div class="offset-lg-2 col-lg-8 p-1">
							<p><?= $qualityGuarantee->text ?></p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php
	$this->registerCssFile("/media/css/about.css");
?>