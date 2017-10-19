<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Session;
use App\Model\Home\Lunbo;
use App\Model\Home\Msg;
use App\model\home\User;
use Illuminate\Http\Request;
use App\model\home\Field;
use App\Http\lib\Ucpaas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class indexController extends Controller
{
    //

    public function index($field_id=0){
        $search='';
        if(!empty($_GET['f'])){
            $search = $_GET['f'];
        }
        $lunbo_pics=Lunbo::take(5)->orderBy('pic_order','desc')->get();

        //所有的频道
        $res=Field::all();
        //热门应该在最近一周内热门,受限于数据暂定为1506268800,实际改为time()-7*24*3600
        if($field_id==0){
            $messages=Msg::where('time','>',1506268800)->where('msg_title','like','%'.$search.'%')->orderBy('reply_count','desc')->take(10)->get();
        }else{
            $messages=Msg::where('msg_field','=',$field_id)->where('msg_title','like','%'.$search.'%')->orderBy('time','desc')->take(10)->get();
        }
        //获取的message条数
        $arrlen=count($messages,0);

        return view('home.index',['lunbo_pic'=>$lunbo_pics,'res'=>$res,'field_id'=>$field_id,'messages'=>$messages,'search'=>$search,'len'=>$arrlen]);
    }
    //首页获取更多条数
    public function moretips(Request $request)
    {

       $n=$request->input('n');
       $field_id=$request->input('id');
       $search=$request->input('f');
        if($field_id==0){
            $messages=Msg::where('time','>',1506268800)->where('msg_title','like','%'.$search.'%')->orderBy('reply_count','desc')->skip($n*10)->take(10)->get();
        }else{
            $messages=Msg::where('msg_field',$field_id)->where('msg_title','like','%'.$search.'%')->orderBy('time','desc')->skip($n*10)->take(10)->get();
        }
        $arrlen=count($messages,0);
        return view('home.more',['messages'=>$messages,'len'=>$arrlen]);
    }
    //登录后的页面
    function loginafter()
    {

        // echo $data['user_name'];
        return view('home.index.loginafter');
    }
//注册页面
    function register()
    {
        return view('home.register.register');
    }

    function donumber()
    {
        //查此号码是否注册过用户
        $data = User::all();


        foreach ($data as $key => $value) {

            if($_GET['number'] == $value->user_phone)
            {
                return 1;
            }
        }
        return 0;
    }

    function doreg()
    {


        //初始化必填
        $options['accountsid']='9f99fde67d098e29bf4621c5874bd8d6';
        $options['token']='2bf7d63049afd6445afda70849d7787c';


//初始化 $options必填
        $ucpass = new Ucpaas($options);


//开发者账号信息查询默认为json或xml

        $ucpass->getDevinfo('xml');

//申请client账号
//$appId = "xxxx";
//$clientType = "0";
//$charge = "0";
//$friendlyName = '';
//$mobile = "18612345678";

//echo $ucpass->applyClient($appId, $clientType, $charge, $friendlyName, $mobile);

//删除client账号
//$appId = "xxxx";
//$clientNumber='xxxxx';

//echo $ucpass->releaseClient($clientNumber,$appId);

//删除client账号
//$appId = "xxxx";
//$start = "0";
//$limit = "100";
//
//echo $ucpass->getClientList($appId,$start,$limit);

//以Client账号方式查询Client信息
//$appId = "xxxx";
//$clientNumber='xxxx';
//
//echo $ucpass->getClientInfo($appId,$clientNumber);

//以手机号码方式查询Client信息
//$appId = "xxxx";
//$mobile = "18612345678";

//echo $ucpass->getClientInfoByMobile($appId,$mobile);

//应用话单下载,通过HTTPS POST方式提交请求，云之讯融合通讯开放平台收到请求后，返回应用话单下载地址及文件下载检验码。
//day 代表前一天的数据（从00:00 – 23:59）；week代表前一周的数据(周一 到周日)；month表示上一个月的数据（上个月表示当前月减1，如果今天是4月10号，则查询结果是3月份的数据）
//$appId = "xxxx";
//$date = "day";

//echo $ucpass->getBillList($appId,$date);

//Client充值,通过HTTPS POST方式提交充值请求，云之讯融合通讯开放平台收到请求后，返回Client充值结果。
//$appId = "xxxx";
//$clientNumber='xxxx';
//$clientType = "0";
//$charge = "0";

//echo $ucpass->chargeClient($appId,$clientNumber,$clientType,$charge);

//双向回拨,云之讯融合通讯开放平台收到请求后，将向两个电话终端发起呼叫，双方接通电话后进行通话。
//$appId = "xxxx";
//$fromClient = "xxxx";
//$to = "18612345678";
//$fromSerNum = '';
//$toSerNum = '';

//echo $ucpass->callBack($appId,$fromClient,$to);

//语音验证码,云之讯融合通讯开放平台收到请求后，向对象电话终端发起呼叫，接通电话后将播放指定语音验证码序列
//$appId = "xxxx";
//$verifyCode = "1256";
//$to = "18612345678";

//echo $ucpass->voiceCode($appId,$verifyCode,$to);

//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $code = rand(111111,999999);
        session(['code'=>$code]);
//获取用户输入的手机号
        $toNumber = $_POST['number'];
        session(['phone'=>$toNumber]);

// $passwd = Hash::make($_POST['passwd']);
//把随机出的验证码保存在session中

// $appId = "80ed6c7179f246eca0dac08b3251159f";
//上线
        $appId = 'dbaed8e168b447128ee6496061a2b95b';
// $to = "13911373063";
//使用的模板id
// $templateId = "173866";
        $templateId = "174210";

        $data = ['number'=>$toNumber,'code'=>$code];
        $res = json_encode($data);
//短信发送的验证码
        $param=$code;

        $status = $ucpass->templateSMS($appId,$toNumber,$templateId,$param);

//返回短信验证码到客户端
        echo $res;

    }

    function out(request $request)
    {
        //清空session
        $request->session()->flush();
        //两秒后跳转首页
        echo '正在退出,请稍等......';
        header('refresh:2,url=/home/index');
    }

    public function test()
    {
        return 111;
    }
}
