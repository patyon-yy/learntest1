<?php
header("Content-type:text/html;charset=utf-8");
// 获取code码   用于下一步获取accesss_token
$code=$_GET["code"];
//通过code获得access_token
$responsed=httpGet("https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxdbd624151f21fb62&secret=2e0dba00bfc7d4ad870845c6f42dd575&code={$code}}&grant_type=authorization_code");

// json解析
$jsonObj=json_decode($responsed);
$access_token=$jsonObj->access_token;
$openid=$jsonObj->openid;


// 拉去用户信息

$response=httpGEt("https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}}&openid={$openid}&lang=zh_CN");

$userinfo=json_decode($response);

//获取用户的昵称

$nickName=$userinfo->nickName;
$headimgurl=$userinfo->headimgurl;
echo "<img width=200px src='{$headimgurl}'>";














function httpGet($url){
    // 初始化 curl   对curl进行配置   执行curl  关闭curl
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    // 初始化 curl     配置额名字    项目中对应的值
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    
    $res=curl_exec($curl);
    // 执行
    curl_close($curl);

    return $res;

}
?>