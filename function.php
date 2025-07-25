<?php
#######################№#########№№№##
#CODE BY AMJADYT 
#VERSION 1.2 
#NAME CODE FUNCTION PHP 
#©COPYRIGHT 25 JULI 2025
#JANGAN LUPA SUBSCRIBE YT GWA :)
#fungsi code ini adalah mempermudah dalam scripting ....!!
############TRIMAKASIH🔥🔥🔥##########
#CODE WARNA
const d = "\033[0m";
const m = "\033[1;31m";  
const h = "\033[1;32m";
const k = "\033[1;33m";  
const b = "\033[1;34m";  
const u = "\033[1;35m";  
const c = "\033[1;36m";  
const p = "\033[1;37m";  

#FUNCTION CURL 
function Curl($url, $h = [], $data = 0){
  while(true){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    if($h){
      curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
    }
    if($data){
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
      throw new Exception('Curl error: ' . curl_error($ch));
    }
    curl_close($ch);
    return $response;
  }
}
#FUNCTION SIMPAN DATA
function Simpan($key){
  $nama_file = 'data.json';
  if(!file_exists($nama_file)){
    $config=[];
  }else{
    $config = json_decode(file_get_contents($nama_file),1);
  }
  if(isset($config[$key])){
    return $config[$key];
  }else{
    print(k.'-> '.'Input '.$key.' : ');
    $data = readline();
    $config[$key] = $data;
    file_put_contents($nama_file,json_encode($config,JSON_PRETTY_PRINT));
    return $data;
  }
}
#FUNCTION GARIS
function Line(){
  print(m.str_repeat('━',44)."\n").d;
}
#FUNCTION SUCCES
function Succes($msg){ 
  print(h.'━━['.p.'✓'.h.'] '.p.$msg."\n"); 
}
#FUNCTION ERROR/GAGAL
function Error($msg){
  print(m.'━━['.p.'×'.m.'] '.p.$msg."\n");
}
#FUNCTION MENU
function Menu($no, $name){
  print(h.'━━['.k.$no.h.'] '.k.$name."\n");
}
#FUNCTION IPAPI
function ipApi(){
  $r = json_decode(file_get_contents('http://ip-api.com/json'));
  if($r->status == 'success')return $r;
}
# FUNCTION BANNER
function Baner($name, $ver){
  $api = ipApi();
  if($api){
    date_default_timezone_set($api->timezone);
    print str_pad(strtoupper($api->city.', '.$api->regionName.', '.$api->country), 44, " ", STR_PAD_BOTH)."\n";
  }
  line();
  print p.str_pad(strtoupper("Author -> AmjadYt"),44, " ", STR_PAD_BOTH)."\n";
  print p.str_pad(strtoupper("name script -> {$name}"),44, " ", STR_PAD_BOTH)."\n";
  print p.str_pad(strtoupper("version -> {$ver}"),44, " ", STR_PAD_BOTH)."\n";
  line();
}

