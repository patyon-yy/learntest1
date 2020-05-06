<?php
// 微信验证
// echo $_GET["echostr"]
// 
function checkwx(){
    // 微信会发送四个参数发送到我们的服务器后台，签名 时间戳 随机字符串  随机数
    $signature=$_GET["signature"];
    $timestamp=$_GET["timestamp"];
    $nonce=$_GET["nonce"];
    $echostr=$_GET["echostr"];
    $token="gly";
    // 将 token  timestamp  nonce 进行字典序排序；
    $tmpArr=array($nonce,$token,$timestamp);
    sort($tmpArr,SORT_STRING);
    // 进行sha1加密
    $str=implode($tmpArr);
    $sign=sha1($str);
    // 开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
    if($sign==$signature){
        echo $echostr;
    }

};
checkwx();
// https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxdbd624151f21fb62&secret=2e0dba00bfc7d4ad870845c6f42dd575
// 获取 Asscess tokn
// Get 请求方式  
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
// $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxdbd624151f21fb62&secret=2e0dba00bfc7d4ad870845c6f42dd575";
// echo httpGet($url)
// 31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL


// 获取用户列表
// https://api.weixin.qq.com/cgi-bin/user/get?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL&next_openid=NEXT_OPENID
// $url="https://api.weixin.qq.com/cgi-bin/user/get?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// echo httpGet($url);



// 设置用户备注
// $url="https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "openid":"oO2LQ0TCFEv-dVTnjuFvwMCFZKkM",
// 	"remark":"耿路遥"
// }';
// echo httpPost($url,$data);
// 单个获取用户信息
// $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL&openid=oO2LQ0TCFEv-dVTnjuFvwMCFZKkM&lang=zh_CN";
// echo httpGet($url);
// 批量获取用户信息
// $url="https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";

// $data='{
//     "user_list": [
//         {
//             "openid": "oO2LQ0TCFEv-dVTnjuFvwMCFZKkM", 
//             "lang": "zh_CN"
//         }
//     ]
// }';
// echo httpPost($url,$data);

// 创建标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/create?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "tag" : {     "name" : "广东"//标签名   }
// }';
// echo httpPost($url,$data);
// 31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL
// 获取公众号已创建的标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/get?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// echo httpGet($url);

// 编辑标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/update?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "tag" : {     "id" : 101,     "name" : "广东人"   }
// }';
// echo httpPost($url,$data);
// 删除标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "tag":{        "id" : 101   }
// }';
// echo httpPost($url,$data);
// $url="https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     {   "tagid" : 101,   "next_openid":""//第一个拉取的OPENID，不填默认从头开始拉取 } 
// }';
// echo httpPost($url,$data);

// 批量为用户打标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "openid_list" :    
//         "oO2LQ0TCFEv-dVTnjuFvwMCFZKkM",   
//         "tagid" : 102 
// }';
// echo httpPost($url,$data);
// 批量为用户取消标签
// $url="https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "openid_list" : [//粉丝列表     
//         "ocYxcuAEy30bX0NXmGn4ypqx3tI0",     
//         "ocYxcuBt0mRugKZ7tGAHPnUaOW7Y"   ],   
//         "tagid" : 101
// }';
// echo httpPost($url,$data);
// 获取用户身上的标签列表
// $url="https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "openid" : "oO2LQ0TCFEv-dVTnjuFvwMCFZKkM"
// }';
// echo httpPost($url,$data);
// 拉黑
// $url="https://api.weixin.qq.com/cgi-bin/tags/members/batchblacklist?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "openid_list":"oO2LQ0anSDvZxOoAFdLp5w9JzlH4"
// }';
// echo httpPost($url,$data);
// 获取拉黑列表
// $url="https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
// $data='{
//     "begin_openid":""
// }';
// echo httpPost($url,$data);
// 取消拉黑
$url="https://api.weixin.qq.com/cgi-bin/tags/members/batchunblacklist?access_token=31_NljxAum6ZGVIcxs1EBYgeZQMZk2pC5ya1ZSzt8wtcYdlEq0vpRmqfqeXqyjaLcuBBhiCtQjHRWLyvj16uTAyIUnF1WoSqXY_N_1ZuctwwKn34weBJMFWKJmHG5nCucgLR8InG9ptqKY5xKkCTVVaAAAJLL";
$data='{
    "begin_openid":"oO2LQ0anSDvZxOoAFdLp5w9JzlH4"
}';
echo httpPost($url,$data);
?>