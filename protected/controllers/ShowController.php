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
        $data = Shows::model()->findAll();
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
        $data = Logic::getShowData();
        if(isset($data[$id])){
            $one = $data[$id];
            $one['id'] = $id;
            echo Logic::result(0, $one);
        }else{
            echo Logic::result(1);
        }
    }

    function actionProgram($id){
        $data = array('http://yyb.caoxw.com/images/cover1.jpg', 'http://yyb.caoxw.com/images/cover1.jpg');
        echo Logic::result(0, $data);
    }

    function actionGallery($id){
        $this->actionProgram($id);
    }

    function actionStar($id){
        $d = array();
        $data = Logic::getStarData();
        foreach($data as $k => $v){
            unset($v['pic']);
            $d[] = $v;
        }
        echo Logic::result(0, $d);
    }

    function actionStarInfo($id){
        $data = Logic::getStarData();
        echo Logic::result(0, $data[$id]);
    }

    function actionRate($id, $value, $words){
        echo Logic::result(0);
    }

    function actionGetRates($id){
        $list[] = array(
            'id'=>123,
            'avatar'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'name'=>'过路的猫',
            'rate'=>5,
            'time'=>'2014-06-07 12:34',
            'words'=>'太棒了',
        );
        $list[] = array(
            'id'=>125,
            'avatar'=>'http://yyb.caoxw.com/images/cover1.jpg',
            'name'=>'蓝皮狗',
            'rate'=>3,
            'time'=>'2014-03-19 19:14',
            'words'=>'一般般',
        );
        $data = array('total'=>2, 'list'=>$list);
        echo Logic::result(0, $data);
    }
}