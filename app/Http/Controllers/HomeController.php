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
                $filename = date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                var_dump($bool);
            }
        }
        return view('upload');
    }

    public function mail(){
        //发送纯文本
       /* $this->mailer->raw('邮件内容',function ($message){
            //$message->from('15117972683@163.com','逗比2号');
            $message->subject('这是邮件主题，希望您能支持');
            $message->to('930959695@qq.com');
        });*/
        //发送自定义网页
        $this->mailer->send('mail',['name' => '你若盛开，清风自来'],function ($message){
            $message->subject('Hello My Dear');
            $message->to('930959695@qq.com');
        });
    }
}
