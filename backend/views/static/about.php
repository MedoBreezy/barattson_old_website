<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
	use mihaildev\ckeditor\CKEditor;
    use budyaga\cropper\Widget;

    $this->title = 'Haqqımızda səhifə yenilə';

    $langOrder = ['az', 'ru', 'en'];
    $tabIndex = 1;
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li class="active"> Haqqımızda səhifə yenilə</li>
</ol>

<div class="page-update">
    <div class="page-form">
        <?php $form = ActiveForm::begin(); ?>
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
                                            <?=
												$form->field($models[$lang], '['.$lang.']mission')->widget(CKEditor::className(), [
													'editorOptions' => [
														'preset' => 'basic',
														'inline' => false,
														'language' => 'ru',
													],
												]);
											?>
                                            <?= $form->field($models[$lang], '['.$lang.']lang')->hiddenInput(['value' => $lang])->label(false) ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?=
												$form->field($models[$lang], '['.$lang.']vision')->widget(CKEditor::className(), [
													'editorOptions' => [
														'preset' => 'basic',
														'inline' => false,
														'language' => 'ru',
													],
												]);
											?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?=
												$form->field($models[$lang], '['.$lang.']value')->widget(CKEditor::className(), [
													'editorOptions' => [
														'preset' => 'basic',
														'inline' => false,
														'language' => 'ru',
													],
												]);
											?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color: #da0e0e; font-size: 16px;">RƏHBƏR</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <?= $form->field($models[$lang], '['.$lang.']director_fullname')->textInput() ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?=
												$form->field($models[$lang], '['.$lang.']director_about')->widget(CKEditor::className(), [
													'editorOptions' => [
														'preset' => 'basic',
														'inline' => false,
														'language' => 'ru',
													],
												]);
											?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?=
												$form->field($models[$lang], '['.$lang.']director_message')->widget(CKEditor::className(), [
													'editorOptions' => [
														'preset' => 'basic',
														'inline' => false,
														'language' => 'ru',
													],
												]);
											?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color: #da0e0e; font-size: 16px;">SEO</p>
                                        </div>
                                        <div class="col-lg-12">
                                            <?= $form->field($models[$lang], '['.$lang.']seo_title')->textInput(['maxlength' => true]) ?>
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
                            <div class="row">
                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                    <?=
                                        $form->field($models['az'], 'image')->widget(Widget::className(), [
                                            'uploadUrl' => Url::toRoute('/static/uploadImage'),
                                            'label' => 'Şəkili seçin...',
                                            'width' => 1920,
                                            'height' => 550,
                                            'thumbnailWidth' => 650,
                                            'thumbnailHeight' => 200,
                                            'maxSize' => 5097152,
                                        ])
                                    ?>
                                </div>
                                <div class="col-lg-12" style="margin-bottom: 15px;">
                                    <?=
                                        $form->field($models['az'], 'director_image')->widget(Widget::className(), [
                                            'uploadUrl' => Url::toRoute('/static/uploadDirectorImage'),
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
        <?php ActiveForm::end(); ?>
    </div>
</div>