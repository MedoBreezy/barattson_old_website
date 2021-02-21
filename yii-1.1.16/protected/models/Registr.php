<?php

/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $reg_num
 * @property string $phone
 * @property string $company
 * @property string $email
 * @property string $imgpath
 * @property integer $fab
 * @property integer $fma
 * @property integer $ffa
 * @property integer $glo
 * @property integer $eng
 * @property integer $fa_one
 * @property integer $ma_one
 * @property integer $fa_two
 * @property integer $ma_two
 * @property integer $status
 * @property string $fab_date
 * @property string $fma_date
 * @property string $ffa_date
 * @property string $glo_date
 * @property string $eng_date
 * @property string $fa_one_date
 * @property string $ma_one_date
 * @property string $fa_two_date
 * @property string $ma_two_date
 */
class Registr extends CActiveRecord
{
    public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, name, surname, date, reg_num, phone, email, status, imgpath, fab_date, fma_date, ffa_date, glo_date, eng_date, fa_one_date, ma_one_date, fa_two_date, ma_two_date', 'required'),
			array('fab, fma, ffa, glo, eng, fa_one, ma_one, fa_two, ma_two', 'required', 'message'=>'Please choose one of the courses'),
			array('fab, fma, ffa, glo, eng, fa_one, ma_one, fa_two, ma_two, status, amount', 'numerical', 'integerOnly'=>true),
			array('name, reg_num, phone, email', 'length', 'max'=>255),
			array('company', 'length', 'max'=>512),
			array('reference', 'length', 'max'=>20),
			array('surname', 'length', 'max'=>30),
			array('pdf_invoice, pdf_view', 'length', 'max'=>50),
			array('imgpath, created', 'length', 'max'=>1024),
			array('image', 'file', 'types'=>'jpg, gif, png, jpeg, JPG, GIF, PNG, JPEG', 'allowEmpty'=>true),
			array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, date, reg_num, phone, company, email, imgpath, fab, fma, ffa, glo, eng, fa_one, ma_one, fa_two, ma_two, status, fab_date, fma_date, ffa_date, glo_date, eng_date, fa_one_date, ma_one_date, fa_two_date, ma_two_date', 'safe', 'on'=>'search'),
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
			'reg_num' => 'Reg num',
			'reference' => 'Reference ID',
			'phone' => 'Phone number',
			'company' => 'Company',
			'email' => 'E-mail',
			'imgpath' => 'Personal ID image',
			'image' => 'Personal ID image',
			'fab' => 'F1/FAB Accountant in Business',
			'fma' => 'F2/FMA Management Accounting',
			'ffa' => 'F3/FFA Financial Accounting',
			'glo' => 'F4 Corporate and Business Law (Glo)',
			'eng' => 'F4 Corporate and Business Law (Eng)',
			'fa_one' => 'FA1 Introductory',
			'ma_one' => 'MA1 Introductory',
			'fa_two' => 'FA2 Intermediate',
			'ma_two' => 'MA2 Intermediate',
			'status' => 'Status',
			'fab_date' => 'Fab Date',
			'fma_date' => 'Fma Date',
			'ffa_date' => 'Ffa Date',
			'glo_date' => 'Glo Date',
			'eng_date' => 'Eng Date',
			'fa_one_date' => 'Fa One Date',
			'ma_one_date' => 'Ma One Date',
			'fa_two_date' => 'Fa Two Date',
			'ma_two_date' => 'Ma Two Date',
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
		$criteria->compare('fab',$this->fab);
		$criteria->compare('fma',$this->fma);
		$criteria->compare('ffa',$this->ffa);
		$criteria->compare('glo',$this->glo);
		$criteria->compare('eng',$this->eng);
		$criteria->compare('fa_one',$this->fa_one);
		$criteria->compare('ma_one',$this->ma_one);
		$criteria->compare('fa_two',$this->fa_two);
		$criteria->compare('ma_two',$this->ma_two);
		$criteria->compare('status',$this->status);
		$criteria->compare('fab_date',$this->fab_date,true);
		$criteria->compare('fma_date',$this->fma_date,true);
		$criteria->compare('ffa_date',$this->ffa_date,true);
		$criteria->compare('glo_date',$this->glo_date,true);
		$criteria->compare('eng_date',$this->eng_date,true);
		$criteria->compare('fa_one_date',$this->fa_one_date,true);
		$criteria->compare('ma_one_date',$this->ma_one_date,true);
		$criteria->compare('fa_two_date',$this->fa_two_date,true);
		$criteria->compare('ma_two_date',$this->ma_two_date,true);

		
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
