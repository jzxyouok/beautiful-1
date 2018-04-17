<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-12
 * Time: 21:46
 * TODO: 定义工具类
 */
namespace app\wechat\controller;

header("Content-type:text/html;charset=utf-8");   //指定编码集


class Util
{

    /**
     * @param $url
     * @param $data
     * @param int $timeout
     * @return bool|mixed
     * @TODO 封装get请求方法
     */
    public static function HttpGet($url){
        $html = file_get_contents($url);
        return $html;
    }

    /**
     * @param $url
     * @param $requestString
     * @param int $timeout
     * @return bool|mixed
     * @TODO 封装post请求方法
     */
    public static function HttpPost($url,$requestString,$timeout = 5){
        if($url == '' || $requestString == '' || $timeout <=0){
            return false;
        }
        $con = curl_init((string)$url);
        curl_setopt($con, CURLOPT_HEADER, false);
        curl_setopt($con, CURLOPT_POSTFIELDS, $requestString);
        curl_setopt($con, CURLOPT_POST,true);
        curl_setopt($con, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($con, CURLOPT_TIMEOUT,(int)$timeout);
        return curl_exec($con);
    }


}