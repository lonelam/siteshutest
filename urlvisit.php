<?php
$curl=curl_init();
curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2652.0 Safari/537.36');
curl_setopt($curl,CURLOPT_REFERER,'http://www.lehu.shu.edu.cn/');
$StudentNum=(string)$_POST['StudentNum'];
//$url='http://passport.lehu.shu.edu.cn/LoginDo.aspx?'.'urlReferrer=http%3a%2f%2fwww.lehu.shu.edu.cn%2f&username='.$StudentNum.'&password='.(string)$_POST['psw'].'&action=2';
//print_r($url);
$url='http://passport.lehu.shu.edu.cn/LoginDo.aspx?action=1&timeStamp=1456409563128';
$data='username=15123005&password=Laizenan09&urlReferrer=http%3A%2F%2Fmy.lehu.shu.edu.cn%2FFile%2FInfo_Detail.aspx&button=%E5%85%8D%E8%B4%B9%E6%B3%A8%E5%86%8C';
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_HEADER,1);
//curl_setopt($curl,CURLOPT_COOKIE,'__utmz=93645184.1452591059.4.3.utmccn=(referral)|utmcsr=psea.in|utmcct=/|utmcmd=referral; Hm_lvt_444bf10f6d7469654b7f41f9f9f9c301=1451806133,1452091199,1453916236,1453916260; ASP.NET_SessionId=tbpx35io2pgxzc55szjkai45; __utma=93645184.460048833.1449807852.1456386286.1456404959.7; __utmc=93645184; SHUPassport=5dc89993-bfdf-4c78-92ed-341709c5f642');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
$res=curl_exec($curl);
list($header, $body) = explode("\r\n\r\n", $res, 2);
preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
$info['cookie']  = substr($matches[1][0], 1);
$info['content'] = $body;
curl_close($curl);
print_r($info['content']);
?>