<?php
require_once("CURL.php");
function set_token($code, $client_id, $client_secret, $redirect_uri, $grant_type){
  $url = "https://accounts.zoho.com/oauth/v2/token?code=$code&client_id=$client_id&client_secret=$client_secret&redirect_uri=$redirect_uri&grant_type=$grant_type";
  $method = 'POST';

  $respone =  send_Request_curl($url, $method, $header = []);

  if(isset($respone->error)){
    echo "please check your config";
    exit;
  }else{
     return $respone->access_token;
  }
}
