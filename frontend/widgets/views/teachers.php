<?php
    use yii\helpers\Url;
    use yii\helpers\HtmlPurifier;
	use common\components\HelperComponent;
?>

<section class="teachers">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-between mb-5">
                <h1 class=""><?= Yii::t('common', 'Teachers') ?></h1>
                <a class="d-inline-flex align-items-center  hidden-380" href="<?= Url::to(['site/teachers']) ?>">
                    <?= Yii::t('common', 'View all') ?>
                    <i class="icon-right-arrow"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($teachers as $teacher): ?>
                <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                    <div class="card">
                        <a href="<?= Url::to(['site/teachers-view', 'id' => $teacher->r_id, 'slug' => HelperComponent::getUrl($teacher->fullname)]) ?>">
                            <img class="card-img-top img-fluid" src="<?= $teacher->image ?>" alt="<?= $teacher->fullname ?>" />
                            <div class="card-body">
                                <h5 class="card-title"><?= $teacher->fullname ?></h5>
                                <p><?= substr(HtmlPurifier::process($teacher->body), 0, 100) ?>...</p>
                            </div>
						</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-12 d-flex align-items-center justify-content-center mt-5 show-380">
                <a href="<?= Url::to(['site/teachers']) ?>" class="text-white bg-base-pink btn text-uppercase pr-4 pl-4 view-all">
                    <?= Yii::t('common', 'View all') ?>
                </a>
            </div>
        </div>
    </div>
</section>