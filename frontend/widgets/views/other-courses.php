<?php
	use common\components\HelperComponent;
    use yii\helpers\Url;
?>

<section class="other-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between mb-5">
                <h1 class=""><?= Yii::t('common', 'Other programs') ?></h1>
            </div>
        </div>
        <nav class="mb-3">
            <div class="nav nav-tabs d-flex align-items-center justify-content-between" id="nav-tab" role="tablist" style="border-bottom: 4px solid #ddd;">
                <a class="nav-item active nav-link d-flex flex-column justify-content-center align-items-center" data-toggle="tab" href="#nav-conversation-1" role="tab" id="nav-home" aria-controls="nav-conversation-1" aria-selected="true">
                    <img class="svg" src="/media/icons/trophy.svg" />
                    <h5 class="text-uppercase text-center"><?= $financeQualificationTitle ?></h5>
                    <div class="tab-bottom-border">
                        <span class="left"></span>
                        <span class="left-transform"></span>
                        <span class="right-transform"></span>
                        <span class="right"></span>
                    </div>
                </a>
                <a class="nav-item nav-link d-flex flex-column justify-content-center align-items-center" data-toggle="tab" href="#nav-conversation-2" role="tab" id="nav-profile" aria-controls="nav-conversation-2" aria-selected="true">
                    <img class="svg" src="/media/icons/rocket.svg" />
                    <h5 class="text-uppercase text-center"><?= $businessTrainingTitle ?></h5>
                    <div class="tab-bottom-border">
                        <span class="left"></span>
                        <span class="left-transform"></span>
                        <span class="right-transform"></span>
                        <span class="right"></span>
                    </div>
                </a>
                <a class="nav-item nav-link d-flex flex-column justify-content-center align-items-center" data-toggle="tab" href="#nav-conversation-3" role="tab" id="nav-nav-contact" aria-controls="nav-conversation-3" aria-selected="true">
                    <img class="svg" src="/media/icons/atom.svg" />
                    <h5 class="text-uppercase text-center"><?= $computerLiteracySkillsTitle ?></h5>
                    <div class="tab-bottom-border">
                        <span class="left"></span>
                        <span class="left-transform"></span>
                        <span class="right-transform"></span>
                        <span class="right"></span>
                    </div>
                </a>
                <a class="nav-item nav-link d-flex flex-column justify-content-center align-items-center" data-toggle="tab" href="#nav-conversation-4" role="tab" id="nav-home" aria-controls="nav-conversation-4" aria-selected="true">
                    <img  class="svg" src="/media/icons/compass.svg" />
                    <h5 class="text-uppercase text-center"><?= $underPostGraduateTitle ?></h5>
                    <div class="tab-bottom-border">
                        <span class="left"></span>
                        <span class="left-transform"></span>
                        <span class="right-transform"></span>
                        <span class="right"></span>
                    </div>
                </a>
                <a class="nav-item nav-link d-flex flex-column justify-content-center align-items-center" data-toggle="tab" href="#nav-conversation-5" role="tab" id="nav-profile" aria-controls="nav-conversation-5" aria-selected="true">
                    <img class="svg" src="/media/icons/student.svg" />
                    <h5 class="text-uppercase text-center"><?= $languagesQualificationTitle ?></h5>
                    <div class="tab-bottom-border">
                        <span class="left"></span>
                        <span class="left-transform"></span>
                        <span class="right-transform"></span>
                        <span class="right"></span>
                    </div>
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-conversation-1" role="tabpanel" aria-labelledby="nav-conversation-1">
                <div class="row">
                    <?php foreach ($financeQualifications as $course): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                            <div class="card">
                                <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>" style="text-decoration: none">
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
                    <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5">
                        <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                            <?= Yii::t('common', 'View all') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-conversation-2" role="tabpanel" aria-labelledby="nav-conversation-2">
                <div class="row">
                    <?php foreach ($businessTraining as $course): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                            <div class="card">
                                <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>" style="text-decoration: none">
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
                    <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5">
                        <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                            <?= Yii::t('common', 'View all') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-conversation-3" role="tabpanel" aria-labelledby="nav-conversation-3">
                <div class="row">
                    <?php foreach ($computerLiteracySkills as $course): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                            <div class="card">
                                <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>" style="text-decoration: none">
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
                    <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5">
                        <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                            <?= Yii::t('common', 'View all') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-conversation-4" role="tabpanel" aria-labelledby="nav-conversation-4">
                <div class="row">
                    <?php foreach ($underPostGraduate as $course): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                            <div class="card">
                                <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>" style="text-decoration: none">
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
                    <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5">
                        <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                            <?= Yii::t('common', 'View all') ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-conversation-5" role="tabpanel" aria-labelledby="nav-conversation-5">
                <div class="row">
                    <?php foreach ($languagesQualification as $course): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 mt-2">
                            <div class="card">
                                <a href="<?= Url::to(['site/courses-view', 'id' => $course->r_id, 'slug' => HelperComponent::getUrl($course->title)]) ?>" style="text-decoration: none">
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
                    <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5">
                        <a href="<?= Url::to(['site/courses']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                            <?= Yii::t('common', 'View all') ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>