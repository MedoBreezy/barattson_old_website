<?php
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
	use yii\helpers\HtmlPurifier;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Search') . ' | ' . Yii::t('common', Yii::$app->name), 'Decription', 'Keywords');
?>

<section class="popular-courses courses">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Search') ?></li>
						<li class="breadcrumb-item active" aria-current="page"><?= HtmlPurifier::process($q) ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1 class="base-blue">
					<?= Yii::t('common', 'Search') ?>
					<?php if ($models != null): ?>
						| <?= Yii::t('common', 'Results count: ') ?> <?= $count ?>
					<?php else: ?>
						| <?= Yii::t('common', 'No results found.') ?>
				<?php endif; ?>
				</h1>
			</div>
		</div>
		<div class="row">
			<?php if ($models != null): ?>
				<?php foreach ($models as $item): ?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<div class="card">
							<a href="<?= Url::to([$item['link'], 'id' => $item['r_id'], 'slug' => HelperComponent::getUrl($item['title'])]) ?>">
								<img class="card-img-top" src="<?= $item['image'] ? $item['image'] : '/media/img/no-image.jpg' ?>" alt="<?= $item['title'] ?>" />
							</a>
							<div class="card-body">
								<?php if ($item['type'] == 'courses'): ?>
									<span class="type"><?= HelperComponent::getCourseCategoryName($item['category']) ?></span>
								<?php endif; ?>
								<h5 class="card-title"><?= $item['title'] ?></h5>
								<div class="body-footer d-flex align-items-center justify-content-between">
									<?php if ($item['type'] == 'courses'): ?>
										<span class="pricing">
											<span class="new-pricing">&#8380; <?= $item['price_new'] ?></span>
											<?php if ($item['price_old']): ?>
												<span class="old-pricing">&#8380; <?= $item['price_old'] ?></span>
											<?php endif; ?>
										</span>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<div class="pagination">
			<?=
				LinkPager::widget([
					'pagination' => $dataProvider->pagination,
					'maxButtonCount' => 5,
				]);
			?>
		</div>
	</div>
</section>

<?php
	$this->registerCssFile("/media/css/contact.css");
?>