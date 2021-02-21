<?php
	use webvimark\modules\UserManagement\UserManagementModule;
	use common\components\HelperComponent;

	$id = Yii::$app->user->id;
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?=
            dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        [
                            'label' => 'Əsas səhifə',
                            'icon' => 'fa fa-home',
                            'url' => '/admin-bs/site/index',
                        ],

                        [
                            'label' => 'Header',
                            'icon' => 'fa fa-header',
                            'url' => '/admin-bs/header/update?id=1',
                        ],

                        [
                            'label' => 'Statik səhifələr',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Əsas səhifə',
                                    'icon' => 'fa fa-newspaper-o',
                                    'url' => ['/static/edit', 'type' => HelperComponent::staticMainPage],
                                ],
                                [
                                    'label' => 'Haqqımızda',
                                    'icon' => 'fa fa-newspaper-o',
                                    'url' => ['/static/edit', 'type' => HelperComponent::staticAbout],
                                ],
                                [
                                    'label' => 'Keyfiyyətə zəmanət',
                                    'icon' => 'fa fa-newspaper-o',
                                    'url' => ['/static/edit', 'type' => HelperComponent::staticQualityGuarantee],
                                ],
                                [
                                    'label' => 'Şirkət profili',
                                    'icon' => 'fa fa-newspaper-o',
                                    'url' => ['/static/edit', 'type' => HelperComponent::staticSocialResponsibility],
                                ],
                                [
                                    'label' => 'Əlaqə',
                                    'icon' => 'fa fa-newspaper-o',
                                    'url' => ['/static/edit', 'type' => HelperComponent::staticContacts],
                                ],
                            ],
                        ],

                        [
                            'label' => 'Xəbərlər və Elanlar',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/news-ads',
                        ],

                        [
                            'label' => 'Kurslar',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/courses',
                        ],
						
						/*
                        [
                            'label' => 'Kurslar üçün bölmə',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/courses-category',
                        ],
						*/

                        [
                            'label' => 'Tədbirlər',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/events',
                        ],

                        [
                            'label' => 'Slayder',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/slider',
                        ],

                        [
                            'label' => 'Komanda',
                            'icon' => 'fa fa-users',
                            'url' => '/admin-bs/team',
                        ],

                        [
                            'label' => 'Müəllimlər',
                            'icon' => 'fa fa-user',
                            'url' => '/admin-bs/teachers',
                        ],

                        [
                            'label' => 'Vakansiya',
                            'icon' => 'fa fa-newspaper-o',
                            'url' => '/admin-bs/vacancies',
                        ],

                        [
                            'label' => 'Qalereya',
                            'icon' => 'fa fa-file-image-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Foto', 'icon' => 'fa fa-file-image-o', 'url' => ['/photo'],],
                                ['label' => 'Video', 'icon' => 'fa fa-file-video-o', 'url' => ['/video'],],
                            ],
                        ],

                        [
                            'label' => 'Rəylər',
                            'icon' => 'fa fa-comments',
                            'url' => '/admin-bs/reviews',
                        ],

                        [
                            'label' => 'Bannerlər',
                            'icon' => 'fa fa-sticky-note',
                            'url' => '/admin-bs/banners',
                        ],

                        [
                            'label' => 'Menu',
                            'icon' => 'fa fa-list-alt"',
                            'url' => '/admin-bs/menu',
                        ],
                        /*
                        [
                            'label' => 'İstifadəçilər',
                            'items' => UserManagementModule::menuItems()
                        ],
                        */
                    ],
                ]
            )
        ?>
    </section>
</aside>