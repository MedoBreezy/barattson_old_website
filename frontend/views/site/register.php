<?php
    use yii\helpers\Url;
	use common\components\HelperComponent;

    HelperComponent::registerSeo(Yii::t('common', 'Online registration').' | '.Yii::$app->name, Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<section class="page-inner">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= Url::to(['site/index']) ?>"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Online registration') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1 class="base-blue"><?= Yii::t('common', 'Online registration') ?></h1>
			</div>
		</div>
		<div class="row site_register_container">
            <div class="site_register_item">
				<p><a href="http://schoolman.barattson.com/course/registration.aspx" target="_blank">For Course Registration</a></p>
            </div>
			<div class="site_register_item">
				<p><a href="http://schoolman.barattson.com/Exam/ExamRegistration.aspx" target="_blank">For Exams Registration</a></p>
            </div>
			<div class="site_register_item">
				<p><a href="http://schoolman.barattson.com/RegisterModule/EventRegistration.aspx" target="_blank">For Events Registration</a></p>
            </div>
        </div>
    </div>
</section>