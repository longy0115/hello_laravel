<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    //
    public function home(){
        // echo json_encode(['a'=>1]+['b'=>2,'a'=>3,'b']);
        $param=1;
        $funcA=function ($val) use (&$param){
            $param++;
            return $param+$val;
        };
        
        $funcB=function () use (&$param){
            $param++;
            return $param;
        };
        echo $funcA(2);
        echo '<br>';
        echo $param.'_fffff';
        echo '<br>';
        echo $funcB();
        echo '<br>';
        echo $param;
    	//return view('static_pages/home');
    }

    public function help(){
    	return view('static_pages/help');
    }

    public function about(){
    	return view('static_pages/about');
    }

    // 测试数据 array_multisort 多维数组排序 
    public function test(){
        $arr=[];
        $arr[0]=['name'=>'xiaowang','chinese'=>89,'englist'=>90];
        $arr[1]=['name'=>'zhangsan','chinese'=>79,'englist'=>88];
        $arr[2]=['name'=>'lisi','chinese'=>80,'englist'=>92];
        $arr[3]=['name'=>'liuxiaojie','chinese'=>83,'englist'=>89];
        $arr[4]=['name'=>'aliya','chinese'=>83,'englist'=>89];
        // $score=[];
        // $name=[];
        foreach($arr as $key=>$val){
            if($val['chinese']>=80 && $val['englist']>=80){
                $score[$key]=$val['chinese'] + $val['englist'];
                $name[$key]=$val['name'];
            }else{
                unset($arr[$key]);
            }
        }
        // 首先按照分数总和进行排序，如果分数总和相同，则按照名称进行排序
        array_multisort($score,SORT_NUMERIC,SORT_DESC,$name,SORT_STRING,SORT_ASC,$arr);
        dump($arr);
    }
}