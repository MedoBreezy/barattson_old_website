<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $langOrder = ['az', 'ru', 'en'];
    $tabIndex = 1;
?>

<div class="video-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-lg-12">
                        <?= $form->field($models['az'], '[az]phone')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">AZ</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">RU</a></li>
                        <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">EN</a></li>
                    </ul>
                    <div class="tab-content">
                        <?php foreach ($langOrder as $lang): ?>
                            <div class="tab-pane <?= $tabIndex == 1 ? 'active' : '' ?>" id="tab_<?= $tabIndex ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']button_1_text')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']button_1_link')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']button_2_text')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']button_2_link')->textInput(['maxlength' => true]) ?>
										<?= $form->field($models[$lang], '['.$lang.']button_3_text')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']button_3_link')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']lang')->hiddenInput(['value' => $lang])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                            <?php $tabIndex++; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= Html::submitButton('Yadda saxla', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>