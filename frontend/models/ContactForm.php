<?php
	namespace frontend\models;
	
	use Yii;
	use yii\base\Model;
	
	class ContactForm extends Model {
		public $name;
		public $email;
		public $body;
		public $verifyCode;
		
		public function rules() {
			return [
				[['name', 'email', 'body'], 'required'],
				['email', 'email'],
				['verifyCode', 'captcha'],
			];
		}
		
		public function attributeLabels() {
			return [
				'name' => Yii::t('common', 'Ad, Soyad'),
				'email' => Yii::t('common', 'E-mail'),
				'body' => Yii::t('common', 'Mesaj mətni'),
				'verifyCode' => Yii::t('common', 'Təsdiqləmə kodu'),
			];
		}
		
		public function sendEmail($email) {
			return Yii::$app->mailer->compose()
				->setTo($email)
				->setFrom([$this->email => $this->name])
				->setSubject('BARATTSON - Əlaqə')
				->setTextBody($this->body)
				->send();
		}
	}