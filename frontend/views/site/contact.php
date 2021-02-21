<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\captcha\Captcha;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', 'Contacts') . ' | ' . Yii::t('common', Yii::$app->name), $contacts->seo_description, $contacts->seo_keywords);
?>

<section class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/"><?= Yii::t('common', 'Home') ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= Yii::t('common', 'Contacts') ?></li>
					</ol>
				</nav>
			</div>
			<div class="col-12">
				<h1><?= Yii::t('common', 'Contacts') ?></h1>
			</div>
			<div class="col-lg-12 col-md-12">
				<p class="base-pink">Adress:</p>
				<div class="row left-row pb-5 mb-5">
					<div class="col-lg-6 col-md-6 col-sm-6 mt-5">
						<a href="#">Main office</a>
						<p>44 Jafar Jabbarli street,Caspian Plaza 3,7th floor,<br />Baku AZ1065 Azerbaijan.</p>
						<p class="mb-0 mt-3">Telephone:</p>
						<span class="d-block">(+994 12) 5054496</span>
						<span class="d-block">(+994 12) 5054497</span>
						<p class="mb-0 mt-3">Mobile:</p>
						<span class="d-block">(+994 70) 2054497</span>
						<p class="mb-0 mt-3">Email:</p>
						<span class="d-block">office@barattson.com</span>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 mt-5">
						<a href="#">Elmler branch</a>
						<p>Bakhtiyar Vahabzadeh, 5, 3rd floor, Baku AZ1141, Azerbaijan.<br />(Elmler Akadamiyasi m/st 2nd m/st exit).</p>
						<p class="mb-0 mt-3">Telephone:</p>
						<span class="d-block">(+994 12) 5104498</span>
						<p class="mb-0 mt-3">Mobile:</p>
						<span class="d-block">(+994 55) 5044495</span>
						<p class="mb-0 mt-3">Email:</p>
						<span class="d-block">office@barattson.com</span>
					</div>
				</div>
				<p class="base-pink">By departament:</p>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">Finance Qualifications</a>
						<span class="d-block">(+994 70) 2054496</span>
						<span class="d-block">(+994 55) 2054496 / Whatsapp</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">Languages Qualification</a>
						<span class="d-block">(+994 70) 2054491</span>
						<span class="d-block">(+994 70) 2054497</span>
						<span class="d-block">(+994 70) 2054494 / Whatsapp</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">Official IELTS Test Center</a>
						<span class="d-block">(+994 70) 2054493</span>
						<span class="d-block">ielts@barattson.com</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">IELTS Trial Test Center</a>
						<span class="d-block">(+994 55) 5044497 / Whatsapp</span>
						<span class="d-block">ieltsmock@barattson.com</span>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">ACCA CBE</a>
						<span class="d-block">(+994 70) 2054490 / Whatsapp</span>
						<span class="d-block">cbe@barattson.com</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">For Vacancies</a>
						<span class="d-block">(+994 70) 2054495</span>
						<span class="d-block">vacancy@barattson.com</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">For Complains and comments</a>
						<span class="d-block">(+994 55) 503 44 93</span>
						<span class="d-block">comments@barattson.com</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-4 mb-2">
						<a href="#">Operation Department</a>
						<span class="d-block">(+994 70) 205 44 98</span>
						<span class="d-block">operationsteam@barattson.com</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="showmap">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.507297681249!2d49.810094015669975!3d40.375447966072585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307defaa0d313b%3A0x17a53ad6f44b2c5b!2sBarattson!5e0!3m2!1str!2s!4v1566991066862!5m2!1str!2s" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>
</section>

<?php
	$this->registerCssFile("/media/css/contact.css");
?>