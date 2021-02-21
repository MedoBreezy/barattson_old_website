<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="team-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    <?= $form->field($model, 'r_id') ?>
    <?= $form->field($model, 'lang') ?>
    <?= $form->field($model, 'fullname') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>