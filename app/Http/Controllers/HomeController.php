<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Mail\Mailer as Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->withArticles(\App\Article::all());

    }
    //上传文件 功能实现方法
    public function upload(Request $request){
        if ($request->isMethod('POST')){
            $file = $request->file('source');
            //判断文件是否上传成功
            if ($file->isValid()){
                //原文件名
                $originalName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                //MimeType
                $type = $file->getClientMimeType();
                //临时绝对路径
                $realPath = $file->getRealPath();
                $filename = uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                //判断是否上传成功
                if($bool){
                    echo 'success';
                }else{
                    echo 'fail';
                }
            }
        }
        return view('upload');
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
}
