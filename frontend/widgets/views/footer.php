<?php
	use yii\helpers\Url;
?>

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6 col-xs-12 footer-contact">
                    <ul>
                        <li>
                            <h5 class="text-uppercase text-white">
								<?= Yii::t('common', 'Contacts') ?>
							</h5>
                        </li>
                        <li>
                            <select name="branchs" id="branchs">
                                <option value="1"><?= Yii::t('common', 'Main office') ?></option>
                                <option value="2"><?= Yii::t('common', 'Nizami branch') ?></option>
                            </select>
                        </li>
						<li>
                            <p class="text-white" id="main_office">
                                <?= Yii::t('common', 'Bakhtiyar Vahabzadeh, 5, 3rd floor, Baku AZ1141, Azerbaijan.') ?>
                            </p>
                            <p class="text-white" id="nizami_branch" style="display: none;">
								<?= Yii::t('common', '44 Jafar Jabbarli street, Caspian Plaza 3, 7th floor. Baku AZ1065, Azerbaijan.') ?>
                            </p>
                        </li>
                        <li class="d-flex">
                            <a href="/contacts#showmap" class="text-white map d-flex align-items-center">
								<?= Yii::t('common', 'View map') ?><img class="ml-4" src="/media/icons/map.png" alt="map" />
							</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 col-xs-12 d-flex justify-content-end pr-xl-5 justify-start-767">
                    <ul>
                        <li><a href="<?= Url::to(['site/team']) ?>" class="text-white"><?= Yii::t('common', 'Team') ?></a></li>
						<li><a href="<?= Url::to(['site/vacancies']) ?>" class="text-white"><?= Yii::t('common', 'Vacancies') ?></a></li>
						<li><a href="<?= Url::to(['site/news-ads']) ?>" class="text-white"><?= Yii::t('common', 'News & Ads') ?></a></li>
						<li><a href="<?= Url::to(['site/photo']) ?>" class="text-white"><?= Yii::t('common', 'Photo gallery') ?></a></li>
						<li><a href="<?= Url::to(['site/video']) ?>" class="text-white"><?= Yii::t('common', 'Video gallery') ?></a></li>
						<li><a href="<?= Url::to(['site/testimonials']) ?>" class="text-white"><?= Yii::t('common', 'Testimonials') ?></a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 col-xs-12 d-flex justify-content-start pl-xl-5 justify-start-767">
                    <ul>
                        <?php foreach ($menus as $menu): ?>
							<?php if ($menu->link == "/about") continue; ?>
							<li><a href="<?= $menu->link ?>" class="text-white" target="<?= $menu->type == 1 ? '_self' : '_blank' ?>"><?= $menu->title ?></a></li>
						<?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-6 col-xs-12 d-flex align-items-end justify-content-start flex-column align-items-center-576">
                    <ul class="social d-flex flex-row justify-content-around  list-unstyled">
                        <li><a href="https://facebook.com/Barattson" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://youtube.com/user/barattson" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="https://linkedin.com/company/barattson" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://twitter.com/barattson" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/barattson" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <ul class="number-info d-flex flex-column list-unstyled align-items-center-576">
                        <li class="text-uppercase"><?= Yii::t('common', 'Call us') ?></li>
                        <li><img class="p" src="/media/icons/phone.svg" alt=""><span><?= $header->phone ?></span></li>
                        <!-- <li><a target="_blank" href="https://wa.me/994702054496"><img class="wp" src="/media/icons/whatsapp.svg" alt=""><span><?= $header->phone2 ?></span></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-6 col-xs-12 h-100 d-flex align-items-center">
                    <span class="text-white">&copy; Barattson LLC 2014-<?= date('Y') ?></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 h-100 d-flex align-items-center justify-content-end">
                    <a href="http://benzeine.com/" target="_blank" class="text-white text-right">benzeine LLC</a>
                </div>
            </div>
        </div>
    </div>
</footer>