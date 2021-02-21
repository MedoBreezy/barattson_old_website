<section class="awesome-facts">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                <h1 class="">
                    <?= Yii::t('common', 'Facts') ?>
                </h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-baseline">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <h2 class="base-pink"><?= $facts->fact_1_title ?></h2>
                <p class="base-blue"><?= $facts->fact_1_body ?></p>
            </div>
            <div class="col-lg-1 d-none d-lg-block"></div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <h2 class="base-pink"><?= $facts->fact_2_title ?></h2>
                <p class="base-blue"><?= $facts->fact_2_body ?></p>
            </div>
            <div class="col-lg-1 d-none d-lg-block"></div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <h2 class="base-pink"><?= $facts->fact_3_title ?></h2>
                <p class="base-blue"><?= $facts->fact_3_body ?></p>
            </div>
        </div>
    </div>
</section>