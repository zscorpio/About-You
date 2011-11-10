<?php
header("Content-type: text/html; charset=utf-8");

require_once("../comm/utils.php");

function get_access_token($appid, $appkey, $request_token, $request_token_secret, $vericode)
{
    global $global_arg;
    $url    = "http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token?";
	$sigstr = "GET"."&".QQConnect_urlencode("http://openapi.qzone.qq.com/oauth/qzoneoauth_access_token")."&";
    $params = array();
    $params["oauth_version"]          = "1.0";
    $params["oauth_signature_method"] = "HMAC-SHA1";
    $params["oauth_timestamp"]        = time();
    $params["oauth_nonce"]            = mt_rand();
    $params["oauth_consumer_key"]     = $appid;
    $params["oauth_token"]            = $request_token;
    $params["oauth_vericode"]         = $vericode;
    $normalized_str = get_normalized_string($params);
    $sigstr        .= QQConnect_urlencode($normalized_str);
    $key = $appkey."&".$request_token_secret;
    $signature = get_signature($sigstr, $key);
    $url      .= $normalized_str."&"."oauth_signature=".QQConnect_urlencode($signature);
    $global_arg = $url;
    return file_get_contents($url);
}
global $global_arg;
if (!is_valid_openid($_REQUEST["openid"], $_REQUEST["timestamp"], $_REQUEST["oauth_signature"]))
{
    echo '<html lang="zh-cn">';
    echo '<head>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    echo '</head>';
    echo '<body>';
    echo "<h3>invalid openid</h3>";
    print_r($_REQUEST);
    echo "<h3>错误签名:</h3>".$_REQUEST["oauth_signature"];
    echo "<h3>正确签名:</h3>$global_arg"; 
    echo '</body>';
    echo '</html>';
    exit;
}

$access_str = get_access_token($_SESSION["appid"], $_SESSION["appkey"], $_REQUEST["oauth_token"], $_SESSION["secret"], $_REQUEST["oauth_vericode"]);

if (strpos($access_str, "error_code") !== false)
{
    echo '<html lang="zh-cn">';
    echo '<head>';
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
    echo '</head>';
    echo '<body>';
    echo "<h3>请求url:</h3>$global_arg</br>";
    echo "<h3>返回值:</h3>$access_str</br>";
    echo '<h3>请参考</h3><a href="http://wiki.opensns.qq.com/wiki/%E3%80%90QQ%E7%99%BB%E5%BD%95%E3%80%91%E5%85%AC%E5%85%B1%E8%BF%94%E5%9B%9E%E7%A0%81%E8%AF%B4%E6%98%8E" target="_blank">错误码说明</a>与<a href="http://open.qzone.qq.com/oauth_tool/oauth_url_check.htm">调试工具</a>';
    echo '</body>';
    echo '</html>';
    exit;
}

$result = array();
parse_str($access_str, $result);
$_SESSION["token"]   = $result["oauth_token"];
$_SESSION["secret"]  = $result["oauth_token_secret"]; 
$_SESSION["openid"]  = $result["openid"];
function get_user_info($appid, $appkey, $access_token, $access_token_secret, $openid)
{
    $url    = "http://openapi.qzone.qq.com/user/get_user_info";
    $info   = do_get($url, $appid, $appkey, $access_token, $access_token_secret, $openid);
    $arr = array();
    $arr = json_decode($info, true);

    return $arr;
}
$arr = get_user_info($_SESSION["appid"], $_SESSION["appkey"], $_SESSION["token"], $_SESSION["secret"], $_SESSION["openid"]);
$userinfo=json_encode($arr);
$obj = json_decode($userinfo);
$avatar = $obj->figureurl_2;
$qq_id = $_SESSION["openid"];
$nick = $obj->nickname;
header("Location:http://card.zscorpio.com/index.php/qq/index?qq_id=$qq_id&nick=$nick&avatar=$avatar");
?>
