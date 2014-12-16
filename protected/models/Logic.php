<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 14-9-23
 * Time: 下午9:30
 */

class Logic {

    static function result($status, $data=null){
        $msgs = array(
            0 => 'ok',
            1 => 'not found',
            2 => 'bad value',
            3 => 'db error',
        );
        $d = array('status'=>$status, 'msg'=>$msgs[$status]);
        if($data){
            $d['data'] = $data;
        }
        return json_encode($d);
    }

    static function get_dict($model, $key, $value, $hasNull=false){
        $m = ucfirst($model);
        $models = $m::model()->findAll();
        $arr = CHtml::listData($models, $key, $value);
        if ($hasNull) {
            $arr['0'] = '管理';
        }
        return $arr;
    }

    static function getPicture($model, $attr){
        $file = CUploadedFile::getInstance($model, $attr);
        if($file){
            $i = pathinfo($file->name);
            $filename = $i['filename'].'_'.rand(100, 999).$i['extension'];
            $file_path = Yii::getPathOfAlias('webroot.images.upload').'/'.$filename;
            $file->saveAs($file_path);
            $model->$attr = 'http://'.Yii::app()->params['host'].'/images/upload/'.$filename;
        }
        return $model;
    }
} 