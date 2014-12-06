<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 14-9-23
 * Time: 下午7:21
 */

class ShowController extends Controller {

    function actionList(){
        $keys = array(
            'name',
            'time',
            'place',
            'rate',
            'picture',
        );
        $d = array();
        $data = Logic::getShowData();
        foreach($data as $id => $one){
            foreach($keys as $key){
                $o[$key] = $one[$key];
            }
            $o['id'] = $id;
            $d[] = $o;
        }
        echo Logic::result(0, $d);
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