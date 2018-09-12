<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestPagesController extends Controller
{
    //测试数据
    public function index(){
        return 'hello_test';
    }

    //引用测试&闭包测试
    public function yinyong(){
        // echo json_encode(['a'=>1]+['b'=>2,'a'=>3,'b']);
        $param=1;
        $funcA=function ($val) use (&$param){
            $param++;
            return $param+$val;
        };
        
        $funcB=function () use ($param){
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
    }
    // 测试数据 array_multisort 多维数组排序 
    public function sort(){
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
        //取出指定数组 第二个参数 开始下标，第三个参数输出数量。
        $data=array_slice($arr,1,2);
        dump($data);
        //打印前一天时间格式 2018-10-01 10:20:22
        $time=date('Y-m-d H:m:s',strtotime('-1 day',time()));
        dump($time);
        //字符串长度
        $str='aff123dfe,';
        $len=strlen($str);
        dump('字符串长度为'.$len);
        //截取最后一位
        $news_str=substr($str,0,$len-1);
        dump($news_str);
        //去字符串多余的','; '1,,,,2,,,,4,,3,,5,89';
        $strts=strtr('1,,,,2,,,,4,,3,,5,89',',,',',');
        dump($strts);
    }
}
