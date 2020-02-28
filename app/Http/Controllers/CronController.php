<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuaca;
use DB;   
use View;
class CronController extends Controller
{

    public function string_between($string, $start, $end){
        
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }  
     
    public function CuacaExtrem(){
       
        /**
      *    Info peringatanCuacaExtream
      **/
       $url = "http://balai3.denpasar.bmkg.go.id/";
       $data = file_get_contents($url,false);
       $peringatanCuacaExtream = "";
       $content = array();
       
       if($data !== false AND !empty($data)) {
           $dom = new \DOMDocument();
           $dom->validateOnParse = true;
           @$dom->loadHTML($data);
           $dom->preserveWhiteSpace = false;   
           
           $tables = $dom->getElementsByTagName('table');
           for ($i = 0; $i < $tables->length; $i++) {
               $rows = $tables->item($i)->getElementsByTagName('tr');   
               foreach ($rows as $row) {
                   $cols = $row->getElementsByTagName('td');
                   foreach ($cols as $node) {
                           $content[] = trim($node->textContent);
                   }
               }
           } 
       } 
       
       $peringatanCuacaExtream =  $this->string_between($content[0], "Peringatan DiniCuaca Ekstrim", "BERITA TERBARU");
       
       if (strlen($peringatanCuacaExtream) > 0) {   
            $cuaca = Cuaca::where('nama_cuaca', 'cuaca_extrem')->get(); 
            $cuaca->detail = $peringatanCuacaExtream;
            $cuaca->updated_at = date('Y-m-d H:i:s');
            $cuaca->update();
            
           //$sql="UPDATE z_cuaca SET tgl=current_timestamp(),ekstrim='$ekstrim' where id=1 ";
           //$result=mysql_query($sql);
           //dd($content[0]);
           return 'cuaca extrem ok';
       }else{
            return 'cuaca extrem error';
       }
       //return false;
   }

   public function CuacaTerkini(){
    $vcuaca = "";
    $url  = "http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=02&NamaProv=Bali"; 
    $sUrl = file_get_contents($url, False);
    $len  =strlen($sUrl);
    $start=strpos($sUrl,"<ul class=\"nav nav-tabs\">");
    $end  =strpos($sUrl,"Provinsi Lainnya");
    $pra=strpos($sUrl,"<table class=\"table table-hover table-striped table-prakicu-provinsi\">");
    $vcuaca .= substr($sUrl,$start,$end-$start);
    $vcuaca = preg_replace("|<a href=\"(.*)prakiraan-cuaca.bmkg(.*)>(.*)</a>|","\\3",$vcuaca);
    $vcuaca = str_replace('Amplapura','Amlapura',$vcuaca);
    
   
    if (strlen($vcuaca)>0) {//hati hati
        
        $cuaca = Cuaca::where('nama_cuaca', 'cuaca_terkini')->first(); 
        
        if(empty($cuaca)){
            $cuaca = new Cuaca;
            $cuaca->nama_cuaca = 'cuaca_terkini';
            $cuaca->detail = $vcuaca; 
            $cuaca->updated_at = date('Y-m-d H:i:s');
            $cuaca->save();
        }else{
            $cuaca->detail = $vcuaca; 
            $cuaca->updated_at = date('Y-m-d H:i:s');
            $cuaca->update();
        }
        
        
        
        
       //$sql="UPDATE z_cuaca SET tgl=current_timestamp(),ekstrim='$ekstrim' where id=1 ";
       //$result=mysql_query($sql);
       //dd($content[0]);
       return 'cuaca terkini ok'; 
    }	
     
    return 'cuaca terkini error';
}
 
    
}
