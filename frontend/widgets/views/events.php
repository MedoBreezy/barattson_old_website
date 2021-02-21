<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
?>

<section class="events">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                <h1 class=""><?= Yii::t('common', 'Exams') ?></h1>
                <a class="d-inline-flex align-items-center  hidden-380" href="<?= Url::to(['site/events']) ?>">
                    <?= Yii::t('common', 'View all') ?>
                    <i class="icon-right-arrow"></i>
                </a>
            </div>
        </div>
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
                            <div class="card-body d-flex justify-content-end">
                                <?php if ($event->price_old): ?>
                                    <span>&#8380; <span class="old_price" style="text-decoration: line-through;font-size: 24px"><?= $event->price_old ?></span> <?= $event->price_new ?></span>
                                <?php else: ?>
                                    <span>&#8380; <?= $event->price_new ?></span>
                                <?php endif; ?>
                                <!-- <a href="<?= Url::to(['site/events-view', 'id' => $event->r_id, 'slug' => HelperComponent::getUrl($event->title)]) ?>" style="z-index: 999;">
                                    <?= Yii::t('common', 'View more') ?>
                                </a> -->
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5 show-380">
                <a href="<?= Url::to(['site/events']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                    <?= Yii::t('common', 'View all') ?>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
	.events .card {
		cursor: pointer;
	}
</style>