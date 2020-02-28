<?php
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
$base="/home/bpbd/web/newbpbd.baliprov.go.id/public_html/public/files/cctv";
/*
$pic='http://admin:@Dm1nIT2016@10.7.2.10/ISAPI/Streaming/channels/101/picture'; //Hikvision
$loc="$base/kantor/Ruang_Rapat_Pusdalops_BPBD_Bali.jpg";
//die ($loc);
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}

$pic='http://admin:@Dm1nIT2016@10.7.2.11/ISAPI/Streaming/channels/101/picture';
$loc="$base/kantor/Lobby_Pusdalops_BPBD_Bali.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://admin:@Dm1nIT2016@10.7.2.12/ISAPI/Streaming/channels/101/picture';
$loc="$base/kantor/Lorong_Pusdalops_BPBD_Bali.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}

*/
$pic='http://root:admin@172.15.101.179/cgi-bin/viewer/video.jpg';//Vivotek IP7361
$loc="$base/outdoor/Penyeberangan_Gilimanuk.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://admin:@Dm1nIT2016@172.15.101.8/ISAPI/Streaming/channels/101/picture';//Hikvision
$loc="$base/outdoor/Simpang_Sunset_Road_Imam_Bonjol_Kuta.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://root:lutung123@172.15.101.141/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IB8369A
$loc="$base/outdoor/Pantai_Sanur.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://root:@Dm1nIT2016@172.15.101.2/jpg/image.jpg?size=3';//Axis 221 LOVINA
$loc="$base/outdoor/Pantai_Lovina.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
//$pic='http://root:root@172.15.101.116/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IP7130
$pic='http://root:lutung123@172.15.101.4/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IB8369A
$loc="$base/outdoor/Pelabuhan_Benoa.jpg";
$res=file_get_contents($pic);
//die($res);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://root:lutung123@172.15.101.6/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IB8369A
$loc="$base/outdoor/Pasar_Guwang.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://root:lutung123@172.15.101.5/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IB8369A
$loc="$base/outdoor/Pelabuhan_Padang_Bai.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
$pic='http://root:lutung123@172.15.101.177/cgi-bin/viewer/video.jpg?resolution=1280x960';//Vivotek IB8369A
$loc="$base/outdoor/Tanah_Lot.jpg";
$res=file_get_contents($pic);
if (strlen($res)>0){
 file_put_contents($loc, $res);
}
?>