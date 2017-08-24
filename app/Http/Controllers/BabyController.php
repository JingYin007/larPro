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

    public function orm1(){
        $res = Baby::all();

        $res = Baby::find(5);

        //$res = Baby::findOrFail(145);
        $res = Baby::get();
        $res = Baby::where('id','>','5')
            ->orderBy('age','desc')
            ->first();
        echo '<pre>';
        /* $res = Baby::chunk(2,function ($r){
             var_dump($r);
         });*/

        //聚合函数
        $res = Baby::count();

        $res = Baby::where('id','>','5')
            ->min('age');
        dd($res);
    }

    public function orm2(){
        //使用模型新增数据
        /*$baby = new Baby();
        $baby['name'] = 'TDegs';
        $baby['age'] = '12';
        $res = $baby->save();*/

        /*$baby = Baby::find(10);
        $created_at = $baby->created_at;
        $res = date('Y-m-d H:i:s',$created_at);*/

        //使用模型的Create方法新增数据
        /*$baby = Baby::create([
            'name' => '太乙真人',
            'age' => 122,
        ]);*/

        //firstOrCreate()
        /*$res = Baby::firstOrCreate(
            ['name' => '太乙真人2']
        );*/

        $res = Baby::firstOrNew(
            ['name' => '太乙真人33']
        );
        $res->save();
        var_dump($res);
        $res = Baby::all();
        dd($res);
    }
    //使用ORM 修改数据
    public function orm3(){
        //通过模型更新数据
        $baby = Baby::find(5);
        $baby->name = 'Kitty';
        $res = $baby->save();

        Baby::where('id','<','8')->update(
            ['age' => 55]
        );
        $res = Baby::all();
        dd($res);
    }










}