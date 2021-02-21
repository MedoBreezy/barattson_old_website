<?php
	use yii\helpers\Url;
	
    $lang = Yii::$app->language;
    $pageRoute = Yii::$app->controller->id.Yii::$app->controller->action->id;
?>

<header>
    <div class="fixed_part fixed-top">
        <div class="top_part">
            <div class="container d-none d-lg-block">
                <div class="top">
                    <a href="/" class="logo">
                        <img class="img-fluid" src="/media/img/logo.png" alt="<?= Yii::$app->name ?>"/>
                    </a>
                    <!-- <a class="d-flex align-items-center justify-content-end number" href="tel:+994125054496">
                        <img class="img-fluid mr-1" style="width: 1.06em;" src="/media/icons/call-answer.svg" alt="phone"/>
                        <?= $header->phone ?>
                    </a> -->
                    <?php if ($header->button_1_text): ?>
                        <a class="btn" href="<?= $header->button_1_link ?>" target="_blank">
                            <img src="/media/icons/register.svg" alt="Register Icon">
                            <?= $header->button_1_text ?>
                        </a>
                    <?php endif ?>

                    <?php if ($header->button_2_text): ?>
                        <a class="btn" href="<?= $header->button_2_link ?>" target="_blank">
                            <img src="/media/icons/payment.svg" alt="Payment Icon">
                            <?= $header->button_2_text ?>
                        </a>
                    <?php endif ?>

                    <?php if ($header->button_3_text): ?>
                        <a class="btn" href="<?= $header->button_3_link ?>" target="_blank">
                            <img src="/media/icons/result.svg" alt="Results Icon">
                            <?= $header->button_3_text ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container" style="flex-direction: row-reverse;">
                <ul class="nav-right navbar-nav d-flex flex-row align-items-center justify-content-end list-unstyled">
                    <li class="nav-item">
                        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" id="search-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                width="20" height="20"
                                viewBox="0 0 172 172"
                                style="fill: #000000;">
                                <g
                                    fill="none"
                                    fill-rule="nonzero"
                                    stroke="none"
                                    stroke-width="1"
                                    stroke-linecap="butt"
                                    stroke-linejoin="miter"
                                    stroke-miterlimit="10"
                                    stroke-dasharray=""
                                    stroke-dashoffset="0"
                                    font-family="none"
                                    font-size="none"
                                    style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#ffffff">
                                        <path d="M74.53333,17.2c-31.59642,0 -57.33333,25.73692 -57.33333,57.33333c0,31.59642 25.73692,57.33333 57.33333,57.33333c13.73998,0 26.35834,-4.87915 36.24766,-12.97839l34.23203,34.23203c1.43802,1.49778 3.5734,2.10113 5.5826,1.57735c2.0092,-0.52378 3.57826,-2.09284 4.10204,-4.10204c0.52378,-2.0092 -0.07957,-4.14458 -1.57735,-5.5826l-34.23203,-34.23203c8.09924,-9.88932 12.97839,-22.50768 12.97839,-36.24766c0,-31.59642 -25.73692,-57.33333 -57.33333,-57.33333zM74.53333,28.66667c25.39937,0 45.86667,20.4673 45.86667,45.86667c0,25.39937 -20.46729,45.86667 -45.86667,45.86667c-25.39937,0 -45.86667,-20.46729 -45.86667,-45.86667c0,-25.39937 20.4673,-45.86667 45.86667,-45.86667z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a href="/" class="text-center">
                            <img class="mobile_logo" src="/media/img/LogoIcon.png" alt="<?= Yii::$app->name ?>"/>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show lang">
                            <a class="text-white text-decoration-none text-uppercase" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($lang == "az"): ?>
                                    <img style="width: 22px" src="/media/img/aze.svg"/>
                                <?php endif;?>
                                <?php if ($lang == "en"): ?>
                                    <img style="width: 22px" src="/media/img/en.svg"/>
                                <?php endif;?>
                                <?php if ($lang == "ru"): ?>
                                    <img style="width: 22px" src="/media/img/ru.svg"/>
                                <?php endif;?>
                                
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="20" height="20"
                                    viewBox="0 0 172 172"
                                    style="fill: #000000;">
                                    <g
                                        fill="none"
                                        fill-rule="nonzero"
                                        stroke="none"
                                        stroke-width="1"
                                        stroke-linecap="butt"
                                        stroke-linejoin="miter"
                                        stroke-miterlimit="10"
                                        stroke-dasharray=""
                                        stroke-dashoffset="0"
                                        font-family="none"
                                        font-size="none"
                                        style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path>
                                        <g fill="#ffffff">
                                            <path d="M17.2,68.8v-11.46667c0,-2.21307 1.27853,-4.2312 3.27947,-5.18293c2.00093,-0.95173 4.3688,-0.65933 6.0888,0.74533l59.43173,48.63013l59.43747,-48.63013c1.71427,-1.40467 4.08213,-1.69133 6.0888,-0.74533c2.00667,0.946 3.27373,2.96987 3.27373,5.18293v11.46667c0,1.72 -0.774,3.34827 -2.10413,4.4376l-63.06667,51.6c-2.1156,1.72573 -5.14853,1.72573 -7.26413,0l-63.06667,-51.6c-1.3244,-1.08933 -2.0984,-2.7176 -2.0984,-4.4376z"></path>
                                        </g>
                                    </g>
                                </svg> -->
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" style="padding: .25rem .5rem" href="/az"><img style="width: 22px" src="/media/img/aze.svg"/></a>
                                <a class="dropdown-item" style="padding: .25rem .5rem" href="/en"><img style="width: 22px" src="/media/img/en.svg"/></a>
                                <a class="dropdown-item" style="padding: .25rem .5rem" href="/ru"><img style="width: 22px" src="/media/img/ru.svg"/></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto justify-content-around" style="min-width: 76%;">
                        <?php foreach ($menus as $menu): ?>
                            <?php if ($menu->link == "/about"): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?= $menu->title ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?= $menu->link ?>"><?= $menu->title ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/team']) ?>"><?= Yii::t('common', 'Team') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/vacancies']) ?>"><?= Yii::t('common', 'Vacancies') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/news-ads']) ?>"><?= Yii::t('common', 'News & Ads') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/photo']) ?>"><?= Yii::t('common', 'Photo gallery') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/video']) ?>"><?= Yii::t('common', 'Video gallery') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/events']) ?>"><?= Yii::t('common', 'Exams') ?></a>
                                        <a class="dropdown-item" href="<?= Url::to(['site/testimonials']) ?>"><?= Yii::t('common', 'Testimonials') ?></a>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= $menu->link ?>" target="<?= $menu->type == 1 ? '_self' : '_blank' ?>"><?= $menu->title ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="search">
            <div class="container">
                <form action="<?= Url::to(['site/search']) ?>" class="d-flex align-items-center search-form-modify">
                    <input type="text" name="q" class="form-control rounded-0" placeholder="<?= Yii::t('common', 'Search') ?>" />
                    <button type="submit" class="btn text-uppercase base-pink search-submit-modify"><?= Yii::t('common', 'Search') ?></button>
                </form>
            </div>
        </div>
    </div>
    
    <?php if ($pageRoute == 'siteindex'): ?>
        <div class="owl-carousel owl-theme">
            <?php foreach ($slides as $slide): ?>
                <div class="item" style="background-image: url('<?= $slide->image ?>')">
                    <div class="container">
                        <div>
                            <h1><?= $slide->title ?></h1>
                            <p><?= $slide->body ?></p>
                            <button class="btn btn-lg" onclick="location.href='<?= $slide->button_link ?>';"><?= $slide->button_text ?></button>
                        </div>
                    </div>
                    <div class="overlay"></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- mobile buttons -->
    <div class="container d-block d-lg-none mobile_btns">
        <div class="top">
            <?php if ($header->button_1_text): ?>
                <a class="btn" href="<?= $header->button_1_link ?>" target="_blank">
                    <img src="/media/icons/register.svg" alt="Register Icon">
                    <?= $header->button_1_text ?>
                </a>
            <?php endif ?>

            <?php if ($header->button_2_text): ?>
                <a class="btn" href="<?= $header->button_2_link ?>" target="_blank">
                    <img src="/media/icons/payment.svg" alt="Register Icon">
                    <?= $header->button_2_text ?>
                </a>
            <?php endif ?>

            <?php if ($header->button_3_text): ?>
                <a class="btn" href="<?= $header->button_3_link ?>" target="_blank">
                    <img src="/media/icons/result.svg" alt="Register Icon">
                    <?= $header->button_3_text ?>
                </a>
            <?php endif ?>
        </div>
    </div>
</header>