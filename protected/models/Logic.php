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
        );
        $d = array('status'=>$status, 'msg'=>$msgs[$status]);
        if($data){
            $d['data'] = $data;
        }
        return json_encode($d);
    }

    static function getShowData(){
        $data[1] = array(
            'name'=>'汪峰2014',
            'time'=>'2014.8.2',
            'place'=>'国家体育场',
            'rate'=>'8.5',
            'picture'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'rate_men' => '10',
            'type' => '音乐会',
            'price'=>'100 - 2000',
            'background'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'guide_url'=>'',
            'buy_url'=>'',
        );
        $data[2] = array(
            'name'=>'汪峰2015',
            'time'=>'2015.8.3-2015.9.5',
            'place'=>'国家体育场',
            'rate'=>'7.5',
            'picture'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'rate_men' => '10',
            'type' => '演唱会',
            'price'=>'200 - 1000',
            'background'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'guide_url'=>'',
            'buy_url'=>'',
        );
        return $data;
    }

    static function getStarData(){
        $data[1] = array(
            'id' => 1,
            'name' => '汪峰',
            'portrait' => 'http://yyb.caoxw.com/images/cover1.jpg',
            'pic' => array('http://yyb.caoxw.com/images/cover1.jpg','http://yyb.caoxw.com/images/cover1.jpg'),
        );
        $data[2] = array(
            'id' => 2,
            'name' => '邓紫棋',
            'portrait' => 'http://yyb.caoxw.com/images/cover1.jpg',
            'pic' => array('http://yyb.caoxw.com/images/cover1.jpg','http://yyb.caoxw.com/images/cover1.jpg','http://yyb.caoxw.com/images/cover1.jpg'),
        );
        return $data;
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
} 