<?php
    namespace common\components;
	
	use Yii;
	use backend\models\Courses;
	use backend\models\CoursesCategory;
	
    class HelperComponent
    {
        const staticMainPage = 'main_page';
        const staticAbout = 'about';
        const staticQualityGuarantee = 'quality_guarantee';
        const staticSocialResponsibility = 'social_responsibility';
        const staticContacts = 'contacts';

        const itemsStatusEnabled = 1;
        const itemsStatusDisabled = 0;

        const newsAdsTypeNews = 1;
        const newsAdsTypeAds = 2;
        const newsAdsTypeNewsAds = 3;

        const menuBlankSelf = 1;
        const menuBlankTarget = 2;
		
		public static function getCourses($categoryID)
		{
			return Courses::find()
                ->where(['lang' => Yii::$app->language, 'status' => self::itemsStatusEnabled, 'category' => $categoryID])
                ->andWhere(['not', ['image' => '']])
                ->orderBy(['date_start' => SORT_DESC])
                ->limit(3)
                ->all();
		}
		
		public static function getCourseCategoryName($categoryID)
		{
			$query = CoursesCategory::find()
				->where(['lang' => Yii::$app->language, 'r_id' => $categoryID])
				->one();
			
			return $query->title;
		}
		
		public static function getUrl($slug)
		{
			$strings = [
				'`' => '',
				'~' => '',
				'@' => '',
				'#' => '',
				'$' => '',
				'%' => '',
				'^' => '',
				'&' => '',
				'*' => '',
				'(' => '',
				')' => '',
				'-' => '',
				'_' => '',
				'+' => '',
				'=' => '',
				'|' => '',
				'<' => '',
				'>' => '',
				'[' => '',
				'{' => '',
				']' => '',
				'}' => '',
				'/' => '',
				'"' => '',
				'!' => '',
				'?' => '',
				'.' => '',
				',' => '',
				':' => '',
				'…' => '',
				' ' => '-',
				'\'' => '',
				'Ç' => 'C',
				'ç' => 'c',
				'Ə' => 'E',
				'ə' => 'e',
				'Ğ' => 'G',
				'ğ' => 'g',
				'ı' => 'i',
				'İ' => 'i',
				'Ö' => 'O',
				'ö' => 'o',
				'Ş' => 'S',
				'ş' => 's',
				'Ü' => 'U',
				'ü' => 'u'
			];
			
			foreach ($strings as $key => $value) {
				$newSlug = str_replace($key, $value, $slug);
				$slug = $newSlug;
			}
			
			return strtolower($slug);
		}
		
		public function registerSeo($title, $description, $keywords)
		{
			$this->title = $title;
			$this->registerMetaTag(['name' => 'description', 'content' => $description]);
			$this->registerMetaTag(['name' => 'keywords', 'content' => $keywords]);
		}
    }