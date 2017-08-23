<?php
/**
 * Created by PhpStorm.
 * User: 百鬼夜行
 * Date: 2017/8/23
 * Time: 15:38
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    public function show(){
        return 'show-baby';
    }
    public static function show2(){
        return 'hoho';
    }
}