<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\web\View;
    use backend\models\Courses;

    $this->title = 'Kurslar';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li class="active">Kurslar</li>
</ol>

<div class="courses-index">
    <?= Html::a('Yarat', ['/courses/create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px;']) ?>

    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                'date_start',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $query = Courses::find()->select('status')->where(['r_id' => $model->r_id])->one();

                            if ($query->status == 1) {
                                $class = 'glyphicon-eye-open';
                            } else {
                                $class = 'glyphicon-eye-close';
                            }

                            return Html::a('<span class="glyphicon '.$class.' coursesStatus" data-rid="'.$model->r_id.'"></span>', $url, [
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
                            $url = '/admin-bs/courses/update?id='.$model->r_id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = '/admin-bs/courses/delete?id='.$model->r_id;
                            return $url;
                        }
                    }
                ],
            ],
        ]);
    ?>
</div>

<?php
    $this->registerJs("
        $(function() {
            $('.coursesStatus').on('click', function() {
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
                    url: '/admin-bs/courses/status-change',
                    type: 'GET',
                    data: {'rid': rid, 'status': status},
                });
            });
        });
	", View::POS_END);
?>

<style>
    .coursesStatus { cursor: pointer; }
</style>