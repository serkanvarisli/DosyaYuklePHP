<html>
<head>
<title>Dosya yükleme</title><meta charset="utf-8">
</head>
<style>
body{
    background-color:#79cdcd;
    color:#870009; }
</style>
<body> <center>
<form enctype="multipart/form-data" action=""  method="POST">
Ad: <br>
<input type="text" name="ad" value=""><br>
Soyad: <br>
<input type="text" name="soyad" value=""> <br>
Email: <br>
<input type="email" name="email" value=""> <br>
Açıklama: <br> 
<input type="text" name="aciklama" value=""> <br>
<br>
Dosya seçiniz: <br>
<input type="file" name="dosya"><br>
<input type="submit" value="YÜKLE"><br>
</form>
<?php
if(!empty($_POST["ad"])&&($_POST["soyad"])&&($_POST["email"])&&($_POST["aciklama"])){
$dosya_turu = substr($_FILES["dosya"]["name"],-4,4);
$dosya_adi = strtolower($_POST["ad"].$_POST["soyad"].$dosya_turu);
$dosya_yolu = "dosya/".$dosya_adi;
$boyut = 10000000;

if($_FILES['dosya']['error'] == 4){
   echo "Dosya Seçilmedi";
}else if($_FILES['dosya']['error'] != 0){
    echo "Dosya Bozuk";
}else if(!is_uploaded_file($_FILES['dosya']['tmp_name'])){
    echo "Hata";
}else{
    $dosyaturu = ['image/png','image/jpeg','image/bmp','image/gif','application/pdf','application/msword','application/zip','application/rar'];
    if(!in_array($_FILES['dosya']['type'],$dosyaturu)){
       echo "Dosya türü hatalı";
    }else if($_FILES['dosya']['size'] > $boyut){
        echo "En fazla 10 mb boyutunda bir dosya yüklenilebilir";
    }else{
        $upload = move_uploaded_file($_FILES['dosya']['tmp_name'],$dosya_yolu);
        if($upload){
           echo "DOSYA YÜKLENDİ";
        }else{
            echo "DOSYA YÜKLENEMEDİ";
        }
    }
}
}
?>
</center>
</body>
</html>