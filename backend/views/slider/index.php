<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\web\View;
    use backend\models\Slider;

    $this->title = 'Slayder';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li class="active">Slayder</li>
</ol>

<div class="news-ads-index">
    <?= Html::a('Yarat', ['/slider/create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 10px;']) ?>

    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $query = Slider::find()->select('status')->where(['r_id' => $model->r_id])->one();

                            if ($query->status == 1) {
                                $class = 'glyphicon-eye-open';
                            } else {
                                $class = 'glyphicon-eye-close';
                            }

                            return Html::a('<span class="glyphicon '.$class.' sliderStatus" data-rid="'.$model->r_id.'"></span>', $url, [
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
                            $url = '/admin-bs/slider/update?id='.$model->r_id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = '/admin-bs/slider/delete?id='.$model->r_id;
                            return $url;
                        }
                    }
                ],
            ],
        ]);
    ?>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Sıralama</h3>
    </div>
    <div class="box-body">
        <div class="alert alert-success" id="response" role="alert" style="margin-bottom: 0px;">
            Sıralamanı istəyinizə uyğun dəyişib yadda saxlayın.
        </div>
        <div class="table-responsive">
            <ul id="sortable" class="list-group">
                <?php foreach ($itemsOrder as $itemOrder): ?>
                    <li id="id_<?= $itemOrder->r_id ?>" class="list-group-item"><?= $itemOrder->title ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <button class="save btn btn-success">Yadda saxla</button>
    </div>
</div>

<?php
    $this->registerJsFile(
        'https://code.jquery.com/ui/1.12.0/jquery-ui.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );

    $this->registerJs("
        $(function() {
            var ul_sortable = $('#sortable');
			
			ul_sortable.sortable({
                revert: 100,
                placeholder: 'placeholder',
            });
            
            ul_sortable.disableSelection();
            
            var btn_save = $('button.save');
            var div_response = $('#response');
            
            btn_save.on('click', function(e) {
                e.preventDefault();
                var sortable_data = ul_sortable.sortable('toArray');
                div_response.text('Yadda saxlanılır...');
                $.ajax({
                    data: {'items': sortable_data},
                    type: 'POST',
                    url: '/admin-bs/slider/order-save',
                    success: function(result) {
                        div_response.text(result);
                    }
                });
            });
            
            $('.sliderStatus').on('click', function() {
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
                    url: '/admin-bs/slider/status-change',
                    type: 'GET',
                    data: {'rid': rid, 'status': status},
                });
            });
        });
	", View::POS_END);
?>

<style>
    .sliderStatus { cursor: pointer; }
    #sortable {
        width: 100%;
        float: left;
        margin: 20px 0;
        list-style: none;
        position: relative !important;
    }
    #sortable li {
        cursor: move;
    }
    #sortable li.ui-sortable-helper {
        border-color: #3498db;
    }
    #sortable li.placeholder {
        height: 50px;
        background: #eee;
        border: 2px dashed #bbb;
        display: block;
        opacity: 0.6;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
    }
</style>