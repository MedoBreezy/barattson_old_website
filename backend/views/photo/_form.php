<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use dosamigos\datepicker\DatePicker;
    use budyaga\cropper\Widget;
    use yii\helpers\Url;
    use kartik\file\FileInput;

    $langOrder = ['az', 'ru', 'en'];
    $tabIndex = 1;
?>

<div class="video-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <input type="hidden" name="file_handler" value="<?= $uploadId ?>" />
        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-lg-12">
                        <?=
                            $form->field($models['az'], '[az]date')->widget(DatePicker::className(), [
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
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin-bottom: 15px; padding: 10px 30px;">
                        <?=
                            $form->field($models['az'], 'image')->widget(Widget::className(), [
                                'uploadUrl' => Url::toRoute('/photo/uploadImage'),
                                'label' => 'Şəkili seçin...',
                                'width' => 800,
                                'height' => 500,
                                'thumbnailWidth' => 550,
                                'thumbnailHeight' => 330,
                                'maxSize' => 5097152,
                            ])
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <?php
                            $initialPreview = [];
                            $initialPreviewConfig = [];

                            if (isset($files) && $files >= 1) {
                                foreach ($files as $file) {
                                    $initialPreview[] = Yii::$app->params['siteURL'].'/uploads/photo-files/'.$file->file;
                                    $initialPreviewConfig[] = [ 'caption' => explode('/', $file->file)[1], 'extra' => [ 'id' => $file->id, 'filePath' => $file->file ] ];
                                }
                            }

                            echo $form->field($fileModel, 'file[]')->widget(FileInput::classname(), [
                                'options' => [
                                    'multiple' => true
                                ],
                                'pluginOptions' => [
                                    'uploadUrl' => Url::to(['/photo/upload-file']),
                                    'uploadExtraData' => [
                                        'file_handler' => $uploadId
                                    ],

                                    'overwriteInitial' => false,

                                    'deleteUrl' => Url::to(['/photo/delete-file']),

                                    'showPreview' => true,
                                    'showUpload' => true,
                                    'showRemove' => false,

                                    'browseClass' => 'btn btn-success',
                                    'uploadClass' => 'btn btn-info',
                                    'removeClass' => 'btn btn-danger',
                                    'removeIcon' => '<i class="glyphicon glyphicon-trash"></i>',
                                    'browseLabel' => 'Foto əlavə et',

                                    'initialPreview' => $initialPreview,
                                    'initialPreviewConfig' => $initialPreviewConfig,
                                    'initialPreviewAsData' => true,
                                ]
                            ]);
                        ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <?= Html::submitButton('Yadda saxla', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
    $this->registerCss("
		.file-preview-frame .file-drag-handle {
			display: none;
		}
		.file-caption-main .file-caption-name {
		    display: none;
		}
	");
?>