<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Events').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="page-inner gallery">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Exams') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Exams') ?></h1>
			</div>
		</div>
        <section class="events">
            <div class="container">
                <div class="row">
                    <?php foreach ($events as $event): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <a href="<?= Url::to(['site/events-view', 'id' => $event->r_id, 'slug' => HelperComponent::getUrl($event->title)]) ?>" style="z-index: 999;">
                                <div class="card events-click-js">
                                    <img class="card-img-top" src="<?= $event->image ?>" alt="<?= $event->title ?>" />
                                    <div class="event-title">
                                        <h5><?= $event->title ?></h5>
                                        <!-- <span><?= $event->date ?></span> -->
                                    </div>
                                    <div class="card-body d-flex justify-content-end" style.property="flex-direction: row">
                                        <?php if ($event->price_old): ?>
                                            <span>&#8380; <span class="old_price" style="text-decoration: line-through;font-size: 24px"><?= $event->price_old ?></span> <?= $event->price_new ?></span>
                                        <?php else: ?>
                                            <span>&#8380; <?= $event->price_new ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
</section>

<?php
	$this->registerCssFile("/media/css/gallery.css");
?>