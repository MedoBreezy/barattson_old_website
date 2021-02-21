<?php
	namespace frontend\controllers;
	
	use backend\models\Reviews;
    use Yii;
    use yii\web\Controller;
	use yii\data\Pagination;
	use yii\helpers\Html;
	use yii\data\SqlDataProvider;
    use backend\models\NewsAds;
    use backend\models\Courses;
    use backend\models\Team;
    use backend\models\Teachers;
    use backend\models\StaticPages;
    use backend\models\Video;
    use backend\models\Photo;
    use backend\models\PhotoFiles;
    use backend\models\Vacancies;
    use backend\models\Events;
    use common\components\HelperComponent;
    use frontend\models\ContactForm;
use yii\helpers\VarDumper;

class SiteController extends Controller {
		public function actions() {
			return [
				'error' => [
					'class' => 'yii\web\ErrorAction',
				],
				'captcha' => [
					'class' => 'yii\captcha\CaptchaAction',
					'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
				],
			];
		}
		
		public function actionIndex() {
            return $this->render('index', [

            ]);
		}

		public function actionAbout() {
            $lang = Yii::$app->language;

            $about = StaticPages::find()
                ->where(['lang' => $lang, 'type' => HelperComponent::staticAbout])
                ->one();
			
			$qualityGuarantee = StaticPages::find()
                ->where(['lang' => $lang, 'type' => HelperComponent::staticQualityGuarantee])
                ->one();
			
			$companyProfile = StaticPages::find()
                ->where(['lang' => $lang, 'type' => HelperComponent::staticSocialResponsibility])
                ->one();

		    return $this->render('about', [
                'about' => $about,
                'qualityGuarantee' => $qualityGuarantee,
                'companyProfile' => $companyProfile,
            ]);
        }

        public function actionTestimonials() {
            $lang = Yii::$app->language;

            $query = Reviews::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date' => SORT_DESC]);
			
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);
			
			$testimonials = $query->offset($pagination->offset)
				->limit($pagination->limit)
				->all();

            return $this->render('testimonials', [
                'testimonials' => $testimonials,
                'pagination' => $pagination,
            ]);
        }

		public function actionContact() {
            $lang = Yii::$app->language;
			$contacts = StaticPages::find()
                ->where(['lang' => $lang, 'type' => HelperComponent::staticContacts])
                ->one();
			
			$model = new ContactForm();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
					Yii::$app->session->setFlash('email-success', Yii::t('common', 'Məktubunuz uğurla göndərilmişdir. Təşəkkür edirik!'));
				}
				
				return $this->refresh();
			} else {
				return $this->render('contact', [
					'model' => $model,
					'contacts' => $contacts,
				]);
			}
		}

		public function actionRegister() {
            return $this->render('register', []);
        }

        public function actionVideo() {
            $lang = Yii::$app->language;

            $videos = Video::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date' => SORT_DESC])
                ->all();

            return $this->render('video', [
                'videos' => $videos,
            ]);
        }
		
		public function actionVideoView($id) {
            $lang = Yii::$app->language;

            $item = Video::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Video::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date' => SORT_DESC])
                ->limit(3)
                ->all();
			
            return $this->render('video-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }

        public function actionPhoto() {
            $lang = Yii::$app->language;

            $photos = Photo::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date' => SORT_DESC])
                ->all();

            return $this->render('photo', [
                'photos' => $photos,
            ]);
        }
		
		public function actionPhotoView($id) {
            $lang = Yii::$app->language;

            $item = Photo::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $photofiles = PhotoFiles::find()
                ->where(['photo_id' => $id])
                ->all();
			
			$items = Photo::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date' => SORT_DESC])
                ->limit(3)
                ->all();
			
            return $this->render('photo-view', [
                'item' => $item,
                'photofiles' => $photofiles,
                'items' => $items,
            ]);
        }

        public function actionTeam() {
            $lang = Yii::$app->language;

            $team = Team::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['fullname' => '']])
                ->orderBy(['order' => SORT_ASC])
                ->all();

            return $this->render('team', [
                'team' => $team,
            ]);
        }

        public function actionTeamView($id) {
            $lang = Yii::$app->language;

            $item = Team::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Team::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['fullname' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['order' => SORT_ASC])
                ->limit(3)
                ->all();

            return $this->render('team-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }

        public function actionNewsAds() {
            $lang = Yii::$app->language;

            $newsAds = NewsAds::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date' => SORT_DESC])
                ->all();

            return $this->render('news-ads', [
                'newsAds' => $newsAds,
            ]);
        }

                        /**
         * Debug function
         * d($var);
         */
        function d($var,$caller=null)
        {
            if(!isset($caller)){
                $caller = array_shift(debug_backtrace(1));
            }
            echo '<code>File: '.$caller['file'].' / Line: '.$caller['line'].'</code>';
            echo '<pre>';
            VarDumper::dump($var, 10, true);
            echo '</pre>';
        }

        /**
         * Debug function with die() after
         * dd($var);
         */
        function dd($var)
        {
            $caller = array_shift(debug_backtrace(1));
            $this->d($var,$caller);
            die();
        }

        public function actionNewsAdsView($id) {
            $lang = Yii::$app->language;

            $item = NewsAds::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $photofiles = PhotoFiles::find()
                ->where(['news_id' => $id])
                ->all();

            $items = NewsAds::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date' => SORT_DESC])
                ->limit(3)
                ->all();

            return $this->render('news-ads-view', [
                'item' => $item,
                'items' => $items,
                'photofiles' => $photofiles
            ]);
        }

        public function actionCourses() {
            $lang = Yii::$app->language;
			
			$query = Courses::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date_start' => SORT_ASC]);
			
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
			
			$courses = $query->offset($pagination->offset)
				->limit($pagination->limit)
				->all();
			
			return $this->render('courses', [
                'courses' => $courses,
                'pagination' => $pagination,
            ]);
        }

        public function actionCoursesView($id) {
            $lang = Yii::$app->language;

            $item = Courses::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Courses::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date_start' => SORT_ASC])
                ->limit(3)
                ->all();

            return $this->render('courses-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }

        public function actionTeachers() {
            $lang = Yii::$app->language;
			
			$query = Teachers::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['fullname' => '']])
                ->orderBy(['order' => SORT_ASC]);
			
			$count = $query->count();
			$pagination = new Pagination(['totalCount' => $count, 'pageSize' => 9]);
			
            $teachers = $query->offset($pagination->offset)
				->limit($pagination->limit)
				->all();

            return $this->render('teachers', [
                'teachers' => $teachers,
				'pagination' => $pagination,
            ]);
        }

        public function actionTeachersView($id) {
            $lang = Yii::$app->language;

            $item = Teachers::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Teachers::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['fullname' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['order' => SORT_ASC])
                ->limit(3)
                ->all();

            return $this->render('teachers-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }

        public function actionVacancies() {
            $lang = Yii::$app->language;

            $vacancies = Vacancies::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date_start' => SORT_ASC])
                ->all();

            return $this->render('vacancies', [
                'vacancies' => $vacancies,
            ]);
        }

        public function actionVacanciesView($id) {
            $lang = Yii::$app->language;

            $item = Vacancies::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Vacancies::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date_start' => SORT_ASC])
                ->limit(3)
                ->all();

            return $this->render('vacancies-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }

        public function actionEvents() {
            $lang = Yii::$app->language;

            $events = Events::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->orderBy(['date' => SORT_DESC])
                ->all();

            return $this->render('events', [
                'events' => $events,
            ]);
        }

        public function actionEventsView($id) {
            $lang = Yii::$app->language;

            $item = Events::find()
                ->where(['lang' => $lang, 'r_id' => $id])
                ->one();

            $items = Events::find()
                ->where(['lang' => $lang, 'status' => HelperComponent::itemsStatusEnabled])
                ->andWhere(['not', ['title' => '']])
                ->andWhere(['not', ['r_id' => $id]])
                ->orderBy(['date' => SORT_DESC])
                ->limit(3)
                ->all();

            return $this->render('events-view', [
                'item' => $item,
                'items' => $items,
            ]);
        }
		
		public function actionSearch($q = null) {
			$lang = Yii::$app->language;
            $q = Html::encode($q);

            $totalCount = Yii::$app->db->createCommand('
                SELECT COUNT(*) FROM (
                    SELECT status, lang, title FROM courses
                    WHERE lang=:lang AND status=1 AND title LIKE :q
                    UNION
                    SELECT status, lang, title FROM news_ads
                    WHERE lang=:lang AND status=1 AND title LIKE :q
                ) as count_all
                ', [
                    ':lang' => $lang,
                    ':q' => '%'.$q.'%',
                ]
            )->queryScalar();

            $sql = "
                SELECT 'site/courses-view' as link, 'courses' as type, status, lang, r_id, title, image, category, price_new, price_old FROM courses
                WHERE lang=:lang AND status=1 AND title LIKE :q
                UNION
                SELECT 'site/news-ads-view' as link, 'news_ads' as type, status, lang, r_id, title, image, 'undefined' as category, 'undefined' as price_new, 'undefined' as price_old FROM news_ads
                WHERE lang=:lang AND status=1 AND title LIKE :q ORDER BY r_id DESC
            ";

            $dataProvider = new SqlDataProvider([
                'sql' => $sql,
                'params' => [':lang' => $lang, ':q' => '%'.$q.'%'],
                'totalCount' => (int)$totalCount,
                'pagination' => [
                    'pageSize' => 9,
                ]
            ]);

            $models = $dataProvider->getModels();

            return $this->render('search', [
                'q' => $q,
                'count' => $totalCount,
                'dataProvider' => $dataProvider,
                'models' => $models,
            ]);
		}
	}