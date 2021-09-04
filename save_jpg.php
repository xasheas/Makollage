<?php

//resime rastgele isim ataması yapan kod
$random = rand(100, 1000);

//put content ile dosyaların outputunu ayarlar
$savefile = @file_put_contents("output/$random.png", base64_decode(explode(",", $_POST['data'])[1]));

//eger dosya kaydedildiyse ismini yazdır.
if($savefile){
	echo $random;

}

 
?>
