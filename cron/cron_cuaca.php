<?php
  		ini_set('max_execution_time', 300); 
		  $host = "localhost";
		  $user = "bpbd_user";
		  $pass="bpbdbali";
		  $db = "bpbd_db";
		  $conn = mysqli_connect($host,$user,$pass,$db) or die(mysql_error());
		  //$koneksi->select_db($db) or die(mysql_error());
		
		function get_string_between($string, $start, $end){
			$string = ' ' . $string;
			$ini = strpos($string, $start);
			if ($ini == 0) return '';
			$ini += strlen($start);
			$len = strpos($string, $end, $ini) - $ini;
			return substr($string, $ini, $len);
		}	

		

		//----------------------------------------------------------------------------------------------------------------------------------------------------
		
		$url = "http://data.bmkg.go.id/gempaterkini.xml";
		$sUrl = file_get_contents($url, False);
		$sUrl = substr($sUrl,21);
		$xml = simplexml_load_string($sUrl);
		$terkini=""; 
		//print_r ($xml->gempa[0]); 
		$row = $xml->gempa[0];
		$terkini .= "<div class=\"panel panel-warning\" style=\"border-color:#fdac05\">
							<div class=\"panel-header\">
								<h3 class=\"panel-title\" style=\"color:#ff8d00; text-align:center;\">Gempa Bumi M > 5.0</h3>
							</div>
							<div class=\"panel-body gempabumi-detail\">
								<h3 class=\"text-center\">".$row->Tanggal.", ".$row->Jam."</h3>
								<ul class=\"list-unstyled\">
									<li><span class=\"ic magnitude\"></span><b>".$row->Magnitude."</b></li>
									<li><span class=\"ic kedalaman\"></span><b>".$row->Kedalaman."</b></li>
									<li><span class=\"ic koordinat\"></span><b>".$row->Lintang." - ".$row->Bujur."</b></li>
									<li class=\"bl\"><span class=\"ic lokasi np\"></span><b>".$row->Wilayah."</b></li>
								</ul>
							</div>
						</div>";	
			if (strlen($terkini)>0) {	
			  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),terkini='$terkini' where id=1 ";
			  $result=mysqli_query($conn,$sql);
			  //echo $host."|".$user."|".$pass."|".$db;
			  //$conn = new mysqli($host, $user, $pass, $db);
			  //mysqli_query($conn,$conn,$sql);
			}	

		//dirasakan----------------------------------------------------------------------------------------------------------------------------------------------
		$url = "http://data.bmkg.go.id/gempadirasakan.xml";
		$sUrl = file_get_contents($url, False);
		$sUrl = substr($sUrl,21);
		$xml = simplexml_load_string($sUrl);
		try{
			if($xml !== false) {
				$vgempa = "";
				$row = $xml->Gempa[0];
			}
		} finally{
			$dirasakan= "";
		}
		//$dirasakan = "<div class=\"col-md-3 col-sm-6\"></div>
		$dirasakan = "<div class=\"panel panel-warning\" style=\"border-color:#fdac05\">
							<div class=\"panel-header\">
								<h3 class=\"panel-title\" style=\"color:#ff8d00; text-align:center;\">Gempa Bumi Dirasakan</h3>
							</div>
							<div class=\"panel-body gempabumi-detail\">
								<h3 class=\"text-center\">".$row->Tanggal."</h3>
								<ul class=\"list-unstyled\">
									<li><span class=\"ic magnitude\"></span><b>".$row->Magnitude."</b></li>
									<li><span class=\"ic kedalaman\"></span><b>".$row->Kedalaman."</b></li>
									<li><span class=\"ic koordinat\"></span><b>".$row->Posisi."</b></li>
									<li class=\"bl\"><span class=\"ic lokasi np\"></span><b>".$row->Dirasakan."</b></li>
								</ul>
							</div>
						</div>
					";			
			if (strlen($dirasakan)>0) {	
			  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),dirasakan='$dirasakan' where id=1 ";
			  $result=@mysqli_query($conn,$sql);
			}
			
		//ekstrim----------------------------------------------------------------------------------------------------------------------------------------------
		$url = "http://balai3.denpasar.bmkg.go.id/";
		$data = file_get_contents($url);
		$vprakc = "";
		if($data !== false AND !empty($data)) {
			$dom = new DOMDocument();
			$dom->validateOnParse = true;
			@$dom->loadHTML($data);  
			$dom->preserveWhiteSpace = false; 	
			$konten = array();
			$tables = $dom->getElementsByTagName('table');
			for ($i = 0; $i < $tables->length; $i++) {
				$rows = $tables->item($i)->getElementsByTagName('tr');   
				foreach ($rows as $row) {
					$cols = $row->getElementsByTagName('td');
					foreach ($cols as $node) {
							$konten[] = trim($node->textContent);
					}
				}
			}
		} 
			$ekstrim =  trim(get_string_between($konten[0], "Peringatan DiniCuaca Ekstrim", "BERITA TERBARU"));
			if (strlen($ekstrim)>0) {	
			  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),ekstrim='$ekstrim' where id=1 ";
			  $result=@mysqli_query($conn,$sql);
			}	

		$vcuaca = "";
		$url  = "http://www.bmkg.go.id/cuaca/prakiraan-cuaca-indonesia.bmkg?Prov=02&NamaProv=Bali"; 
		$sUrl = file_get_contents($url, False);
		$len  =strlen($sUrl);
		$start=strpos($sUrl,"<ul class=\"nav nav-tabs\">");
		$end  =strpos($sUrl,"Provinsi Lainnya");
		$pra=strpos($sUrl,"<table class=\"table table-hover table-striped table-prakicu-provinsi\">");
		//echo $len."|".$start."|".$pra."|".$end;
		$vcuaca .= substr($sUrl,$start,$end-$start);
		$vcuaca = preg_replace("|<a href=\"(.*)prakiraan-cuaca.bmkg(.*)>(.*)</a>|","\\3",$vcuaca);
		$vcuaca = str_replace('Amplapura','Amlapura',$vcuaca);
		
		$start = strpos($vcuaca,"<div class=\"peringatan-dini-home owl-carousel-v1 margin-bottom-20\">");
		$end   =strpos($vcuaca,"<div class=\"table-responsive\">");
		$peridini = substr($vcuaca,$start,$end-$start);
		$vcuaca = str_replace($peridini,'',$vcuaca);
		$vcuaca = str_replace("'","\'",$vcuaca);

		if (strlen($vcuaca)>0) {	//hati hati
			$sql="UPDATE z_cuaca SET tgl=current_timestamp(),cuaca='$vcuaca' where id=1 ";
			$result=mysqli_query($conn,$sql);

		}	
		if (strlen($peridini)>0) {	//hati hati
			$sql="UPDATE z_cuaca SET tgl=current_timestamp(),peridini='$peridini' where id=1 ";
			$result=mysqli_query($conn,$sql);
			//echo $sql;		
		}	




		$url = "http://data.bmkg.go.id/gempaterkini.xml";
		$sUrl = file_get_contents($url, False);
		$sUrl = substr($sUrl,21);
		$xml = simplexml_load_string($sUrl);
		$vgempa = "";
		for ($i=0; $i<8; $i++) {
			$row = $xml->gempa[$i];
			$vgempa .= "<div class=\"col-md-3 col-sm-6\">
							<div class=\"panel panel-warning\" style=\"border-color:#fdac05\">
								<div class=\"panel-body gempabumi-detail\">
									<h3 class=\"text-center\">".$row->Tanggal.", ".$row->Jam."</h3>
									<ul class=\"list-unstyled\">
										<li><span class=\"ic magnitude\"></span><b>".$row->Magnitude."</b></li>
										<li><span class=\"ic kedalaman\"></span><b>".$row->Kedalaman."</b></li>
										<li><span class=\"ic koordinat\"></span><b>".$row->Lintang." - ".$row->Bujur."</b></li>
										<li class=\"bl\"><span class=\"ic lokasi np\"></span><b>".$row->Wilayah."</b></li>
									</ul>
								</div>
							</div>
						</div>";
		}
		
		$gempa = "<div class=\"fullwidth-block\">
					<div class=\"container\">
						<h2 class=\"section-title text-center\">GEMPA TERKINI</h2>
						<div class=\"row team-bar\">
							<div class=\"first-one-arrow hidden-xs\">
								<hr>
							</div>
							<div class=\"first-arrow hidden-xs\">
								<hr> <i class=\"fa fa-circle-o\"></i>
							</div>
							<div class=\"second-arrow hidden-xs\">
								<hr> <i class=\"fa fa-circle-o\"></i>
							</div>
							<div class=\"third-arrow hidden-xs\">
								<hr> <i class=\"fa fa-circle-o\"></i>
							</div>
							<div class=\"fourth-arrow hidden-xs\">
								<hr> <i class=\"fa fa-circle-o\"></i>
							</div>
						</div>
						<div class=\"row\">
							".$vgempa."
							<div>Sumber Data: <a href=\"http://www.bmkg.go.id/\" target=\"_blank\">BMKG</a></li>
						</div>
					</div>
				</div>";	
		
		if (strlen($gempa)>0) {	
		  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),gempa='$gempa' where id=1 ";
		  //die ($sql);
		  $result=mysqli_query($conn,$sql);
		}

//pelabuhan----------------------------------------------------------------------------------------------------------------------------------------------------
$url = "http://maritim.bmkg.go.id/stasiun_maritim/pelabuhan/?stasiun=x5GsXZJUiH84P8GHtsQayTATWCxYGxIgFjZzdaN6IAM";
$data = file_get_contents($url);
$vprakc = "";
if($data !== false AND !empty($data)) {
	$dom = new DOMDocument();
	$dom->validateOnParse = true;
	@$dom->loadHTML($data);  
	$dom->preserveWhiteSpace = false; 	
	$konten = $dom->getElementById('content_indonesia');
	$konten = $konten->textContent;
	$vpel1 = "";
	$vpel2 = "";
	$ar_pel = explode("Pelabuhan Laut",$konten);
	
	if(!empty($ar_pel[0])){
		$ar_pel[0] = $ar_pel[0]."|";
		
		$judul_pel1 = get_string_between($ar_pel[0], "Utama", "Cuaca");
		//$pel1 = ar_pel[0];
		$vpel1 = "<h3 class=\"page-header\"> Pelabuhan Utama</h3>
					<h3>".$judul_pel1."</h3>
					<dl class=\"dl-horizontal\">
						<dt>Cuaca</dt>
						<dd>".get_string_between($ar_pel[0], "Cuaca", "Angin")."</dd>
						<dt>Angin</dt>
						<dd>".get_string_between($ar_pel[0], "Angin", "Gelombang")."</dd>
						<dt>Gelombang</dt>
						<dd>".get_string_between($ar_pel[0], "Gelombang", "Visibility")."</dd>
						<dt>Visibility</dt>
						<dd>".get_string_between($ar_pel[0], "Visibility", "Suhu Udara")."</dd>
						<dt>Suhu Udara</dt>
						<dd>".get_string_between($ar_pel[0], "Suhu Udara", "Kelembaban")."</dd>
						<dt>Kelembaban</dt>
						<dd>".get_string_between($ar_pel[0], "Kelembaban", "Pasang / Surut Air Laut")."</dd>
						<dt>Pasang / Surut Air Laut</dt>
						<dd>".get_string_between($ar_pel[0], "Pasang / Surut Air Laut", "Remarks")."</dd>
						<dt>Remarks</dt>
						<dd>".get_string_between($ar_pel[0], "Remarks", "|")."</dd>
					</dl>";
	}
	if(!empty($ar_pel[1])){
		$temp = explode("Pelabuhan",trim($ar_pel[1]));
		$temp[1] = "|".$temp[1]."|";
		$temp[2] = "|".$temp[2]."|";
		$judul_pel2 = get_string_between($temp[1], "|", "Cuaca");
		$judul_pel3 = get_string_between($temp[2], "|", "Cuaca");
		$vpel2 = "<h3 class=\"page-header\"> Pelabuhan Laut</h3>
					<h3>Pelabuhan ".$judul_pel2."</h3>
					<dl class=\"dl-horizontal\">
						<dt>Cuaca</dt>
						<dd>".get_string_between($temp[1], "Cuaca", "Angin")."</dd>
						<dt>Angin</dt>
						<dd>".get_string_between($temp[1], "Angin", "Gelombang")."</dd>
						<dt>Gelombang</dt>
						<dd>".get_string_between($temp[1], "Gelombang", "Visibility")."</dd>
						<dt>Visibility</dt>
						<dd>".get_string_between($temp[1], "Visibility", "|")."</dd>
					</dl>
					<h3>Pelabuhan ".$judul_pel3."</h3>
					<dl class=\"dl-horizontal\">
						<dt>Cuaca</dt>
						<dd>".get_string_between($temp[2], "Cuaca", "Angin")."</dd>
						<dt>Angin</dt>
						<dd>".get_string_between($temp[2], "Angin", "Gelombang")."</dd>
						<dt>Gelombang</dt>
						<dd>".get_string_between($temp[2], "Gelombang", "Visibility")."</dd>
						<dt>Visibility</dt>
						<dd>".get_string_between($temp[2], "Visibility", "|")."</dd>
					</dl>";
	}
	$vpelabuhan=$vpel1.$vpel2;	
	//echo $vpelabuhan;
	if (strlen($vpelabuhan)>0) {	
	  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),pelabuhan='$vpelabuhan' where id=1 ";
	  $result=@mysqli_query($conn,$sql);
	}	
	
		//bandara----------------------------------------------------------------------------------------------------------------------------------------------------
				
		$url = "http://www.bmkg.go.id/cuaca/cuaca-aktual-bandara.bmkg?Detil=YES&amp;ICAOID=WADD";
		$data = file_get_contents($url);
		//echo $data; die;
		$vprakc = "";$bandara = "";
		if($data !== false AND !empty($data)) {
			$dom = new DOMDocument();
			$dom->validateOnParse = true;
			@$dom->loadHTML($data);  
			$dom->preserveWhiteSpace = false; 	
			$konten = array();
			$tables = $dom->getElementsByTagName('table');
			for ($i = 0; $i < $tables->length; $i++) {
				$rows = $tables->item($i)->getElementsByTagName('tr');   
				foreach ($rows as $row) {
					$cols = $row->getElementsByTagName('td');
					//if($cols->item(1)->textContent == "<a href=\"?Detil=YES&amp;ICAOID=WADD\">I Gusti Ngurah Rai - Denpasar</a>"){
					if(@$cols->item(1)->textContent == "I Gusti Ngurah Rai - Denpasar"){ //memang ada notice disini trying to get property. isi @
						//echo $cols->item(1)->textContent."\n";  
					  foreach ($cols as $node) {
							$konten[] = trim($node->textContent);
						}
					}
				}
			}
			
			if(!empty($konten)){
				$bandara = "<h3>Bandara ".$konten[1]."</h3>
							<dl class=\"dl-horizontal\">
								<dt>Waktu Pengamatan</dt>
								<dd>".$konten[2]."</dd>
								<dt>Arah Angin (dari)</dt>
								<dd>".$konten[3]."</dd>
								<dt>Kecepatan Angin</dt>
								<dd>".$konten[4]." km/jam</dd>
								<dt>Jarak Pandang (km)</dt>
								<dd>".$konten[5]."</dd>
								<dt>Cuaca</dt>
								<dd>".$konten[6]."</dd>
								<dt>Suhu (C)</dt>
								<dd>".$konten[7]."</dd>
								<dt>Titik Embun (C)</dt>
								<dd>".$konten[8]."</dd>
								<dt>Tekanan Udara (hPa)</dt>
								<dd>".$konten[9]."</dd>
							</dl>";
			}
			if (strlen($bandara)>0) {	
			  $sql="UPDATE z_cuaca SET tgl=current_timestamp(),bandara='$bandara' where id=1 ";
			  //die ($sql);
			  $result=@mysqli_query($conn,$sql);
			}			
		}
	
}

?>		