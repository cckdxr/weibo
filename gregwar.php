<?php 

include('./vendor/autoload.php');

use Gregwar\Captcha\CaptchaBuilder;

$builder = new CaptchaBuilder;
$code = $builder->build($width = 180, $height = 40, $font = null);

$phrase = $builder->getPhrase();

// $_SESSION['phrase'] = $builder->getPhrase();

/*echo '<pre>';
var_dump($phrase);*/

$builder->save('out.jpg');


header('Content-type: image/jpeg');
$builder->output();

//$builder = new CaptchaBuilder; //可以设置图片宽高及字体 $builder->build($width = 100, $height = 40, $font = null); //获取验证码的内容 $phrase = $builder->getPhrase(); //把内容存入session Session::flash('milkcaptcha', $phrase); //生成图片 header("Cache-Control: no-cache, must-revalidate"); header('Content-Type: image/jpeg'); $builder->output();



