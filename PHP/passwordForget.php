<?php
require_once('COMPONENTS/functions.php');
include_once("COMPONENTS/headerMeta.php");
require_once('CONFIG/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('PHPMailer/Exception.php');
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
$email = mysqli_real_escape_string($dbc,$_POST['email']);
$username = mysqli_real_escape_string($dbc,$_POST['username']);
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
$newPassword = generateNewPassword();
$sql = "UPDATE felhasznalo SET jelszo = SHA('$newPassword') WHERE email = '$email' AND felhnev = '$username'";
if ($conn->query($sql)){
  $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username  = 'mymusicprodtestemail@gmail.com';              // SMTP felhnev
    $mail->Password  = 'Asd12345qwe';           // SMTP jelszó
    $mail->setFrom('mymusicprodtestemail@gmail.com');                 //Kitől kapja az üzenetet
    $mail->CharSet = 'UTF-8';
    $mail->Mailer = "smtp";
    $mail->addAddress($email);                     // Felhasználó email címe
    $mail->addReplyTo('mymusicprodtestemail@gmail.com', 'Information');         //Kinek válaszoljon
    $mail->addCC('mymusicprodtestemail@gmail.com');
    $mail->addBCC('mymusicprodtestemail@gmail.com');             //kinek küldje el még
    // EMAIL KÜLDÉS
    $mail->isHTML(true);                          // Set email format to HTML
    $mail->Subject = 'Új jelszó';
    $mail->Body    = '<h1>Kedves felhasznáó!,</h1> <br>
    Az igényelt új jelszója: '.$newPassword.' <br>
    My music csapata!';
    $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt
    $mail->send();
    showDialog("Ideiglenes jelszóját email-ben küldtük el!", "../HTML/loginlayout.html");
}
else{
  showDialog("Nincs ilyen felhasználónév és email páros.", "../HTML/loginlayout.html");

}
$conn->close();
?>
