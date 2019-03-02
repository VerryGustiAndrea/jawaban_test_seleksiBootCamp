<Html>

<head>
<title> Sistem Pengecekan Ketersediaan Password </title>


</head>

<body>
<h1 >Sistem Pengecekan Ketersediaan Password</h1>
<form name="formku" method="POST" action="#">

<table width="670" border="0">
  </tr>
  <tr>
    <td width="163" size font="56">Password</td>
    <td width="326"> :
    <input name="pass" type="text" id="pass"></td>
  </tr>

   <td></td>
     <td>
       
      <input name="Periksa" type="submit" id="Kirim" value="Periksa" >
	  <button type="button" onclick="history.back();">Cek Lagi</button></td>
</table>
</form>
</body>
</html>
<?php

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$pass=$_POST ["pass"];
$Kirim=$_POST ["Kirim"];

if (!empty($Kirim))

    echo "<h1>Hasil Pengecekan</h1>";
    echo "</br>";
    echo "</br>";
	

	$uppercase = preg_match('@[A-Z]@', $pass);
	$lowercase = preg_match('@[a-z]@', $pass);
	$number    = preg_match('@[0-9]@', $pass);
	$tanda	   = preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $pass);

if(!$uppercase || !$lowercase || !$number || !$tanda || strlen($pass)<=8){
    echo "password harus lebih dari 8 karakter, mengandung huruf BESAR, huruf kecil, tanda baca dan angka";
}else{
    echo "password memenuhi kriteria";
}
	