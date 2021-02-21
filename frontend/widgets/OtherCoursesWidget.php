<?php
    namespace frontend\widgets;
	
    use Yii;
    use yii\base\Widget;
    use common\components\HelperComponent;
	
    class OtherCoursesWidget extends Widget {
        public function init() {
            parent::init();
        }
		
        public function run() {
            $financeQualifications = HelperComponent::getCourses(1);
            $financeQualificationTitle = HelperComponent::getCourseCategoryName(1);
			
			$businessTraining = HelperComponent::getCourses(4);
			$businessTrainingTitle = HelperComponent::getCourseCategoryName(4);
			
			$computerLiteracySkills = HelperComponent::getCourses(7);
			$computerLiteracySkillsTitle = HelperComponent::getCourseCategoryName(7);
			
			$underPostGraduate = HelperComponent::getCourses(10);
			$underPostGraduateTitle = HelperComponent::getCourseCategoryName(10);
			
			$languagesQualification = HelperComponent::getCourses(13);
			$languagesQualificationTitle = HelperComponent::getCourseCategoryName(13);
            
			return $this->render('other-courses', [
                'financeQualifications' => $financeQualifications,
                'financeQualificationTitle' => $financeQualificationTitle,
                
				'businessTraining' => $businessTraining,
				'businessTrainingTitle' => $businessTrainingTitle,
                
				'computerLiteracySkills' => $computerLiteracySkills,
				'computerLiteracySkillsTitle' => $computerLiteracySkillsTitle,
				
				'underPostGraduate' => $underPostGraduate,
				'underPostGraduateTitle' => $underPostGraduateTitle,
                
				'languagesQualification' => $languagesQualification,
				'languagesQualificationTitle' => $languagesQualificationTitle,
            ]);
        }
    }