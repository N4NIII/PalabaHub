<?php 
include 'Conx.php';
$emails = $_GET['email'];
$id = str_replace(" ", "+", $_GET['id']);
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
$email = "SELECT * FROM bus_tb WHERE BusID = '$decryptedData'";
$result = $conn->query($email);
$row = $result->fetch_assoc();
$owner = $row['Busnam'];
$random_number = rand(100000, 999999); // Generates a random 6-digit number
$ups = "UPDATE user_tb SET VerC = '$random_number' WHERE BusID = '$decryptedData'";
if ($conn->query($ups) === TRUE) {

                $mail = require __DIR__ . "/Mailer.php";

                    $mail->setFrom("noreply@example.com");
                    $mail->addAddress($emails);
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
                            header("Location:check-email.php?email=$emails&id=$id");
                        } catch (Exception $e) {

                            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";

                        }

}
?>