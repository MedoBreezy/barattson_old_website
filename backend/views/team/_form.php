<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use budyaga\cropper\Widget;
    use yii\helpers\Url;

    $langOrder = ['az', 'ru', 'en'];
    $tabIndex = 1;
?>

<div class="video-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-lg-12">
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
                                        <?= $form->field($models[$lang], '['.$lang.']fullname')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']lang')->hiddenInput(['value' => $lang])->label(false) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']profession')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?=
                                            $form->field($models[$lang], '['.$lang.']body')->widget(CKEditor::className(),[
                                                'editorOptions' => ElFinder::ckeditorOptions('elfinder', [
                                                    'preset' => 'full',
                                                    'inline' => false,
                                                    'language' => 'ru',
                                                ]),
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p style="color: #da0e0e; font-size: 16px;">SEO</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']seo_keywords')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']seo_description')->textarea(['rows' => '3']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $tabIndex++; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 15px; padding: 10px 30px;">
                            <?=
                                $form->field($models['az'], 'image')->widget(Widget::className(), [
                                    'uploadUrl' => Url::toRoute('/team/uploadImage'),
                                    'label' => 'Şəkili seçin...',
                                    'width' => 500,
                                    'height' => 500,
                                    'thumbnailWidth' => 350,
                                    'thumbnailHeight' => 350,
                                    'maxSize' => 5097152,
                                ])
                            ?>
                        </div>
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