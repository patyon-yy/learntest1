<?php
class weixin{

    private $appID="wxdbd624151f21fb62";
    private $appsecret="2e0dba00bfc7d4ad870845c6f42dd575";

    // 获取access_token
    function getAccessToken(){
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->appID}&secret={$this->appsecret}";
        return $this->httpGet($url);
    }


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
    // post 请求方式
    function httpPost($url,$data){
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_POST,true);
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $res=curl_exec($curl);
        curl_close($curl);
        return $res;
    }
}









?>