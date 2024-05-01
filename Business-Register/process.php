 <?php 
include 'Conx.php';
$id = str_replace(" ", "+", $_GET['id']);
$servID = $_POST['service'];
$key = "ThisIsASecretKey";
$service = ucwords($_POST['otherValue']);
function decryptData($ciphertext, $key) {
    $cipher = "aes-256-cbc";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    return openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}$decryptedData = decryptData($id, $key);
$price = $_POST['pric'];
$descr = ucwords($_POST['desc']);
if($servID == 'others'){
				$uniq = "SELECT * FROM serv_tb WHERE ServNam = '$service'";
				$res = $conn->query($uniq);
				if ($res->num_rows > 0) {
					$log = "Service is Already in the List";
					header("Location:service-insert.php?id=$id&logs=$log");
				}else{
						$sql = "INSERT INTO serv_tb(ServNam) VALUES('$service')";
						if ($conn->query($sql) === TRUE) {
								$last_id = $conn->insert_id;
					  		$ins = "INSERT INTO busis_tb(BusID, ServID, Price, Descr) VALUES('$decryptedData', '$last_id', '$price', '$descr')";
					  		if ($conn->query($ins) === TRUE) {
					  			header("Location:service-insert.php?id=$id");
					  			} else {
					  				echo "Error: " . $ins . "<br>" . $conn->error;
									}
						} else {
					  		echo "Error: " . $sql . "<br>" . $conn->error;
						}		
				}
}else{
	$sql = "SELECT * FROM busis_tb WHERE ServID = '$servID' AND BusID = '$decryptedData'";
	$res = $conn->query($sql);
	if ($res->num_rows > 0) {
		$error = "Duplicate Entry";
		header("Location:service-insert.php?id=$id&error=$error");
	}else{
			$ins = "INSERT INTO busis_tb(BusID, ServID, Price, Descr) VALUES('$decryptedData', '$servID', '$price', '$descr')";
  		if ($conn->query($ins) === TRUE) {
  			header("Location:service-insert.php?id=$id");
  			} else {
  				echo "Error: " . $ins . "<br>" . $conn->error;
				}
	}



}

       
?>