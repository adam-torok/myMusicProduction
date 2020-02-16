<?php
// REGISZTRÁCIÓ
require_once('COMPONENTS/functions.php');
include_once("COMPONENTS/headerMeta.php");
require_once('CONFIG/config.php');
require('PHPMailer/Exception.php');
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
if (!empty($username) && !empty($password) && !empty($email) && filter_var($email, FILTER_SANITIZE_EMAIL)){
// Create dbcection
$sql = "INSERT INTO $dbname (felhnev, jelszo, email) values ('$username', SHA('$password'), '$email')";
if ($dbc->query($sql)){
  $mail = new PHPMailer(true);
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username  = 'mymusicprodtestemail@gmail.com';              // SMTP felhnev
    $mail->Password  = 'Asd12345qwe';           // SMTP jelszó
    //Recipients
    $mail->setFrom('mymusicprodtestemail@gmail.com');                 //Kitől kapja az üzenetet
    $mail->CharSet = 'UTF-8';
    $mail->Mailer = "smtp";
    $mail->addAddress($email);                     // Felhasználó email címe
    $mail->addReplyTo('mymusicprodtestemail@gmail.com', 'Information');         //Kinek válaszoljon
    $mail->addCC('mymusicprodtestemail@gmail.com');
    $mail->addBCC('mymusicprodtestemail@gmail.com');             //kinek küldje el még
    // EMAIL KÜLDÉS
    $mail->isHTML(true);                          // Set email format to HTML
    $mail->Subject = 'Sikeres regrisztáció';
    $mail->Body = '<h1>Kedves '.$username.',</h1> <br>
    Köszönjük, hogy regisztrált! <br>
    My music csapata!';
    $mail->AltBody = 'Köszönjük hogy minket választott'; // ez a body ha nem támogatja a böngésző a html emailt
    $mail->send();
    showDialog("Sikeres regisztráció!", "../HTML/loginlayout.html");
}
else{
  showDialog("Létezik már ilyen felhasználó, és jelszó párosítás", "../HTML/index.html");
}
$dbc->close();
}
?>
