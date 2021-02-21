<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
?>

<section class="popular-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                <h1 class=""><?= Yii::t('common', 'Popular programs') ?></h1>
                <a class="d-inline-flex align-items-center hidden-380" href="<?= Url::to(['site/courses']) ?>">
                    <?= Yii::t('common', 'View all') ?>
                    <i class="icon-right-arrow"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($courses as $course): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="card">
                        <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>">
                            <img class="card-img-top" src="<?= $course->image ?>" alt="<?= $course->title ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?= $course->title ?></h5>
                                <span class="type"><?= HelperComponent::getCourseCategoryName($course->category) ?></span>
                                <div class="body-footer d-flex align-items-center justify-content-end">
                                    <span class="pricing">
                                        <span class="new-pricing">&#8380; <?= $course->price_new ?></span>
                                        <?php if ($course->price_old): ?>
                                            <span class="old-pricing">&#8380; <?= $course->price_old ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <!-- <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>">
                                        <?= Yii::t('common', 'View more') ?>
                                    </a> -->
                                </div>
                            </div>
						</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5 show-380">
                <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                    <?= Yii::t('common', 'View all') ?>
                </a>
            </div>
        </div>
    </div>
</section>