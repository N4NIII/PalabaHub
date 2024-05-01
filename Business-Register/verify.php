<?php 
include 'Conx.php';
$mail = $_GET['email'];
$id = str_replace(" ", "+", $_GET['id']);
$code = $_POST['num1'].
		$_POST['num2'].
		$_POST['num3'].
		$_POST['num4'].
		$_POST['num5'].
		$_POST['num6'];   
$key = "ThisIsASecretKey";
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}
$decryptedData = decryptData($id, $key);
$sql = "SELECT * FROM user_tb WHERE BusID = '$decryptedData'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  		if($code == $row['VerC']){
  			$ups = "UPDATE user_tb SET VerC = null WHERE BusID = '$decryptedData'";
				if ($conn->query($ups) === TRUE) {
					header("Location:map.php?id=$id");
				}
  		}else{
  			$logs = "Wrong Verification Code";
  			header("Location:check-email.php?email=$mail&id=$id&code=$logs");
  		}
  }
} else {
  //Error Wrong Code
  			$logs = "Wrong Verification Code";
  			header("Location:check-email.php?email=$mail&id=$id&code=$logs");
}
?>