<?php

/**
 * This is the model class for table "shows".
 *
 * The followings are the available columns in table 'shows':
 * @property integer $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $place
 * @property integer $rate
 * @property string $picture
 * @property integer $rate_men
 * @property integer $type
 * @property string $price
 * @property string $background
 * @property string $guide_url
 * @property string $buy_url
 * @property string $ctime
 */
class Shows extends CActiveRecord
{
	public $title = '节目';
    public $stars = '';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shows';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rate, rate_men, type', 'numerical', 'integerOnly'=>true),
			array('name, place, price', 'length', 'max'=>100),
			array('picture, background, guide_url, buy_url', 'length', 'max'=>255),
			array('start_date, end_date, stars', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, start_date, end_date, place, rate, picture, rate_men, type, price, background, guide_url, buy_url, ctime', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => '名字',
			'start_date' => '开始时间',
			'end_date' => '结束时间',
			'place' => '地点',
			'rate' => '评价',
			'picture' => '配图',
			'rate_men' => '评价人数',
			'type' => '类型',
			'price' => '票价',
			'background' => '背景图',
			'guide_url' => '引导页',
			'buy_url' => '购买页',
			'ctime' => '创建时间',
            'stars'=>'明星',
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
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('place',$this->place,true);
		$criteria->compare('rate',$this->rate);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('rate_men',$this->rate_men);
		$criteria->compare('type',$this->type);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('guide_url',$this->guide_url,true);
		$criteria->compare('buy_url',$this->buy_url,true);
		$criteria->compare('ctime',$this->ctime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Shows the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function afterFind(){
        $this->stars = array();
        $data = ShowStar::model()->findAllByAttributes(array('show_id'=>$this->id));
        foreach($data as $one){
            $this->stars[] = $one->star_id;
        }
    }

    public function afterSave(){
        ShowStar::model()->deleteAllByAttributes(array('show_id'=>$this->id));
        foreach ($this->stars as $id) {
            $s = new ShowStar();
            $s->show_id = $this->id;
            $s->star_id = $id;
            $s->save();
        }
    }
}
