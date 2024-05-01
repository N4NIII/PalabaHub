   <?php 
include 'Conx.php';
$id = str_replace(" ", "+", $_GET['id']);
$lati = $_POST['lati'];
$long = $_POST['long'];
$key = "ThisIsASecretKey";
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}$decryptedData = decryptData($id, $key);
$sql = "UPDATE user_tb SET LongT = '$long', LatT = '$lati' WHERE BusID = '$decryptedData'";
if (mysqli_query($conn, $sql)) {
  header("Location:service-insert.php?id=$id");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>