<?php
    use yii\grid\GridView;
    use yii\helpers\Html;
    use backend\models\Photo;
    use yii\web\View;

    $this->title = 'Foto';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li class="active"> Foto</li>
</ol>

<div class="video-index">
    <?= Html::a('Yarat', ['/photo/create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px;']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'date',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        $query = Photo::find()->select('status')->where(['r_id' => $model->r_id])->one();

                        if ($query->status == 1) {
                            $class = 'glyphicon-eye-open';
                        } else {
                            $class = 'glyphicon-eye-close';
                        }

                        return Html::a('<span class="glyphicon '.$class.' photoStatus" data-rid="'.$model->r_id.'"></span>', $url, [
                            'title' => 'Status',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Yenilə',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash" onclick="return confirm(\'Silmək istəyirsiniz?\')"></span>', $url, [
                            'title' => 'Sil',
                        ]);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'update') {
                        $url = '/admin-bs/photo/update?id='.$model->r_id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url = '/admin-bs/photo/delete?id='.$model->r_id;
                        return $url;
                    }
                }
            ],
        ],
    ]); ?>
</div>

<?php
    $this->registerJs("
        $(function() {
            $('.photoStatus').on('click', function() {
                var rid = $(this).data('rid');
                
                if ($(this).hasClass('glyphicon-eye-open')) {
                    var status = 0;
                    
                    $(this).removeClass('glyphicon-eye-open');
                    $(this).addClass('glyphicon-eye-close');
                } else {
                    var status = 1;
                    
                    $(this).removeClass('glyphicon-eye-close');
                    $(this).addClass('glyphicon-eye-open');
                }
                
                $.ajax({
                    url: '/admin-bs/photo/status-change',
                    type: 'GET',
                    data: {'rid': rid, 'status': status},
                });
            });
        });
    ", View::POS_END);
?>

<style>
    .photoStatus { cursor: pointer; }
</style>