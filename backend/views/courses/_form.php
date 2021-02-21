<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use dosamigos\datepicker\DatePicker;
    use budyaga\cropper\Widget;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use backend\models\CoursesCategory;

    $langOrder = ['az', 'ru', 'en'];
    $tabIndex = 1;
?>

<div class="video-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-lg-3">
                        <?=
                            $form->field($models['az'], '[az]date_start')->widget(DatePicker::className(), [
                                'template' => '{addon}{input}',
                                'language' => 'az',
                                'inline' => false,
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                ]
                            ]);
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <?=
                            $form->field($models['az'], '[az]date_finish')->widget(DatePicker::className(), [
                                'template' => '{addon}{input}',
                                'language' => 'az',
                                'inline' => false,
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd',
                                ]
                            ]);
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($models['az'], '[az]price_old')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $form->field($models['az'], '[az]price_new')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-12">
                        <?php
                            $categories = CoursesCategory::find()->where(['lang' => 'az'])->all();
                            $items = ArrayHelper::map($categories, 'r_id', 'title');
                            $params = ['prompt' => 'Bölməni seçin'];

                            echo $form->field($models['az'], '[az]category')->dropDownList($items, $params);
                        ?>
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
                                        <?= $form->field($models[$lang], '['.$lang.']title')->textInput(['maxlength' => true]) ?>
                                        <?= $form->field($models[$lang], '['.$lang.']lang')->hiddenInput(['value' => $lang])->label(false) ?>
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
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']advantage')->textarea(['rows' => 6]) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']privilege')->textarea(['rows' => 6]) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']included')->textarea(['rows' => 6]) ?>
                                    </div>
                                    <div class="col-lg-12">
                                        <?= $form->field($models[$lang], '['.$lang.']register_link')->textInput(['maxlength' => true]) ?>
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
                                    'uploadUrl' => Url::toRoute('/courses/uploadImage'),
                                    'label' => 'Şəkili seçin...',
                                    'width' => 800,
                                    'height' => 500,
                                    'thumbnailWidth' => 550,
                                    'thumbnailHeight' => 330,
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