<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 14-9-23
 * Time: 下午7:21
 */

class ShowController extends Controller {

    function actionList(){
        $r = array();
        $criteria = new CDbCriteria();
        $criteria->order = 'start_date';
        $data = Shows::model()->findAll($criteria);
        foreach($data as $one){
            $s = array();
            $s['id'] = $one->id;
            $s['name'] = $one->name;
            if($one->start_date == $one->end_date){
                $s['time'] = $one->start_date;
            }else{
                $s['time'] = $one->start_date.'至'.$one->end_date;
            }
            $s['place'] = $one->place;
            $s['rate'] = $one->rate;
            $s['picture'] = $one->picture;
            $r[] = $s;
        }
        echo Logic::result(0, $r);
    }

    function actionSearch($words){
        $this->actionList();
    }

    function actionInfo($id){
        $data = Shows::model()->findByPk($id);
        if($data){
            $d = $data->attributes;
            if($data->start_date == $data->end_date){
                $d['time'] = $data->start_date;
            }else{
                $d['time'] = $data->start_date.'至'.$data->end_date;
            }
            $t = ShowType::model()->findByPk($data->type);
            $d['type'] = $t->name;

            echo Logic::result(0, $d);
        }else{
            echo Logic::result(1);
        }
    }

    function actionProgram($id){
        $r = array();
        $data = Picture::model()->findAllByAttributes(array('type'=>2, 'owner_id'=>$id));
        foreach ($data as $one) {
            $r[] = $one->url;
        }
        echo Logic::result(0, $r);
    }

    function actionGallery($id){
        $r = array();
        $data = Picture::model()->findAllByAttributes(array('type'=>3, 'owner_id'=>$id));
        foreach ($data as $one) {
            $r[] = $one->url;
        }
        echo Logic::result(0, $r);
    }

    function actionStar($id){
        $d = array();
        $star_id = ShowStar::model()->findAllByAttributes(array('show_id'=>$id));
        foreach ($star_id as $one) {
            $info = Star::model()->findByPk($one->star_id);
            $m = $info->attributes;
            unset($m['ctime']);
            $d[] = $m;
        }
        echo Logic::result(0, $d);
    }

    function actionStarInfo($id){
        $info = Star::model()->findByPk($id);
        if (!$info) {
            echo Logic::result(1);
            return;
        }
        $d = $info->attributes;
        unset($d['ctime']);
        $d['pic'] = array();
        $pic = Picture::model()->findAllByAttributes(array('type'=>1, 'owner_id'=>$id));
        foreach ($pic as $one) {
            $d['pic'][] = $one->url;
        }
        echo Logic::result(0, $d);
    }

    function actionRate($id, $value, $words){
        if($value < 0 || $value > 5){
            echo Logic::result(2);
            return;
        }
        $r = new Rate();
        $r->show_id = $id;
        $r->value = $value;
        $r->words = $words;
        $s = $r->save();
        if (!$s) {
            echo Logic::result(3);
        }else{
            echo Logic::result(0);
        }
    }

    function actionGetRates($id){
        $r = array();
        $criteria = new CDbCriteria();
        $criteria->order = 'ctime desc';
        $data = Rate::model()->findAllByAttributes(array('show_id'=>$id));
        $all = Rate::model()->countByAttributes(array('show_id'=>$id));
        foreach ($data as $one) {
            $r[] = array(
                'id'=>$one->id,
                'avatar'=>'http://yyb.caoxw.com/images/cover1.jpg',
                'name'=>'游客',
                'rate'=>$one->value,
                'time'=>$one->ctime,
                'words'=>$one->words,
            );
        }
        $data = array('total'=>$all, 'list'=>$r);
        echo Logic::result(0, $data);
    }
}