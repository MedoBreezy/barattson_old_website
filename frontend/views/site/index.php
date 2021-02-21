<?php
	use frontend\widgets\CoursesWidget;
    use frontend\widgets\OtherCoursesWidget;
    use frontend\widgets\EventsWidget;
    use frontend\widgets\FactsWidget;
    use frontend\widgets\TeachersWidget;
    use frontend\widgets\BannersWidget;
	use common\components\HelperComponent;
	
	HelperComponent::registerSeo(Yii::t('common', Yii::$app->name), Yii::t('common', Yii::$app->name), 'Trainings in Baku, Exams in Baku, ACCA, CIMA, DipIFR, CFA, SAT, GMAT, GRE, TOEFL, General English, Business English, Advanced Excel, Microsoft, HR, Business English, IELTS Trial Exam, Computer Based IELTS, Paper Based IELTS, CBE, FA Mock, SAT Mock, Financial Accounting');
?>

<?= CoursesWidget::widget() ?>
<?= EventsWidget::widget() ?>
<?= OtherCoursesWidget::widget() ?>
<?= FactsWidget::widget() ?>
<?= TeachersWidget::widget() ?>
<?= BannersWidget::widget() ?>