<?php

class Place extends CActiveRecord
{
    public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'placement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, name, surname, date, reg_course, reg_course_type, reg_class_type, reg_pre_start_date, reg_pre_week_day, reg_pre_hours, phone, email, status, imgpath, gepl_date, fmpl_date, iltpl_date', 'required'),
			array('gepl, fmpl, iltpl', 'required', 'message'=>'Please choose one of the courses'),
			array('gepl, fmpl, iltpl, status, amount', 'numerical', 'integerOnly'=>true),
			array('name, reg_course, reg_course_type, reg_class_type, reg_pre_start_date, reg_pre_week_day, reg_pre_hours, phone, email', 'length', 'max'=>255),
			//array('company', 'length', 'max'=>512),
			array('reference', 'length', 'max'=>20),
			array('surname', 'length', 'max'=>30),
			array('pdf_invoice, pdf_view', 'length', 'max'=>50),
			array('imgpath, created', 'length', 'max'=>1024),
			array('image', 'file', 'types'=>'jpg, gif, png, jpeg, JPG, GIF, PNG, JPEG', 'allowEmpty'=>true),
			array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, date, reg_course, reg_course_type, reg_class_type, reg_pre_start_date, reg_pre_week_day, reg_pre_hours, phone, email, imgpath, gepl, fmpl, iltpl, status, gepl_date, fmpl_date, iltpl_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID number',
			'name' => 'Name',
			'surname' => 'Surname',
			'date' => 'Date of Birth',
			'created' => 'Registration Date',
			
			'reg_course' => 'Course',
			'reg_course_type' => 'Course type',
			'reg_class_type' => 'Class type',
			'reg_pre_start_date' => 'Prefered start date',
			'reg_pre_week_day' => 'Prefered week days',
			'reg_pre_hours' => 'Prefered hours',
			
			'reference' => 'Reference ID',
			'phone' => 'Phone number',
			'company' => 'Company',
			'email' => 'E-mail',
			'imgpath' => 'Personal ID image',
			'image' => 'Personal ID image',
			'gepl' => 'General English - Placement Test',
			'fmpl' => 'IELTS - Free Mock Exam',
			'iltpl' => 'IELTS- Placement test',
			'status' => 'Status',
			'gepl_date' => 'General English Date',
			'fmpl_date' => 'IELTS - Free Mock Exam Date',
			'iltpl_date' => 'IELTS Date',
			'amount'=>'Amount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('reg_num',$this->reg_num,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('imgpath',$this->imgpath,true);
		$criteria->compare('gepl',$this->gepl);
		$criteria->compare('fmpl',$this->fmpl);
		$criteria->compare('iltpl',$this->iltpl);
		$criteria->compare('status',$this->status);
		$criteria->compare('gepl_date',$this->gepl_date,true);
		$criteria->compare('fmpl_date',$this->fmpl_date,true);
		$criteria->compare('iltpl_date',$this->iltpl_date,true);

		
		$criteria->order = 'id DESC';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
