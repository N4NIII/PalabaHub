<?php 
session_start();
include 'Conx.php';
$mails = $_POST['email'];
$owner = $_POST['Busnam'];
$ot = $_POST['Otime'];
$ct = $_POST['ctime'];
$cont = $_POST['cont'];
$prov = ucwords($_POST['prov']);
$monic = ucwords($_POST['monic']);
$barangay = ucwords($_POST['barangay']);
$zip = $_POST['zip'];
$key = "ThisIsASecretKey";
// $email = "SELECT * FROM user_tb WHERE Mail = '$mails'";
// $result = $conn->query($email);
// if ($result->num_rows > 0) {
//     $_SESSION['error'] = 1;
//     header("Location:http://localhost/PalabaHub/Business-Register/register.php");
// }
function encryptData($plaintext, $key) {
    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $ciphertext);
}
$random_number = rand(100000, 999999); // Generates a random 6-digit number
$busins = "INSERT INTO bus_tb(Busnam, Otim, Ctim)
VALUES('$owner', '$ot', '$ct')";
if ($conn->query($busins) === TRUE) {
  $last_id = $conn->insert_id;
  $id = encryptData($last_id, $key);
      $ins = "INSERT INTO user_tb(BusID, Mail, VerC, Provinc, Monic, Baran, Zipc, Posit, Cnum)
        VALUES('$last_id', '$mails', '$random_number', '$prov', '$monic', '$barangay', '$zip', 2, '$cont')";
        if ($conn->query($ins) === TRUE) {
                $mail = require __DIR__ . "/Mailer.php";

                    $mail->setFrom("noreply@example.com");
                    $mail->addAddress($mails);
                    $mail->Subject = "Verification Code";
                    $mail->Body = <<<END
                        <h1>Verification Code</h1>
                        <p>Hi $owner's Owner,</p>
                        <p>This is your temporary verification code. This is valid for 10 minutes.</p>
                        <div class='text-box'>
                          <h1 style='color: blue;'>$random_number</h1>
                        </div>
                        <p>Thank You!</p>
                    END;
                     try {
                            $mail->send();
                            header("Location:check-email.php?email=$mails&id=$id");
                        } catch (Exception $e) {

                            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

                        }
        }
}




?>