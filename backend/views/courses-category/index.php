<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Kurslar üçün bölmə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li class="active">Kurslar üçün bölmə</li>
</ol>

<div class="courses-index">
    <?= Html::a('Yarat', ['/courses-category/create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px;']) ?>

    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
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
                            $url = '/admin-bs/courses-category/update?id='.$model->r_id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = '/admin-bs/courses-category/delete?id='.$model->r_id;
                            return $url;
                        }
                    }
                ],
            ],
        ]);
    ?>
</div>