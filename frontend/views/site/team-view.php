<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo($item->fullname.' | '.Yii::$app->name, $item->seo_description, $item->seo_keywords);
?>

<section class="news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/about']) ?>"><?= Yii::t('common', 'About us') ?></a></li>
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/team']) ?>"><?= Yii::t('common', 'Team') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $item->fullname ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1 class="base-blue item-title-modify"><?= $item->fullname ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-6">
				<div class="news-content p-4">
					<img src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" class="item-image-modify" />
					<p class="news-text">
						<?= $item->body ?>
					</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<?php foreach ($items as $item): ?>
					<a href="<?= Url::to(['site/team-view', 'id' => $item->r_id, 'slug' => HelperComponent::getUrl($item->fullname)]) ?>" class="text-decoration-none">
						<div class="card rounded-0 mb-4">
							<div class="card-body">
								<img src="<?= $item->image ? $item->image : '/media/img/no-image.jpg' ?>" style="width: 100%;" />
								<h4 class="card-title base-blue"><?= $item->fullname ?></h4>
								<p><?= $item->profession ?></p>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php
	$this->registerCssFile("/media/css/news.css");
?>