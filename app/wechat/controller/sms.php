<?php

/**
 * 使用云片网的API封装发送短信的方法
 * 使用之前请修改apikey参数
 */
namespace app\wechat\controller;
header("Content-Type:text/html;charset=utf-8");
/**
 * [sendSms description]
 * @param  [type] $mobile [要发送的手机号]
 * @param  [type] $text   [要发送的文本，需带上签名例如：【美丽乡村】]
 * @return [type]         [返回发送结果的数组]
 */
function sendSms($mobile, $text){
    $apikey = "4af7630fa8d92cbbcb5df40088344bca"; 
    $ch = curl_init();
    /* 设置验证方式 */
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8',
        'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
    /* 设置返回结果为流 */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* 设置超时时间*/
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    /* 设置通信方式 */
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // 发送短信
    $data=array('text'=>$text,'apikey'=>$apikey,'mobile'=>$mobile);
    curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    $error = curl_error($ch);
    if($result === false)
    {
        echo 'Curl error: ' . $error;
    }else
    {
        //echo '操作完成没有任何错误';
    }
    checkErr($result,$error);
    $json_data = $result;
    $array = json_decode($json_data,true);
    return $array;
}



?>