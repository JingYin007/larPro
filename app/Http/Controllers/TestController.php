<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
//use Illuminate\Mail\Mailer as Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * 发送邮件
     */
    public function mail(){
        //$tag = $this->sendText();
        //$tag = $this->sendHtml();
        //TODO  $tag 判断发送是否成功，进行后续代码开发
        //return view('mail',['title' => '你若盛开，清风自来','author' => '木心']);
    }

    /**
     * 发送纯文本 邮件
     */
    public function sendText(){
        $tag = $this->mailer->raw('从前的日色变得慢 车 马 邮件 都慢',function ($message){
            //$message->from('15117972683@163.com','逗比2号');
            $message->subject('这是邮件主题，希望您能支持');
            $message->to('930959695@qq.com');
        });
        return $tag;
    }
    /**
     * 发送自定义网页
     */
    public function sendHtml(){
        $data = ['title' => '你若盛开，清风自来','author' => '木心'];
        $tag = $this->mailer->send('mail',$data,function ($message){
            $message->subject('Hello My Dear,let`s go');
            $message->to('930959695@qq.com');
        });
        return $tag;
    }

    public function cache1(){
        Cache::store('baby')->put('key1',['m'=>'FFFF','n'=>'YYYY'],1);
    }
    public function cache2(){
        $res = Cache::store('baby')->get('key1');
        var_dump($res);
    }






    public function queue(){
        $this->dispatch(new SendEmail('930959695@qq.com'));
    }




}
