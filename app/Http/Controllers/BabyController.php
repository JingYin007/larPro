<?php
/**
 * Created by PhpStorm.
 * User: 百鬼夜行
 * Date: 2017/8/23
 * Time: 12:17
 */

namespace App\Http\Controllers;


use App\Baby;
use Illuminate\Support\Facades\DB;

class BabyController extends Controller
{
    public function index(){
        echo 'baby-index';
        die;
    }
    public function info(){
        $baby = new Baby();
        $show =  $baby->show();
        $data = [
            'name' => 'longyang沸'.$show,
            'age' => 19,
            'arr' => [
                'who' => 'coke'.Baby::show2(),
            ]
        ];

        return view('baby/info',$data);
    }

    /**
     * @return string
     */
    public function test()
    {
        $babys = DB::select('select * from lar_baby');
        dd($babys);

        /*$tag = DB::insert('insert into lar_baby(name,age) VALUE (?,?)',
            ['Feaa',3]);*/
    }

    /**
     * 使用查询构造器 操作数据
     */
    public function test2(){
        /*$tag = DB::table('baby')
            ->insertGetId(
                ['name' => 'Toto', 'age' => 12]
            );
        var_dump($tag);*/

        /*$tag2 = DB::table('baby')
            ->where('id',3)
            ->update(['age'=>22]);*/
        //自增自减数据更新

        /*$tag3 = DB::table('baby')
            ->increment('age',1);
        $tag4 = DB::table('baby')
            ->where('id',7)
            ->decrement('age',1,['name'=>'赵云']);*/

        //删除数据 delete trace
        /*DB::table('baby')
            ->where('id',4)
            ->delete();
        DB::table('baby')
            ->where('id','<=',4)
            ->delete();
        //数据表清空 轻易不要使用
        DB::table('baby')
            ->truncate();*/

        //pluck
        /*$names = DB::table('baby')
            ->pluck('name');*/

        //lists
        /*$names = DB::table('baby')
            ->lists('name','id');*/

        /*$babys = DB::table('baby')
            ->select('id','name','age')
            ->get();*/


       /* DB::table('baby')
            ->chunk(2,function ($babys){
                var_dump($babys);
                $stop = false;
                if($stop){
                    return false;
                }
            });*/


        //聚合函数
        $num = DB::table('baby')
            ->count();
        $min = DB::table('baby')
            ->max('age');
        $max = DB::table('baby')
            ->min('age');
        $avg = DB::table('baby')
            ->avg('age');
        $sum = DB::table('baby')
            ->sum('age');

        var_dump($sum);










    }













}