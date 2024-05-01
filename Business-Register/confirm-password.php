<?php 
include 'Conx.php';
$id = str_replace(" ", "+", $_GET['id']);
$pass = $_POST['password'];
$key = "ThisIsASecretKey";
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}$decryptedData = decryptData($id, $key);
function encryptData($plaintext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}$encryptedData = encryptData($pass, $key);
$sql = "UPDATE user_tb SET Pass = '$encryptedData' WHERE BusID = '$decryptedData'";
if ($conn->query($sql) === TRUE) {
  header("Location:../Owner/Home.php?id=$id");
} else {
  echo "Error updating record: " . $conn->error;
}
?>